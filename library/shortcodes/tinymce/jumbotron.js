// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.jumbotron', {
        init : function(ed, url) {
            ed.addButton('jumbotron', {
                title : 'Jumbotron',
                image : url+'/jumbotron.png',
                onclick : function() {
                     ed.selection.setContent('[jumbotron]' + ed.selection.getContent() + '[/jumbotron]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('jumbotron', tinymce.plugins.jumbotron);
})();