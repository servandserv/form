<?php

	namespace Form\Port\Adaptor\Data\Form\Errors\Error;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Errors\Error\Value
	 *
	 */
	class ValueValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Value";
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

