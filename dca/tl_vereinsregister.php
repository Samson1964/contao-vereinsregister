<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package News
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Table tl_vereinsregister
 */
$GLOBALS['TL_DCA']['tl_vereinsregister'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_vereinsregister_chronik', 'tl_vereinsregister_chairman', 'tl_vereinsregister_members', 'tl_vereinsregister_namen'),
		'switchToEdit'                => true, 
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id'             => 'primary',
				'alias'          => 'index',
				'foundingDate'   => 'index',
				'resolutionDate' => 'index'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 2,
			'fields'                  => array('alias'),
			'flag'                    => 1,
			'panelLayout'             => 'sort;filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('name', 'timerange'),
			'format'                  => '%s (%s)',
			'label_callback'          => array('tl_vereinsregister', 'listVereine')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif',
			),
			'editChronik' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['editChronik'],
				'href'                => 'table=tl_vereinsregister_chronik',
				'icon'                => 'system/modules/vereinsregister/assets/images/history.png'
			),
			'editNamen' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['editNamen'],
				'href'                => 'table=tl_vereinsregister_namen',
				'icon'                => 'system/modules/vereinsregister/assets/images/namen.png'
			),
			'editChairman' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['editChairman'],
				'href'                => 'table=tl_vereinsregister_chairman',
				'icon'                => 'system/modules/vereinsregister/assets/images/chairman.png'
			),
			'editMembers' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['editMembers'],
				'href'                => 'table=tl_vereinsregister_members',
				'icon'                => 'system/modules/vereinsregister/assets/images/members.png'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_vereinsregister', 'toggleIcon')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_vereinsregister']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('addImage', 'protected', 'addBefore', 'addAfter'), 
		'default'                     => '{name_legend},name,alias;{time_legend:hide},timerange,foundingDate,resolutionDate;{before_legend:hide},addBefore;{after_legend:hide},addAfter;{info_legend:hide},info;{place_legend:hide},city,land;{image_legend},addImage;{link_legend:hide},url;{intern_legend:hide},intern;{protected_legend:hide},protected;{expert_legend:hide},guests;{publish_legend},published,start,stop'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'addImage'                    => 'singleSRC,alt,title,size,imagemargin,imageUrl,fullsize,caption,floating',
		'protected'                   => 'groups',
		'addBefore'                   => 'beforeClubs',
		'addAfter'                    => 'afterClubs',
	), 
	
	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['name'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['alias'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alias', 'unique'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_vereinsregister', 'generateAlias')
			),
			'sql'                     => "varbinary(128) NOT NULL default ''"
		), 
		'timerange' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['timerange'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => false,
			'filter'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'foundingDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['foundingDate'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 12,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('Vereinsregister', 'getDate')
			),
			'save_callback' => array
			(
				array('Vereinsregister', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'resolutionDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['resolutionDate'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 12,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('Vereinsregister', 'getDate')
			),
			'save_callback' => array
			(
				array('Vereinsregister', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'addBefore' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['addBefore'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'beforeClubs' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['beforeClubs'],
			'exclude'                 => true,
			'options_callback'        => array('tl_vereinsregister', 'getVereinsliste'),
			'onsubmit_callback'       => array(array('tl_vereinsregister', 'getVereinsliste')),
			'inputType'               => 'select',
			'eval'                    => array
			(
				'mandatory'           => true, 
				'chosen'              => true, 
				'multiple'            => true, 
				'class'               => 'clr'
			),
			'sql'                     => "blob NULL", 
		),
		'addAfter' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['addAfter'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'afterClubs' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['afterClubs'],
			'exclude'                 => true,
			'options_callback'        => array('tl_vereinsregister', 'getVereinsliste'),
			'onsubmit_callback'       => array(array('tl_vereinsregister', 'getVereinsliste')),
			'inputType'               => 'select',
			'eval'                    => array
			(
				'mandatory'           => true, 
				'chosen'              => true, 
				'multiple'            => true, 
				'class'               => 'clr'
			),
			'sql'                     => "blob NULL", 
		),
		'info' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['info'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => false,
			'filter'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE'),
			'explanation'             => 'insertTags', 
			'sql'                     => "mediumtext NULL"
		),
		'city' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['city'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 3,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'land' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['land'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'addImage' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['addImage'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
			'sql'                     => "binary(16) NULL",
		),
		'alt' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['alt'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['size'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => $GLOBALS['TL_CROP'],
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'imagemargin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['imagemargin'],
			'exclude'                 => true,
			'inputType'               => 'trbl',
			'options'                 => array('px', '%', 'em', 'rem', 'ex', 'pt', 'pc', 'in', 'cm', 'mm'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'imageUrl' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['imageUrl'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('Vereinsregister', 'pagePicker')
			),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'fullsize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['fullsize'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'caption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['caption'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'allowHtml'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'floating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['floating'],
			'default'                 => 'above',
			'exclude'                 => true,
			'inputType'               => 'radioTable',
			'options'                 => array('above', 'left', 'right', 'below'),
			'eval'                    => array('cols'=>4, 'tl_class'=>'w50'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'sql'                     => "varchar(32) NOT NULL default ''"
		), 
		'url' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['url'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => false,
			'filter'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'long'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		), 
		'intern' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['intern'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'filter'                  => false,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE'),
			'sql'                     => "text NULL"
		), 
		'protected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['protected'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['groups'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>true),
			'sql'                     => "blob NULL",
			'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		),
		'guests' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['guests'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['published'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50','isBoolean' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'start' => array
		(
			'exclude'                 => true,
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['start'],
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 clr wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'stop' => array
		(
			'exclude'                 => true,
			'label'                   => &$GLOBALS['TL_LANG']['tl_vereinsregister']['stop'],
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
	)
);


/**
 * Class tl_vereinsregister
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    News
 */
class tl_vereinsregister extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Generiert automatisch ein Alias aus Vor- und Nachname
	 * @param mixed
	 * @param \DataContainer
	 * @return string
	 * @throws \Exception
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate alias if there is none
		if ($varValue == '')
		{
			$autoAlias = true;
			$varValue = standardize(String::restoreBasicEntities($dc->activeRecord->name));
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_vereinsregister WHERE alias=?")
								   ->execute($varValue);

		// Check whether the news alias exists
		if ($objAlias->numRows > 1 && !$autoAlias)
		{
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
		}

		// Add ID to alias
		if ($objAlias->numRows && $autoAlias)
		{
			$varValue .= '-' . $dc->id;
		}

		return $varValue;
	} 

	/**
	 * Add the type of input field
	 * @param array
	 * @return string
	 */
	public function listVereine ($arrRow)
	{
		$temp = '<div class="tl_content_left">' . $arrRow['name'];
		if($arrRow['timerange']) $temp .= ' <span style="color:#b3b3b3;padding-left:3px">[' . $arrRow['timerange'] . ']</span>';
		$temp .= '</div>';
		return $temp;
	}

	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$this->import('BackendUser', 'User');
	
		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 0));
			$this->redirect($this->getReferer());
		}
	
		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_vereinsregister::published', 'alexf'))
		{
			return '';
		}
	
		$href .= '&amp;id='.$this->Input->get('id').'&amp;tid='.$row['id'].'&amp;state='.$row[''];
	
		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}
	
		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}

	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnPublished)
	{
		// Check permissions to publish
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_vereinsregister::published', 'alexf'))
		{
			$this->log('Not enough permissions to show/hide club record ID "'.$intId.'"', 'tl_vereinsregister toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}
	
		$this->createInitialVersion('tl_vereinsregister', $intId);
	
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_vereinsregister']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_vereinsregister']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnPublished = $this->$callback[0]->$callback[1]($blnPublished, $this);
			}
		}
	
		// Update the database
		$this->Database->prepare("UPDATE tl_vereinsregister SET tstamp=". time() .", published='" . ($blnPublished ? '' : '1') . "' WHERE id=?")
			 ->execute($intId);
		$this->createNewVersion('tl_vereinsregister', $intId);
	}

	public function getVereinsliste(DataContainer $dc)
	{
		$array = array();
		$objVereine = $this->Database->prepare("SELECT id, name, timerange, published, start, stop FROM tl_vereinsregister ORDER BY name ASC")->execute();
		while($objVereine->next())
		{
			// Veröffentlichungsstatus ermitteln
			if((!$objVereine->start || $objVereine->start < time()) && (!$objVereine->stop || $objVereine->stop > time()) && $objVereine->published) $published = true;
			else $published = false;
			
			if($published) $array[$objVereine->id] = '<b>' . $objVereine->name . '</b> [' . $objVereine->timerange . ']';
			else $array[$objVereine->id] = '<i>' . $objVereine->name . '</i> (' . $GLOBALS['TL_LANG']['tl_content']['nll_unpublished'] . ') [' . $objVereine->timerange . ']';
		}
		return $array;
	}
	
}
