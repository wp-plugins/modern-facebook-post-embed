(function() {
    tinymce.PluginManager.add('facebook_post_embed', function(editor, url) {
        editor.addButton('facebook_post_embed', {
            text:  false,
            title: 'Modern Facebook Post Embed',
            icon: 'facebook-post-embed-icon',
            onclick: function() {
                editor.insertContent('[mfb_pe url="" mbottom="50"]');
            }
        });
    });
})();