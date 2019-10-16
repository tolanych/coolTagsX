<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var coolTagsX $coolTagsX */
$coolTagsX = $modx->getService('coolTagsX', 'coolTagsX', MODX_CORE_PATH . 'components/cooltagsx/model/');
$modx->lexicon->load('cooltagsx:default');

// handle request
$corePath = $modx->getOption('cooltagsx_core_path', null, $modx->getOption('core_path') . 'components/cooltagsx/');
$path = $modx->getOption('processorsPath', $coolTagsX->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);