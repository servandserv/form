<?php

	namespace Form\Port\Adaptor\Data\Form\Model;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Model\PriceType
	 *
	 */
	class PriceTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\IntValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Int $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "PriceType";
		}
				
		public function validate() {
			parent::validate();
			$enum = array( '1', '2', '3', '4' );
			$this->assertEnumeration( $this->tdo->_text() , $enum );
		}
	}
	

