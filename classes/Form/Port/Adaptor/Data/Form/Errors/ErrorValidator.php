<?php

	namespace Form\Port\Adaptor\Data\Form\Errors;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\Errors\Error
	 *
	 */
	class ErrorValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Form\Port\Adaptor\Data\Form\Errors\Error $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			$this->addSimpleValidator( 'Code', new \Form\Port\Adaptor\Data\Form\Errors\Error\CodeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getCode() ), $handler ) );
			$this->addSimpleValidator( 'Ref', new \Form\Port\Adaptor\Data\Form\Errors\Error\RefValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getRef() ), $handler ) );
			$this->addSimpleValidator( 'Value', new \Form\Port\Adaptor\Data\Form\Errors\Error\ValueValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getValue() ), $handler ) );
			}
			$this->className = "Error";
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Code','1' );
			$this->assertMaxOccurs( 'Code','1' );
			$this->assertMinOccurs( 'Ref','1' );
			$this->assertMaxOccurs( 'Ref','1' );
			$this->assertMinOccurs( 'Value','1' );
			$this->assertMaxOccurs( 'Value','1' );
		}
	}
	

