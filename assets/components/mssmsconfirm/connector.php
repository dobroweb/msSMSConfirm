<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('mssc_core_path', null, $modx->getOption('core_path') . 'components/mssmsconfirm/');
require_once $corePath . 'model/mssmsconfirm/mssmsconfirm.class.php';
$modx->msSMSConfirm = new msSMSConfirm($modx);

$modx->lexicon->load(array('mssmsconfirm:default', 'mssmsconfirm:manager'));

/* handle request */
$path = $modx->getOption('processorsPath', $modx->msSMSConfirm->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));