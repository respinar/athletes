<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Hikers
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\Hikers'            => 'system/modules/hikers/classes/Hikers.php',

	// Models
	//'Contao\HikersGroupModel'  => 'system/modules/hikers/models/HikersGroupModel.php',
	//'Contao\HikersModel'       => 'system/modules/hikers/models/HikersModel.php',
	//'Contao\HikersActsModel'   => 'system/modules/hikers/models/HikersActsModel.php',

	// Modules
	'Contao\ModuleHikersList'   => 'system/modules/hikers/modules/ModuleHikersList.php',
	'Contao\ModuleHikersReader' => 'system/modules/hikers/modules/ModuleHikersReader.php'
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_hikerslist'   => 'system/modules/hikers/templates/modules',
	'mod_hikersreader' => 'system/modules/hikers/templates/modules'
));
