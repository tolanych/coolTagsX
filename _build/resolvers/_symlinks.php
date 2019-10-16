<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/coolTagsX/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/cooltagsx')) {
            $cache->deleteTree(
                $dev . 'assets/components/cooltagsx/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/cooltagsx/', $dev . 'assets/components/cooltagsx');
        }
        if (!is_link($dev . 'core/components/cooltagsx')) {
            $cache->deleteTree(
                $dev . 'core/components/cooltagsx/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/cooltagsx/', $dev . 'core/components/cooltagsx');
        }
    }
}

return true;