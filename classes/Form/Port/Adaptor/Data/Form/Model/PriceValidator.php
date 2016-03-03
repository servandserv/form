<?php

	namespace Form\Port\Adaptor\Data\Form\Model;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Model\Price
	 *
	 */
	class PriceValidator extends \Form\Port\Adaptor\Data\Form\Model\PriceTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Int $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
			$this->className = "Price";
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

