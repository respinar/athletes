<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Athletes
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
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
	'Contao\Athletes'             => 'system/modules/athletes/classes/Athletes.php',

	// Models
	'athletes\AthletesModel'        => 'system/modules/athletes/models/AthletesModel.php',
	'athletes\AthletesGroupModel'   => 'system/modules/athletes/models/AthletesGroupModel.php',
	'athletes\AthletesActModel'     => 'system/modules/athletes/models/AthletesActModel.php',

	// Modules
	'athletes\ModuleAthletesReader' => 'system/modules/athletes/modules/ModuleAthletesReader.php',
	'athletes\ModuleAthletesList'   => 'system/modules/athletes/modules/ModuleAthletesList.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_athletesreader' => 'system/modules/athletes/templates/modules',
	'mod_athleteslist'   => 'system/modules/athletes/templates/modules',
));
