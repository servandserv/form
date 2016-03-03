<?php

	namespace Form\Port\Adaptor\Data\Form\Errors\Error;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Errors\Error\Code
	 *
	 */
	class CodeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\IntegerValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Integer $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Code";
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

