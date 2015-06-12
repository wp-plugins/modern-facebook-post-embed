(function() {
    tinymce.PluginManager.add('facebook_comments_embed', function(editor, url) {
        editor.addButton('facebook_comments_embed', {
            text:  false,
            title: 'Modern Facebook Comments Embed',
            icon: 'facebook-comments-embed-icon',
            onclick: function() {
                editor.insertContent('[mfb_comments url="" postnumber="5" width="100%" mtop="30" mbottom="30"]');
            }
        });
    });
})();