<?php

	namespace Form\Port\Adaptor\Data\Form\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\XML\Atom\Link\Method
	 *
	 */
	class MethodValidator extends \Form\Port\Adaptor\Data\Form\XML\Atom\Link\MethodTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Method";
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

