<?php

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['hikers_list']   = '{title_legend},name,headline,type;{group_legend},hikers_group;{redirect_legend},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['hikers_reader'] = '{title_legend},name,headline,type;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['hikers_group'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_module']['hikers_group'],
	'exclude'              => true,
	'inputType'            => 'radio',
	'foreignKey'           => 'tl_hikers_group.title',
	'eval'                 => array('multiple'=>false, 'mandatory'=>true),
	'sql'				   => "int(10) unsigned NOT NULL default '0'",
);
