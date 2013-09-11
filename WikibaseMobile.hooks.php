<?php

/**
 * @since 0.1
 *
 * @file
 * @ingroup WikibaseMobile
 *
 * @licence GNU GPL v2+
 * @author Katie Filbert < aude.wiki@gmail.com >
 */
class WikibaseMobileHooks {

	/**
	 * @param OutputPage &$out
	 * @param ParserOutput $parserOutput
	 */
	public static function onOutputPageParserOutput( OutputPage &$out, ParserOutput $parserOutput ) {
		$entity = $parserOutput->getExtensionData( 'wikibase-entity' );
		$out->setProperty( 'wikibase-entity', $entity );

		return true;
	}

}
