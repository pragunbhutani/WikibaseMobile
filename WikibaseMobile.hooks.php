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

	public static function onOutputPageParserOutput( OutputPage $out, ParserOutput $pOut ) {
		$entity = $pOut->getExtensionData( 'wikibase-entity' );
		$out->setProperty( 'wikibase-entity', $entity );

		return true;
	}

}
