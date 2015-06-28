<?php
/**
 * The base class for msSMSConfirm.
 */

class msSMSConfirm {

	/* @var modX $modx */
	public $modx;
	public $namespace = 'mssmsconfirm';
	public $config = array();
	public $active = false;
	public $sendsnippet;
	public $frontjs;
	public $users_exclude;

	/**
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct (modX &$modx, array $config = array()) {
		$this->modx =& $modx;
		$this->namespace = $this->modx->getOption('namespace', $config, 'mssmsconfirm');
		$corePath = $this->modx->getOption('mssc_core_path', $config, $this->modx->getOption('core_path') . 'components/mssmsconfirm/');
		$assetsUrl = $this->modx->getOption('mssc_assets_url', $config, $this->modx->getOption('assets_url') . 'components/mssmsconfirm/');
		$connectorUrl = $assetsUrl . 'connector.php';
		$this->config = array_merge(array(
			'assetsUrl' => $assetsUrl,
			'jsUrl' => $assetsUrl . 'js/',
			'connectorUrl' => $connectorUrl,
			'corePath' => $corePath,
			'modelPath' => $corePath . 'model/',
			'chunksPath' => $corePath . 'elements/chunks/',
			'chunkSuffix' => '.chunk.tpl',
			'snippetsPath' => $corePath . 'elements/snippets/'
		), $config);
		$this->modx->lexicon->load('mssmsconfirm:default');
		$this->active = $this->modx->getOption('mssc_active', $config, false);
		$this->sendsnippet = $this->modx->fromJSON($this->modx->getOption('mssc_send_snippet', $config, null));
		$this->frontjs = str_replace('[[+assetsUrl]]', $this->config['assetsUrl'], $this->modx->getOption('mssc_front_js', $config, $this->config['jsUrl'].'web/mssconfirm.js'));
		if ($this->users_exclude = $this->modx->getOption('mssc_users_exclude', $config, null))
			$this->users_exclude = ($this->users_exclude === '*') ? '*' : explode(',', $this->users_exclude);
	}

}