<?php
/**
 * WikibaseMobile skin
 *
 * @file
 * @ingroup Skins
 */

	class WikibaseMobile extends SkinMinerva {
		public $skinname = 'WikibaseMobile';								//TODO: Discuss Skin name.
		public $template = 'WikibaseMobileTemplate';						//here as well

		/**
		 * Initializes output page and sets up skin-specific parameters
		 * @param $out OutputPage object to initialize
		 */
		public function initPage( OutputPage $out ) {
			parent::initPage( $out );
			// add styling
			$out->addModuleStyles( 'skins.WikibaseMobile' );
		}

		public function prepareData( BaseTemplate $tpl ) {
			parent::prepareData( $tpl );									//Incoming sample HTML!!!
			$tpl->set( 'WikibaseMobileData', '

<html>
	<head>
		<title>Mostly Harmless - Wikidata</title>
	</head>
	<body>
		<div id="container">
			<div id="title-bar">
				<h2>Mostly Harmless</h2>
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
	</body>
</html>

				' );
		}
	}

	class WikibaseMobileTemplate extends MinervaTemplate {
  		protected function renderContentWrapper( $data ) {
			echo $data['WikibaseMobileData'];
		}
	}