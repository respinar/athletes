<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   atheletes
 * @author    Hamid Abbaszadeh
 * @license   LGPL-3.0+
 * @copyright respinar 2013-2015
 */


/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'athletes' => array
	(
		'tables' => array('tl_athlete_category','tl_athlete', 'tl_content'),
		'icon'   => 'system/modules/athletes/assets/icon.png'
	)
));


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['athlete']['athlete_list']   = 'ModuleAthleteList';
$GLOBALS['FE_MOD']['athlete']['athlete_detail'] = 'ModuleAthleteDetail';

/**
 * Register hook to add athletes items to the indexer
 */
$GLOBALS['TL_HOOKS']['getSearchablePages'][]     = array('Athlete', 'getSearchablePages');
