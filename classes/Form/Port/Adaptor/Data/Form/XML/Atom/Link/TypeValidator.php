<?php

	namespace Form\Port\Adaptor\Data\Form\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\XML\Atom\Link\Type
	 *
	 */
	class TypeValidator extends \Form\Port\Adaptor\Data\Form\XML\Atom\Link\TypeTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Type";
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

