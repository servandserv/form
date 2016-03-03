<?php
    
    include_once("../conf/bootstrap.php");
    include_once("../conf/conf.php");
    include_once("../libs/bb/request.php");
    include_once("../libs/bb/media.php");
    
    /*
     * проверить метод которым был передан запрос
     * форма может находиться в нескольких состояниях
     * 1) вызвана методом GET новая форма для ввода данных
     * 2) вызвана методом POST с частично заполненными данными и намерением
     *    получить данные для справочника
     * 3) вызвана методом GET по итогам работы со справочником где параметром запроса выступает
     *    выбранные элементы справочника
     * 4) вызвана методом POST завершающая отправка данных на сервер
     */
    
    // формы строятся на основе модели данных
    // handler для обработки ошибок валидации
    $handler = new \Happymeal\Port\Adaptor\Data\ValidationHandler();
    // В зависимости от шага визарда применяем различные шаблоны
    // для отображения содержимого
    define("MODEL_FORM","stylesheets/Form/Model.Form.xsl");
    define("MODEL_DATA","stylesheets/Form/Model.Data.xsl");
    define("ERRORS_DATA","stylesheets/Form/Errors.Data.xsl");

    /*
     * Если свеженькая форма (у ссылки нет токена), то создаем токен
     * и дальше передаем его во всех ссылках
     * по этому токену храним в сессии как во временном хранилище нашу модель 
     * для порядка - токен всегда передается через GET
     */
    $scriptToken = sha1( $_SERVER["SCRIPT_NAME"].session_name() );
    if( !isset( $_SESSION[$scriptToken] ) ) {
        $model = new \Form\Port\Adaptor\Data\Form\Model();
        $link = new \Form\Port\Adaptor\Data\Form\XML\Atom\Link();
        $link->setHref($scriptToken);
        $link->setRel("scriptToken");
        $model->setLink($link);
        $_SESSION[$scriptToken]["model"] = $model;
    }
    
    $flowToken = sha1( $scriptToken.microtime() );
    $_SESSION[$scriptToken]["flowToken"] = $flowToken;
    $model = $_SESSION[$scriptToken]["model"];
    
    
    switch($_SERVER['REQUEST_METHOD']) {
        case "GET":
            // жесткий ресет формы, чистим в сессии данные формы
            if( isset( $_GET["reset"] ) ) {
                unset( $_SESSION[$scriptToken] );
                header("Location: index.php");
                exit;
            }
            
            /*
             * GET запросом возвращаем данные для полей формы из справочников
             * получая такие данные, мы помещаем их во временное хранилище контроллера
             */
            
            if(isset($_GET["price"])) {
                $price = bb_request_cleanup($_GET["price"],$sl["DEFAULT_REPLACE_PAIRS"]());
                $price = new \Happymeal\Port\Adaptor\Data\XML\Schema\Int($price);
                $validator = new \Form\Port\Adaptor\Data\Form\Model\PriceValidator( $price, $handler );
                $validator->validate();
                if(!$handler->hasErrors()) {
                    /**
                     * Проверяем полученные данные на валидность
                     * если данные не валидны, то игнорируем переданное значение
                     * 
                     * Слабое место! Как дать понять что переданное поле было передано ошибочно??
                     * По идее конечно справочники не должны давать вводить не корректное поле
                     * поскольку значения справочника сформированы нами же
                     */
                     $model->setPrice( $price->_text() );
                     $model = $_SESSION[$scriptToken]["model"]; //сохранить в сессии
                }
            }
            $model->setPI( MODEL_FORM );
            break;
        case "POST":
            /**
             * метод POST допускает контент разного типа
             *
             */
            switch(bb_request_content()) {
                case BB_REQUEST_CONTENT_XML:
                    /*
                     * 1) Проверяем действительно ли контент валидный xml
                     * 2) Поручаем объект
                     * 3) Вызываем соответствующий use case
                     */
                    if($dom = bb_media_xml(bb_request_raw_post_data())) {
                        $model->fromXmlStr(bb_request_raw_post_data());
                    } else {
                        throw new \Exception("Content is not a valid xml value",400);
                    }
                    break;
                case BB_REQUEST_CONTENT_JSON:
                    /*
                     * 1) Проверяем действительно ли контент валидный json
                     * 2) Поручаем объект
                     * 3) Вызываем соответствующий use case
                     */
                     if($json = bb_media_json(bb_request_raw_post_data())) {
                        $model->fromJSON($json);
                     } else {
                        throw new \Exception("Content is not a valid json value",400);
                     }
                    break;
                case BB_REQUEST_CONTENT_FORM_DATA:
                    /**
                     * Форма многоходовочка
                     * Возможные команды part, full передаются с нажатием соответствующей кнопочки
                     * Перед тем как показать справочник цен на продукт сохраняем
                     * имя продукта и поскольку контроллер вызван с таргетом в iframe
                     * то редиректим скрипт на скрипт справочника
                     */
                    $product = bb_request_cleanup($_POST["product"],$sl["DEFAULT_REPLACE_PAIRS"]());
                    $product = new \Happymeal\Port\Adaptor\Data\XML\Schema\String($product);
                    $price = bb_request_cleanup($_POST["price"],$sl["DEFAULT_REPLACE_PAIRS"]());
                    $price = new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer($price);
                    
                    if( isset($_POST["part"] ) ) {
                        $validator = new \Form\Port\Adaptor\Data\Form\Model\ProductValidator( $product, $handler );
                        $validator->validate();
                        if(!$handler->hasErrors()) {
                            $model->setProduct($product->_text());
                            // записываем данные в сессию
                            $_SESSION[$scriptToken]["model"] = $model;
                            header("Location: schemas/Form/Model.xsd?product=".$model->getProduct());
                            exit;
                        }
                    } else if( isset($_POST["full"] ) ) {
                        $model->setProduct($product->_text());
                        $model->setPrice($price->_text());
                        
                        // ну и в итоге выполним само задание
                        // перехватим ошибки
                        // если это ошибки бизнес логики
                        //$uc = new \Form\Application\CreateModelUseCase();
                        $model->validateType( $handler );
                        if(!$handler->hasErrors()) {
                            //$model = $uc->execute($model);
                            $model->setPI( MODEL_DATA );
                        }
                        
                        // после отправки данных формы надо почистить сессию,
                        // цикл закончился
                        unset( $_SESSION[$scriptToken] );
                    }
                    break;
                default:
                    throw new \Exception("Unsupported Media Type", 415);
            }
            
            
            break;
        default:
            header("Allow: GET,POST");
            throw new \Exception("Method Not Allowed",405);
    }
    
    // готовим модель
    if($handler->getErrors()) {
        $model = new \Form\Port\Adaptor\Data\Form\Errors();
        $errors = $handler->getErrors();
        foreach($errors as $code=>$arr) {
            foreach($arr as $error) {
                $err = new \Form\Port\Adaptor\Data\Form\Errors\Error();
                $err->setValue($error);
                $err->setCode($code);
                $model->setError($err);
            }
        }
        $model->setPI(ERRORS_DATA);
    }
    $link = new \Form\Port\Adaptor\Data\Form\XML\Atom\Link();
    $link->setHref($_SERVER["SCRIPT_NAME"]."?flowToken=".$flowToken);
    $link->setRel("self");
    $model->setLink($link);
    
    // тут готовим ответ
    // берем или данные нашего хендлера валидации или модели и отрисовываем их
    // html
    \XML_Output::tryHtml($model->toXmlStr(),true);
    exit;