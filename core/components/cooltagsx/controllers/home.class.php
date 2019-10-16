<?php

/**
 * The home manager controller for coolTagsX.
 *
 */
class coolTagsXHomeManagerController extends modExtraManagerController
{
    /** @var coolTagsX $coolTagsX */
    public $coolTagsX;


    /**
     *
     */
    public function initialize()
    {
        $this->coolTagsX = $this->modx->getService('coolTagsX', 'coolTagsX', MODX_CORE_PATH . 'components/cooltagsx/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['cooltagsx:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('cooltagsx');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->coolTagsX->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->coolTagsX->config['jsUrl'] . 'mgr/cooltagsx.js');
        $this->addJavascript($this->coolTagsX->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->coolTagsX->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->coolTagsX->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->coolTagsX->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->coolTagsX->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->coolTagsX->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        coolTagsX.config = ' . json_encode($this->coolTagsX->config) . ';
        coolTagsX.config.connector_url = "' . $this->coolTagsX->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "cooltagsx-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="cooltagsx-panel-home-div"></div>';

        return '';
    }
}