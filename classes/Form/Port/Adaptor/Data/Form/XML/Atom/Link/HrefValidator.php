<?php

	namespace Form\Port\Adaptor\Data\Form\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\XML\Atom\Link\Href
	 *
	 */
	class HrefValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Href";
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

