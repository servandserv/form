<?php

	namespace Form\Port\Adaptor\Data\Form\XML\Atom\Link;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\XML\Atom\Link\MethodType
	 *
	 */
	class MethodTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "MethodType";
		}
				
		public function validate() {
			parent::validate();
			$enum = array( 'GET', 'POST' );
			$this->assertEnumeration( $this->tdo->_text() , $enum );
		}
	}
	

