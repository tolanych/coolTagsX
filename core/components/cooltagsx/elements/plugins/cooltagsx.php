<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var coolTagsX $App */
switch ($modx->event->name) {
    case 'OnMODXInit':
        if (!$App = $modx->getService('cooltagsx', 'coolTagsX', MODX_CORE_PATH . 'components/cooltagsx/model/')) {
            return;
        }
        break;
    default:
        if ($App = $modx->getService('coolTagsX')) {
            $App->handleEvent($modx->event, $scriptProperties);
        }
}