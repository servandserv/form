<?php

	namespace Form\Port\Adaptor\Data\Form\Model;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Model\ProductType
	 *
	 */
	class ProductTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		const PATTERN1 = "/^[a-zA-Z]{1,5}$/u";
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "ProductType";
		}
				
		public function validate() {
			parent::validate();
			$this->assertPattern( $this->tdo->_text(), $this::PATTERN1 );
		}
	}
