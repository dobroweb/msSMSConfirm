<?php
$msSMSConfirm = $modx->getService('mssmsconfirm','msSMSConfirm',$modx->getOption('mssc_core_path',null,$modx->getOption('core_path').'components/mssmsconfirm/').'model/mssmsconfirm/',$scriptProperties);
if (!($msSMSConfirm instanceof msSMSConfirm) || !$msSMSConfirm->active) return '';

if (empty($tpl)) $tpl = 'tpl.msSMSConfirm.form';

$modx->regClientStartupScript('<script type="text/javascript" src="' . $msSMSConfirm->frontjs . '"></script>', true);
$output = $modx->getChunk($tpl, $scriptProperties);

return $output;