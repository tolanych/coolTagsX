var coolTagsX = function (config) {
    config = config || {};
    coolTagsX.superclass.constructor.call(this, config);
};
Ext.extend(coolTagsX, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('cooltagsx', coolTagsX);

coolTagsX = new coolTagsX();