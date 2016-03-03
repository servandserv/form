<?php

	namespace Form\Port\Adaptor\Data\Form;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Errors
	 *
	 */
	class ErrorsValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Form\Port\Adaptor\Data\Form\Errors $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Errors";
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Error','1' );
			$this->assertMaxOccurs( 'Error','unbounded' );
			$this->assertMinOccurs( 'Link','1' );
			$this->assertMaxOccurs( 'Link','unbounded' );
		}
	}
	

