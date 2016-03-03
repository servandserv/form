<?php
	namespace Form\Port\Adaptor\Data\Form;
		
	class Model extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:Form:Model";
		const ROOT = "Model";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $ID = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Product = null;
		/**
		 * @maxOccurs 1 
		 * @var \Int
		 */
		protected $Price = null;
		/**
		 * @maxOccurs unbounded 
		 * @var Array of Form\Port\Adaptor\Data\Form\XML\Atom\Link
		 */
		protected $Link = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["ID"] = array(
				"prop"=>"ID",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ID
			);
			$this->_properties["product"] = array(
				"prop"=>"Product",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Product
			);
			$this->_properties["price"] = array(
				"prop"=>"Price",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Price
			);
			$this->_properties["Link"] = array(
				"prop"=>"Link",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Link
			);
		}
		/**
		 * @param \String $val
		 */
		public function setID (  $val ) {
			$this->ID = $val;
			$this->_properties["ID"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setProduct (  $val ) {
			$this->Product = $val;
			$this->_properties["product"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Int $val
		 */
		public function setPrice (  $val ) {
			$this->Price = $val;
			$this->_properties["price"]["text"] = $val;
			return $this;
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
		 * @return \String
		 */
		public function getID() {
			return $this->ID;
		}
		/**
		 * @return \String
		 */
		public function getProduct() {
			return $this->Product;
		}
		/**
		 * @return \Int
		 */
		public function getPrice() {
			return $this->Price;
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
			$validator = new \Form\Port\Adaptor\Data\Form\ModelValidator( $this, $handler );
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
			if( ($prop = $this->getID()) !== NULL ) {
				$xw->writeElement( 'ID', $prop );
			}
			if( ($prop = $this->getProduct()) !== NULL ) {
				$xw->writeElement( 'product', $prop );
			}
			if( ($prop = $this->getPrice()) !== NULL ) {
				$xw->writeElement( 'price', $prop );
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
				case "ID":
					$this->setID( $xr->readString() );
					break;
				case "product":
					$this->setProduct( $xr->readString() );
					break;
				case "price":
					$this->setPrice( $xr->readString() );
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
			if(isset($props["ID"])) {
				$this->setID($props["ID"]);
			}
			if(isset($props["product"])) {
				$this->setProduct($props["product"]);
			}
			if(isset($props["price"])) {
				$this->setPrice($props["price"]);
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
		

