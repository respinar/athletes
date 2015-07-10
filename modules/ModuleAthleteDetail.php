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
 * Namespace
 */
namespace athletes;

/**
 * Class ModuleAthleteDetail
 *
 * @copyright  respinar 2013-2015
 * @author     Hamid Abbaszadeh
 * @package    athletes
 */
class ModuleAthleteDetail extends \ModuleAthlete
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_athletedetail';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['member_reader'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// Set the item from the auto_item parameter
		if (!isset($_GET['items']) && $GLOBALS['TL_CONFIG']['useAutoItem'] && isset($_GET['auto_item']))
		{
			\Input::setGet('items', \Input::get('auto_item'));
		}

		// Return if there are no items
		if (!\Input::get('items'))
		{
			return '';
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$objMember = $this->Database->prepare("SELECT * FROM tl_athlete WHERE alias=?")
								->limit(1)
								->execute(\Input::get('items'));

		// Display a 404 page if the Athletes was not found
		if (!$objMember->numRows)
		{
			$objHandler = new $GLOBALS['TL_PTY']['error_404']();
			$objHandler->generate($objPage->id);
		}

		global $objPage;
		$objPage->title = $objMember->title;

		$this->Template->post = $objMember->post;
		$this->Template->joined = $objMember->joined;
		$this->Template->certs = deserialize($objMember->certs);
		$this->Template->description = $objMember->description;
		$objPhoto = \FilesModel::findByPk($objMember->photo);

		// Add photo image
		if ($objPhoto !== null)
		{
			$this->Template->photo = \Image::getHtml(\Image::get($objPhoto->path, '200', '266', 'center_center'));
		}
	}
}
