<?php
/**
 * Options au chargement du plugin Ukraine CombArt
 *
 * @plugin     Ukraine CombArt
 * @copyright  2023
 * @author     christophe le drean
 * @licence    GNU/GPL
 * @package    SPIP\Uca\Options
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

// Env du plugin
if (!defined('_UCA_ENV')) {
	define('_UCA_ENV', 'production');
}

// Zcore
if (!isset($GLOBALS['z_blocs'])) {
	$GLOBALS['z_blocs'] = [
		'content',
		'head',
		'head_js',
		'header',
		'footer',
	];
}

// Appels de notes
define('_NOTES_OUVRE_REF', '<sup class="spip_note_ref">');
define('_NOTES_FERME_REF', '</sup>');
define('_NOTES_OUVRE_NOTE', '<sup class="spip_note_ref">');
define('_NOTES_FERME_NOTE', '</sup>');
