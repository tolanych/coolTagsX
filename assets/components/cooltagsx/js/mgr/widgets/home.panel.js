coolTagsX.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'cooltagsx-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('cooltagsx') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('cooltagsx_items'),
                layout: 'anchor',
                items: [{
                    html: _('cooltagsx_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'cooltagsx-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    coolTagsX.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(coolTagsX.panel.Home, MODx.Panel);
Ext.reg('cooltagsx-panel-home', coolTagsX.panel.Home);
