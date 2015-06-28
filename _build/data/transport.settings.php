<?php

$settings = array();

$tmp = array(
	'active' => array(
		'xtype' => 'combo-boolean',
		'value' => true,
		'area' => 'mssc_main',
	),
	'front_js' => array(
		'xtype' => 'textfield',
		'value' => '[[+assetsUrl]]js/web/mssconfirm.js',
		'area' => 'mssc_main',
	),
	'send_snippet' => array(
		'xtype' => 'textarea',
		'value' => '{"snippet":"sendSMS","options":{"phone":"[[+phone]]","message":"[[+message]]"}}',
		'area' => 'mssc_main',
	),
	'users_exclude' => array(
		'xtype' => 'textfield',
		'value' => '1',
		'area' => 'mssc_main',
	)
);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'mssc_' . $k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	), '', true, true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
