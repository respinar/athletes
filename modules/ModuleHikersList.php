<?php

namespace Contao;

/**
 * Class ModuleHikersList
 *
 * Front end module "hikers list".
 */

class ModuleHikersList extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_hikerslist';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['member_list'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{

		$intList = $this->hikers_group;

		$objMembers = $this->Database->prepare("SELECT * FROM tl_hikers WHERE published=1 AND pid=? ORDER BY sorting")->execute($intList);

		//$objMembers = \MembersModel;

		// Return if no Members were found
		if (!$objMembers->numRows)
		{
			return;
		}

		$strLink = '';

		// Generate a jumpTo link
		if ($this->jumpTo > 0)
		{
			$objJump = \PageModel::findByPk($this->jumpTo);

			if ($objJump !== null)
			{
				$strLink = $this->generateFrontendUrl($objJump->row(), ($GLOBALS['TL_CONFIG']['useAutoItem'] ? '/%s' : '/items/%s'));
			}
		}

		$arrMembers = array();

		// Generate Members
		while ($objMembers->next())
		{
			$strPhoto = '';
			$objPhoto = \FilesModel::findByPk($objMembers->photo);

			// Add photo image
			if ($objPhoto !== null)
			{
				$strPhoto = \Image::getHtml(\Image::get($objPhoto->path, '140', '187', 'center_center'));
			}

			$arrMembers[] = array
			(
				'name' => $objMembers->name,
                'family' => $objMembers->family,
				'post' => $objMembers->post,
				//'certs' => deserialize($objMembers->certs),
				'joined' => $objMembers->joined,
				'photo' => $strPhoto,
				//'description' => $objMembers->description,
				'link' => strlen($strLink) ? sprintf($strLink, $objMembers->alias) : ''
			);
		}

		$this->Template->members = $arrMembers;
	}
}