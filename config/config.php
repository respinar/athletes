<?php

/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'hikers' => array
	(
		'tables' => array('tl_hikers_group','tl_hikers', 'tl_hikers_act'),
		'icon'   => 'system/modules/hikers/assets/icon.png'
	)
));


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['hikers']['hikers_list']   = 'ModuleHikersList';
$GLOBALS['FE_MOD']['hikers']['hikers_reader'] = 'ModuleHikersReader';
