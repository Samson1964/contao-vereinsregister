<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   bdf
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2014
 */

/**
 * Backend-Bereich DSB anlegen, wenn noch nicht vorhanden
 */
if(!$GLOBALS['BE_MOD']['dsb']) 
{
	$dsb = array(
		'dsb' => array()
	);
	array_insert($GLOBALS['BE_MOD'], 0, $dsb);
}


$GLOBALS['BE_MOD']['dsb']['vereinsregister'] = array
(
	'tables'         => array('tl_vereinsregister', 
							  'tl_vereinsregister_chronik', 
							  'tl_vereinsregister_chairman', 
							  'tl_vereinsregister_namen', 
							  'tl_vereinsregister_members', 
							  'tl_vereinsregister_images'
							 ),
	'icon'           => 'system/modules/vereinsregister/assets/images/icon.png',
);

?>