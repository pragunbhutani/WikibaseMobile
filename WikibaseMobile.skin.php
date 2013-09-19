<?php
use \Wikibase\Lib\Serializers\EntitySerializationOptions;
use \Wikibase\Lib\Serializers\ItemSerializer;
use \Wikibase\Lib\Serializers\PropertySerializer;
use \Wikibase\Repo\WikibaseRepo;

/**
 * WikibaseMobile skin
 *
 * @file
 * @ingroup Skins
 */

	class WikibaseMobile extends SkinMobile {
		public $skinname = 'WikibaseMobile';
		public $stylename = 'WikibaseMobile';				//TODO: Discuss Skin name.
		public $template = 'WikibaseMobileTemplate';			//here as well
		// $useHeadElement = true;

		/**
		 * Initializes output page and sets up skin-specific parameters
		 * @param $out OutputPage object to initialize
		 */
		public function initPage( OutputPage $out ) {
			parent::initPage( $out );
			$out->addModuleStyles( 'skins.WikibaseMobile' );
			$out->addModules( 'scripts.WikibaseMobile' );

			/* Assures mobile devices that the site doesn't assume traditional
			* desktop dimensions, so they won't downscale and will instead respect
			* things like CSS's @media rules */
			$out->addHeadItem( 'viewport',
				'<meta name="viewport" content="width=device-width, initial-scale=1">'
			);

		}

		// fixme: this method is much to large.  should be split into more methods
		// and additional classes, as needed
		// todo: phpunit tests would also be valuable :)
		public function prepareData( BaseTemplate $tpl ) {
			parent::prepareData( $tpl );  //Incoming sample HTML!!!

			// todo: is there a way for user to choose a language?
			$langCode = $this->getLanguage()->getCode();

			$serializedEntity = $this->getOutput()->getProperty( 'wikibase-entity' );

			// todo incorporate language fallback chain here and/or in entityview/parser output
			$options = new EntitySerializationOptions(
				WikibaseRepo::getDefaultInstance()->getIdFormatter()
			);

			$contentModel = $this->getTitle()->getContentModel();

			// todo: have SerializerFactory return the correct
			// serializer based on content model
			if ( $contentModel === 'wikibase-item' ) {
				$unserializer = new ItemSerializer( $options );
			} elseif ( $contentModel === 'wikibase-property' ) {
				$unserializer = new PropertySerializer( $options );
			} else {
				// it is some other content type, use default rendering
				// todo: give it the default output page body text
				$tpl->set( 'WikibaseMobileData', $this->renderHtml( 'body text', $langCode ) );

				// todo: not sure what the function is supposed to return, if anything?
				return;
			}

			$entity = $unserializer->newFromSerialization( $serializedEntity );

			$tpl->set( 'WikibaseMobileData', $this->renderHtml( $entity, $langCode ) );
		}

		protected function renderHtml( $entity, $langCode ) {
			$label = $entity->getLabel( $langCode );

			$html = '
				<div id="container">

					<div id="title-bar">
						<h2>' . htmlspecialchars( $label ) . '</h2>
						<div id="edit-button"></div>
					</div>

					<div id="description-box">
						<p>The fifth part in an increasingly inaccurately named trilogy.</p>
					</div>

					<div id="alias-box">
						<h4>Also known as: </h4>
						<p>Lorem ipsum, dolor, sit amet</p>
					</div>

					<div id="statements-container">
						<div class="statement">
							<h5>Main Type</h5>
							<p>Creative Work<p>
							<p class="sources">5 sources</p>
						</div>
						<div class="statement">
							<h5>Series</h5>
							<p>Hitchhikers Guide to the Galaxy<p>
							<p class="sources">2 sources</p>
						</div>
						<div class="statement">
							<h5>Preceded by</h5>
							<p>So long and thanks for all the fish<p>
							<p class="sources">5 sources</p>
						</div>
						<div class="statement">
							<h5>Author</h5>
							<p>Douglas Adams<p>
							<p class="sources">0 sources</p>
						</div>
						<div class="statement">
							<h5>Instance of</h5>
							<p>Book<p>
							<p class="sources">0 sources</p>
						</div>
						<div class="statement-add"></div>
					</div>

				</div>
			';

			return $html;
		}

		protected function getLabel( array $entityData, $langCode ) {
			$labels = $entityData['labels'];
			return isset( $labels[$langCode] ) ? $labels[$langCode]['value'] : "<no label>";
		}
	}

	class WikibaseMobileTemplate extends MobileTemplate {
  		protected function renderContentWrapper( $data ) {
			echo $data['WikibaseMobileData'];
		}

	}
