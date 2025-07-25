var dialog;

/*
    ADD FORM
*/
let pageEmbedHtml = 
`<div  class="wp-editor-help">
    <label>
        Select a page to embed
    </label>
    <br>
    ${pageSelect.html}
    <br>
</div>`;

let pageEmbedDialog = {
    width: 350,
    height: 160,
    title: 'Embed another page',
    items: {
        type: 'container',
        classes: 'wp-help',
        html: pageEmbedHtml
    },
    buttons: [{
        text: 'Embed another page',
        onclick: function(){
            // Get page id
            var pageId	= document.querySelector("[name='page-selector']").value;

            // Insert the shortcode at the end
            tinymce.activeEditor.setContent(tinymce.activeEditor.getContent()+`<br>[embed_page id=${pageId}]`);
            
            dialog.close();
        }
    },{
        text: 'Close',
        onclick: 'close'
    }]
} ;

//select page
tinymce.create(
    'tinymce.plugins.insert_embed_shortcode',
    {
        init:function(editor, url){
            editor.addCommand('mceInsert_embed_shortcode',
                function(){
                    dialog = editor.windowManager.open(pageEmbedDialog);
                    let select						= document.querySelector('.wp-editor-help [name="page-selector"]');
					Main.NiceSelect(select, {searchable: true});
					let niceselect 					= select._niceselect.dropdown
					niceselect.style.position		= 'relative';
					niceselect.style.width			= "200px";
					niceselect.style.border			= '2px solid #303030';
					niceselect.style.marginBottom	= '10px';
                }
            );
            
            editor.addButton('insert_embed_shortcode',
                {
                    tooltip: 'Embed another page in this page',
                    title:'Embed another page',
                    cmd:'mceInsert_embed_shortcode',
                    image:url+'/../pictures/embed.png'
                }
            );
        
        },
        
        createControl:function(){
            return null
        },
    }
);
//Register the plugin
tinymce.PluginManager.add(
    'insert_embed_shortcode',
    tinymce.plugins.insert_embed_shortcode
)

console.log('Page embed tiny_mce.js loaded');