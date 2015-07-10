<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Members
 * @link    https://respinar.com
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace athletes;


/**
 * Reads and writes members categories
 *
 * @package   Models
 * @author    Hamid Abbaszadeh <http://respinar.com>
 * @copyright Hamid Abbaszadeh 2013-2014
 */
class AthletesCategoryModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_athletes_category';

}
