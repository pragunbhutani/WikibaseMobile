<?php
/**
 * WikibaseMobile Skin
 *
 * @file
 * @ingroup Skins
 * @author Pragun Bhutani
 * @author Katie Filbert
 * @author Jon Robson
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) die( 'This is an extension to the MediaWiki package and cannot be run standalone.' );

$wgExtensionCredits['skin'][] = array(
    'path' => __FILE__,
    'name' => 'WikibaseMobile',												//TODO: Discuss Skin name. Check convention.
    'url' => 'https://www.mediawiki.org/wiki/Skin:WikibaseMobile',			//Note: URL may change
    'author' => array( 'Pragun Bhutani', 'Katie Flibert', 'Jon Robson' ),
    'version' => '1.0.0',													//TODO: Check version numbering convention
    'descriptionmsg' => 'wikibase-mobile-desc',								//TODO: Remember to add a description message
);

$wgValidSkinNames['wikibasemobile'] = 'WikibaseMobile';
$wgAutoloadClasses['WikibaseMobile'] = dirname(__FILE__) . '/WikibaseMobile.skin.php';
$wgExtensionMessagesFiles['WikibaseMobile'] = dirname(__FILE__) . '/WikibaseMobile.i18n.php';

$localBasePath = dirname( __DIR__ );
$remoteExtPath = 'WikibaseMobile';

$wgResourceModules['skins.WikibaseMobile'] = array(
    'targets' => 'mobile',
    'styles' => array(
        'WikibaseMobile/assets/styles/normalize.css' => array( 'media' => 'screen' ),
        'WikibaseMobile/assets/styles/WikibaseMobile.css' => array( 'media' => 'screen' ),
        'WikibaseMobile/assets/styles/WikibaseMobile66em.css' => array( 'media' => 'screen and (max-width: 66em)' ),
        'WikibaseMobile/assets/styles/WikibaseMobile60em.css' => array( 'media' => 'screen and (max-width: 60em)' ),
        'WikibaseMobile/assets/styles/WikibaseMobile40em.css' => array( 'media' => 'screen and (max-width: 40em)' ),
        'WikibaseMobile/assets/styles/WikibaseMobile30em.css' => array( 'media' => 'screen and (max-width: 30em)' ),
    ),
    'remoteExtPath' => $remoteExtPath,
    'localBasePath' => $localBasePath,
);

$wgResourceModules['scripts.WikibaseMobile'] = array(
    'targets' => 'mobile',
    'scripts' => 'WikibaseMobile/assets/scripts/scripts.js',
    'remoteExtPath' => $remoteExtPath,
    'localBasePath' => $localBasePath,
);

$wgMFDefaultSkinClass = 'WikibaseMobile';									//Not sure if correct way