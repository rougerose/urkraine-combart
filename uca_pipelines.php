<?php
/**
 * Utilisations de pipelines par Ukraine CombArt
 *
 * @plugin     Ukraine CombArt
 * @copyright  2023
 * @author     christophe le drean
 * @licence    GNU/GPL
 * @package    SPIP\Uca\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

function uca_nospam_lister_formulaires($formulaires) {
	$formulaires[] = 'newsletter_subscribe';
	$formulaires[] = 'ecrire_auteur';

	return $formulaires;
}
