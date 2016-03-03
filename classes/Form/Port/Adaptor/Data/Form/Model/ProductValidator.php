<?php

	namespace Form\Port\Adaptor\Data\Form\Model;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Model\Product
	 *
	 */
	class ProductValidator extends \Form\Port\Adaptor\Data\Form\Model\ProductTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Product";
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

