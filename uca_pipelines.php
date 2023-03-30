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

const UCA_DEV_HOST = 'http://localhost:3000';

function uca_insert_head($flux) {
	$entry = 'main.js';
	$isDev = false;

	if (_UCA_ENV === 'developpement') {
		$isDev = true;
	}

	$flux .= uca_jsEntry($entry, $isDev);
	$flux .= uca_cssEntry($entry, $isDev);

	return $flux;
}

function uca_jsEntry(string $entry, bool $isDev) {
	if ($isDev) {
		$url = UCA_DEV_HOST . '/' . $entry;
	} else {
		$manifest = uca_getManifest();

		if (isset($manifest[$entry])) {
			$url = find_in_path($manifest[$entry]['file'], 'dist/');
		} else {
			$url = '';
		}
	}

	if (empty($url)) {
		return '';
	}

	return '<script type="module" crossorigin src="' . $url . '"></script>';
}

function uca_cssEntry(string $entry, bool $isDev) {
	// En mode developpement, l'injection des css est assuré par Vite
	if ($isDev) {
		return '';
	}

	$css = '';
	$urls = [];
	$manifest = uca_getManifest();

	if (!empty($manifest[$entry]['css'])) {
		foreach ($manifest[$entry]['css'] as $file) {
			$urls[] = find_in_path($file, 'dist/');
		}
	}

	foreach ($urls as $url) {
		$css .= '<link rel="stylesheet" href="' . $url . '">';
	}

	return $css;
}

function uca_getManifest() {
	$manifest = find_in_path('manifest.json', 'dist/');
	$data = [];

	if ($manifest) {
		$data = json_decode(file_get_contents($manifest), true);
	}

	return $data;
}
