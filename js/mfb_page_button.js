(function() {
    tinymce.PluginManager.add('facebook_page_embed', function(editor, url) {
        editor.addButton('facebook_page_embed', {
            text:  false,
            title: 'Modern Facebook Page Embed',
            icon: 'facebook-page-embed-icon',
            onclick: function() {
                editor.insertContent('[mfb_page url="" cover="true" facepile="true" feed="false" mbottom="50"]');
            }
        });
    });
})();