<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

class Vereinsregister 
{
	protected static $monate = array(1  => "Januar",
	                    2  => "Februar",
	                    3  => "März",
	                    4  => "April",
	                    5  => "Mai",
	                    6  => "Juni",
	                    7  => "Juli",
	                    8  => "August",
	                    9  => "September",
	                    10 => "Oktober",
	                    11 => "November",
	                    12 => "Dezember"
	                    );

	/**
	 * Datumswert JJJJMMTT / JJJJMM / JJJJ umwandeln (mit Monatsname)
	 * @param mixed
	 * @return mixed
	 */
	public static function getDateString($varValue)
	{
		$laenge = strlen($varValue);
		$temp = '';

		switch($laenge)
		{
			case 8: // JJJJMMTT
				$temp = (substr($varValue,6,2)+0).'. '.self::$monate[substr($varValue,4,2)+0].' '.substr($varValue,0,4);
				break;
			case 6: // JJJJMM
				$temp = self::$monate[substr($varValue,4,2)+0].' '.substr($varValue,0,4);
				break;
			case 4: // JJJJ
				$temp = $varValue;
				break;
			default: // anderer Wert
				$temp = $varValue;
		}

		return $temp;
	}

	/**
	 * Return the link picker wizard
	 * @param \DataContainer
	 * @return string
	 */
	public static function pagePicker(DataContainer $dc)
	{
		return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}


}
