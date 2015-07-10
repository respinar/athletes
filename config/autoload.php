<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'athletes',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'athletes\Athletes'              => 'system/modules/athletes/classes/Athletes.php',

	// Models
	'athletes\AthletesModel'         => 'system/modules/athletes/models/AthletesModel.php',
	'athletes\AthletesCategoryModel' => 'system/modules/athletes/models/AthletesCategoryModel.php',

	// Modules
	'athletes\ModuleAthletesList'    => 'system/modules/athletes/modules/ModuleAthletesList.php',
	'athletes\ModuleAthletes'        => 'system/modules/athletes/modules/ModuleAthletes.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_athletes_list'   => 'system/modules/athletes/templates/modules',
	'mod_athletes_detail' => 'system/modules/athletes/templates/modules',
));
