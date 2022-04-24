(function() {

    // if ( typeof border === "undefined" ) return;

    let vl = green;



    //console.log( vl );

    tinymce.PluginManager.add( vl.key, function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton( vl.key, {
            title: vl.title,
            cmd:  vl.key,
            text: vl.text,
        });
        editor.addCommand( vl.key, function() {
            var selected_text = editor.selection.getContent({
                'format': 'html'
            });

            selected_text = selected_text ? selected_text : "Text";
           
            var open_column = vl.before + selected_text + vl.after;
        
            editor.execCommand('mceReplaceContent', false, open_column);
            return;
        });
    });

    

})();


