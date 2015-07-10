<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'athletes' => array
	(
		'tables' => array('tl_athletes_category','tl_athletes', 'tl_content'),
		'icon'   => 'system/modules/athletes/assets/icon.png'
	)
));


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['athletes']['athletes_list']   = 'ModuleAthletesList';
$GLOBALS['FE_MOD']['athletes']['athletes_detail'] = 'ModuleAthletesDetail';
