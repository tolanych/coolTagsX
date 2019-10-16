coolTagsX.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'cooltagsx-panel-home',
            renderTo: 'cooltagsx-panel-home-div'
        }]
    });
    coolTagsX.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(coolTagsX.page.Home, MODx.Component);
Ext.reg('cooltagsx-page-home', coolTagsX.page.Home);