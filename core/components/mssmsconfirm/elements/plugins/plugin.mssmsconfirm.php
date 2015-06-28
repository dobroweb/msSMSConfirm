<?php
if ($modx->event->name != 'msOnSubmitOrder') return;

$msSMSConfirm = $modx->getService('mssmsconfirm','msSMSConfirm',$modx->getOption('mssc_core_path',null,$modx->getOption('core_path').'components/mssmsconfirm/').'model/mssmsconfirm/',$scriptProperties);
if (!($msSMSConfirm instanceof msSMSConfirm)
	|| !$msSMSConfirm->active
	|| ($msSMSConfirm->users_exclude === '*' && $modx->user->get('id')>0)
	|| ($modx->user->get('id')>0 && in_array($modx->user->get('id'),$msSMSConfirm->users_exclude))
	|| $_SESSION['mssc_sms_code'] === true )
		return;

if (empty($data['phone'])) return $modx->event->output($modx->lexicon('mssc_err_needphone'));

if (empty($_SESSION['mssc_sms_code']) || !empty($_REQUEST['mssc_sms_request'])) {
	$_SESSION['mssc_sms_code'] = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
	if ( $key = array_search('[[+phone]]', $msSMSConfirm->sendsnippet['options']) )
		$msSMSConfirm->sendsnippet['options'][$key] = str_replace('[[+phone]]', $data['phone'], $msSMSConfirm->sendsnippet['options'][$key]);
	if ( $key = array_search('[[+message]]', $msSMSConfirm->sendsnippet['options']) ) {
		$message = $modx->lexicon('mssc_sms_content', array('code'=>$_SESSION['mssc_sms_code']));
		$msSMSConfirm->sendsnippet['options'][$key] = str_replace('[[+message]]', $message, $msSMSConfirm->sendsnippet['options'][$key]);
	}
	if ( $modx->runSnippet($msSMSConfirm->sendsnippet['snippet'], $msSMSConfirm->sendsnippet['options']) ) {
		return !empty($_REQUEST['mssc_sms_request']) ? $modx->event->output($modx->lexicon('mssc_err_smsrequest'))
			: $modx->event->output($modx->lexicon('mssc_err_needcode'));
	} else return $modx->event->output($modx->lexicon('mssc_err_notsend'));
} elseif ($_REQUEST['mssc_sms_code'] !== $_SESSION['mssc_sms_code']) {
	return $modx->event->output($modx->lexicon('mssc_err_invalidcode'));
} else $_SESSION['mssc_sms_code'] = true;
return $modx->event->output('Прошло');