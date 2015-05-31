(function() {
    tinymce.PluginManager.add('facebook_video_embed', function(editor, url) {
        editor.addButton('facebook_video_embed', {
            text:  false,
            title: 'Modern Facebook video Embed',
            icon: 'facebook-video-embed-icon',
            onclick: function() {
                editor.insertContent('[mfb_video url="" size="500" mbottom="50"]');
            }
        });
    });
})();