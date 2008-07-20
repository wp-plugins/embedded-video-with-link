(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('embeddedvideo');
	
	tinymce.create('tinymce.plugins.embeddedvideoPlugin', {
		init : function(ed, url) {
			var t = this;
			t.editor = ed;
			ed.addCommand('mce_embeddedvideo', t._embeddedvideo, t);
			ed.addButton('embeddedvideo',{
				title : 'embeddedvideo.desc', 
				cmd : 'mce_embeddedvideo',
				image : url + '/img/embeddedvideo-button.png'
			});
		},
		
		getInfo : function() {
			return {
				longname : 'Embedded Video Plugin for Wordpress',
				author : 'Stefan He&szlig;',
				authorurl : 'http://www.jovelstefan.de',
				infourl : 'http://www.jovelstefan.de/embedded-video/',
				version : '2.0'
			};
		},
		
		// Private methods
		_embeddedvideo : function() { // open a popup window
			embeddedvideo_insert();
			return true;
		}
	});

	// Register plugin
	tinymce.PluginManager.add('embeddedvideo', tinymce.plugins.embeddedvideoPlugin);
})();