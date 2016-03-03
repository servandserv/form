<?php

	namespace Form\Port\Adaptor\Data\Form\XML\Atom;
	
	/**
	 *
	 * Валидатор класса Form\Port\Adaptor\Data\Form\XML\Atom\Link
	 *
	 */
	class LinkValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Form\Port\Adaptor\Data\Form\XML\Atom\Link $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			$this->addSimpleValidator( 'Rel', new \Form\Port\Adaptor\Data\Form\XML\Atom\Link\RelValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getRel() ), $handler ) );
			$this->addSimpleValidator( 'Href', new \Form\Port\Adaptor\Data\Form\XML\Atom\Link\HrefValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getHref() ), $handler ) );
			$this->addSimpleValidator( 'Type', new \Form\Port\Adaptor\Data\Form\XML\Atom\Link\TypeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getType() ), $handler ) );
			$this->addSimpleValidator( 'Method', new \Form\Port\Adaptor\Data\Form\XML\Atom\Link\MethodValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getMethod() ), $handler ) );
			}
			$this->className = "Link";
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Rel','1' );
			$this->assertMaxOccurs( 'Rel','1' );
			$this->assertMinOccurs( 'Href','1' );
			$this->assertMaxOccurs( 'Href','1' );
			$this->assertMinOccurs( 'Type','0' );
			$this->assertMaxOccurs( 'Type','1' );
			$this->assertMinOccurs( 'Method','0' );
			$this->assertMaxOccurs( 'Method','1' );
		}
	}
	

