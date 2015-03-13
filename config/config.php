<?php

/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'athletes' => array
	(
		'tables' => array('tl_athletes_group','tl_athletes', 'tl_athletes_act'),
		'icon'   => 'system/modules/athletes/assets/icon.png'
	)
));


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['athletes']['athletes_list']   = 'ModuleAthletesList';
$GLOBALS['FE_MOD']['athletes']['athletes_reader'] = 'ModuleAthletesReader';
