<?php

namespace athletes;

/**
 * Class ModuleAthletesReader
 *
 * Front end module "athletes reader".
 */
class ModuleAthletesReader extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_athletesreader';


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
		$objMember = $this->Database->prepare("SELECT * FROM tl_athletes WHERE alias=?")
								->limit(1)
								->execute(\Input::get('items'));

		// Display a 404 page if the Athletes was not found
		if (!$objMember->numRows)
		{
			$objHandler = new $GLOBALS['TL_PTY']['error_404']();
			$objHandler->generate($objPage->id);
		}

		global $objPage;
		$objPage->title = $objMember->name .' '. $objMember->family;

		$this->Template->name = $objMember->name;
        $this->Template->family = $objMember->family;
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


		$arrActs = array();

		$objActs = $this->Database->prepare("SELECT * FROM tl_athletes_act WHERE pid=? ORDER BY sorting")
								   ->execute($objMember->id);

		// Return if there are acts
		if ($objActs->numRows)
		{

			// Generate acts
			while ($objActs->next())
			{
				$objImage = \FilesModel::findByPk($objActs->image);

				// Add image
				if ($objImage !== null)
				{
					$image = \Image::getHtml(\Image::get($objImage->path, '200', '160', 'center_center'),$objActs->title);
				}
				$arrActs[] = array
				(
					'title' => $objActs->title,
					'date' => $objActs->date,
					'image' => $image
				);
			}
		}

		$this->Template->acts = $arrActs;
	}
}
