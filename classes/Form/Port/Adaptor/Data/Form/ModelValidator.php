<?php

	namespace Form\Port\Adaptor\Data\Form;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Model
	 *
	 */
	class ModelValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Form\Port\Adaptor\Data\Form\Model $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			$this->addSimpleValidator( 'ID', new \Form\Port\Adaptor\Data\Form\Model\IDValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getID() ), $handler ) );
			$this->addSimpleValidator( 'Product', new \Form\Port\Adaptor\Data\Form\Model\ProductValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getProduct() ), $handler ) );
			$this->addSimpleValidator( 'Price', new \Form\Port\Adaptor\Data\Form\Model\PriceValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Int( $tdo->getPrice() ), $handler ) );
			}
			$this->className = "Model";
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'ID','0' );
			$this->assertMaxOccurs( 'ID','1' );
			$this->assertMinOccurs( 'Product','1' );
			$this->assertMaxOccurs( 'Product','1' );
			$this->assertMinOccurs( 'Price','1' );
			$this->assertMaxOccurs( 'Price','1' );
			$this->assertMinOccurs( 'Link','1' );
			$this->assertMaxOccurs( 'Link','unbounded' );
		}
	}
	

