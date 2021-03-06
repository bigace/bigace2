<?php
/**
 * BIGACE - a PHP and MySQL based Web CMS.
 * Copyright (C) Kevin Papst.
 *
 * BIGACE is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @author Kevin Papst 
 * @copyright Copyright (C) Kevin Papst
 * @version $Id$
 * @package bigace.smarty
 * @subpackage function
 */


import('classes.util.links.LoginFormularLink');
import('classes.util.LinkHelper');

/**
 * Returns the URL to the Login Formular.
 * 
 * Parameter:
 * - id
 * - language
 * - redirectURL (skip next two parameter if set)
 * - redirectCMD
 * - redirectID
 */
function smarty_function_link_login($params, &$smarty)
{
    $link = new LoginFormularLink();
    if(isset($params['id']))
    	$link->setItemID($params['id']);
    if(isset($params['language']))
    	$link->setLanguageID($params['language']);
    
    if(!isset($params['redirectURL'])) {
	    if(isset($params['redirectID']))
	    	$link->setRedirectID($params['redirectID']);
	    	
	    if(isset($params['redirectCMD']))
	    	$link->setRedirectCommand($params['redirectCMD']);
    }
    else {
	    $link->setRedirectURL($params['redirectURL']);
    }
    return LinkHelper::getUrlFromCMSLink($link);
}
