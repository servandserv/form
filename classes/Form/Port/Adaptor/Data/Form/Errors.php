<?php
	namespace Form\Port\Adaptor\Data\Form;
		
	class Errors extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:Form:Errors";
		const ROOT = "Errors";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var Array of Form\Port\Adaptor\Data\Form\Errors\Error
		 */
		protected $Error = [];
		/**
		 * @maxOccurs unbounded 
		 * @var Array of Form\Port\Adaptor\Data\Form\XML\Atom\Link
		 */
		protected $Link = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Error"] = array(
				"prop"=>"Error",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Error
			);
			$this->_properties["Link"] = array(
				"prop"=>"Link",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Link
			);
		}
		/**
		 * @param Form\Port\Adaptor\Data\Form\Errors\Error $val
		 */
		public function setError ( \Form\Port\Adaptor\Data\Form\Errors\Error $val ) {
			$this->Error[] = $val;
			$this->_properties["Error"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Form\Port\Adaptor\Data\Form\Errors\Error[]
		 */
		public function setErrorArray ( array $vals ) {
			$this->Error = $vals;
			$this->_properties["Error"]["text"] = $vals;
		}
		/**
		 * @param Form\Port\Adaptor\Data\Form\XML\Atom\Link $val
		 */
		public function setLink ( \Form\Port\Adaptor\Data\Form\XML\Atom\Link $val ) {
			$this->Link[] = $val;
			$this->_properties["Link"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Form\Port\Adaptor\Data\Form\XML\Atom\Link[]
		 */
		public function setLinkArray ( array $vals ) {
			$this->Link = $vals;
			$this->_properties["Link"]["text"] = $vals;
		}
		/**
		 * @return Form\Port\Adaptor\Data\Form\Errors\Error | []
		 */
		public function getError($index = null) {
			if( $index !== null ) {
				$res = isset($this->Error[$index]) ? $this->Error[$index] : null;
			} else {
				$res = $this->Error;
			}
			return $res;
		}
		/**
		 * @return Form\Port\Adaptor\Data\Form\XML\Atom\Link | []
		 */
		public function getLink($index = null) {
			if( $index !== null ) {
				$res = isset($this->Link[$index]) ? $this->Link[$index] : null;
			} else {
				$res = $this->Link;
			}
			return $res;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Form\Port\Adaptor\Data\Form\ErrorsValidator( $this, $handler );
			$validator->validate();
		}
			
		
		public function toXmlStr( $xmlns=self::NS, $xmlname=self::ROOT ) {
			return parent::toXmlStr($xmlns,$xmlname);
		}

		/**
		* Вывод в XMLWriter
		* @codegen true
		* @param XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		* @param int $mode
		*/
		public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT ) {
			if( $mode & \Adaptor_XML::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
			$this->attributesToXmlWriter( $xw, $xmlname, $xmlns );
			$this->elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( $mode & \Adaptor_XML::ENDELEMENT ) $xw->endElement();
		}
				
		/**
		* Вывод атрибутов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function attributesToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::attributesToXmlWriter( $xw, $xmlname, $xmlns );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( $props = $this->getError() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getLink() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "Error":
					$Error = \Adaptor_Bindings::create("\\Form\\Port\\Adaptor\\Data\\Form\\Errors\\Error");
					$this->setError( $Error->fromXmlReader( $xr ) );
					break;
				case "Link":
					$Link = \Adaptor_Bindings::create("\\Form\\Port\\Adaptor\\Data\\Form\\XML\\Atom\\Link");
					$this->setLink( $Link->fromXmlReader( $xr ) );
					break;
				default:
					parent::elementsFromXmlReader( $xr );
			}
		}
		/**
		 * Чтение данных JSON объекта, результата работы json_decode,
		 * в объект
		 * @param mixed array | stdObject
		 *
		 */
		public function fromJSON( $arg ) {
			parent::fromJSON( $arg );
			$props = [];
			if( is_array( $arg ) ) {
				$props = $arg;
			} elseif( is_object( $arg ) ) {
				foreach( $arg as $k=>$v ) {
					$props[$k] = $v;
				}
			}
			if(isset($props["Error"])) {
				if( is_array($props["Error"]) ) {
					foreach($props["Error"] as $k=>$v) {
						$Error = \Adaptor_Bindings::create("\\Form\\Port\\Adaptor\\Data\\Form\\Errors\\Error");
						$Error->fromJSON($v);
						$this->setError($Error);
					}
				}
			}
			if(isset($props["Link"])) {
				if( is_array($props["Link"]) ) {
					foreach($props["Link"] as $k=>$v) {
						$Link = \Adaptor_Bindings::create("\\Form\\Port\\Adaptor\\Data\\Form\\XML\\Atom\\Link");
						$Link->fromJSON($v);
						$this->setLink($Link);
					}
				}
			}
		}
		
	}
		

