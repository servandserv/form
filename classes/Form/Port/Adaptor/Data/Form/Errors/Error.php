<?php
	namespace Form\Port\Adaptor\Data\Form\Errors;
		
	class Error extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:servandserv:Form:Errors";
		const ROOT = "Error";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $Code = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Ref = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Value = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["code"] = array(
				"prop"=>"Code",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Code
			);
			$this->_properties["ref"] = array(
				"prop"=>"Ref",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Ref
			);
			$this->_properties["value"] = array(
				"prop"=>"Value",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Value
			);
		}
		/**
		 * @param \Integer $val
		 */
		public function setCode (  $val ) {
			$this->Code = $val;
			$this->_properties["code"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setRef (  $val ) {
			$this->Ref = $val;
			$this->_properties["ref"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setValue (  $val ) {
			$this->Value = $val;
			$this->_properties["value"]["text"] = $val;
			return $this;
		}
		/**
		 * @return \Integer
		 */
		public function getCode() {
			return $this->Code;
		}
		/**
		 * @return \String
		 */
		public function getRef() {
			return $this->Ref;
		}
		/**
		 * @return \String
		 */
		public function getValue() {
			return $this->Value;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Form\Port\Adaptor\Data\Form\Errors\ErrorValidator( $this, $handler );
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
			if( ($prop = $this->getCode()) !== NULL ) {
				$xw->writeElement( 'code', $prop );
			}
			if( ($prop = $this->getRef()) !== NULL ) {
				$xw->writeElement( 'ref', $prop );
			}
			if( ($prop = $this->getValue()) !== NULL ) {
				$xw->writeElement( 'value', $prop );
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
				case "code":
					$this->setCode( $xr->readString() );
					break;
				case "ref":
					$this->setRef( $xr->readString() );
					break;
				case "value":
					$this->setValue( $xr->readString() );
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
			if(isset($props["code"])) {
				$this->setCode($props["code"]);
			}
			if(isset($props["ref"])) {
				$this->setRef($props["ref"]);
			}
			if(isset($props["value"])) {
				$this->setValue($props["value"]);
			}
		}
		
	}
		

