<?php


$EM_CONF[$_EXTKEY] = array(
	'title' => 'Token based downloads',
	'description' => 'This ext uses the apache token module to provide large protected files for download',
	'category' => 'misc',
	'shy' => 0,
	'version' => '0.1.0',
	'dependencies' => 'cms',
	'conflicts' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Sven Wappler',
	'author_email' => 'typo3YYYY@wappler.systems',
	'author_company' => 'WapplerSystems',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.6.0-8.7.99',
            'php' => '5.6.0-7.1.99',
            'fluid_styled_content' => ''
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => '',
	'suggests' => array(
	),
);
