jQuery( document ).ready(function() {
    "use strict"
    jQuery('#add_author').click(()=>{
        jQuery('#show_authors').show();
    })
    jQuery('#submit').click( function(e) {
        e.preventDefault();
        var data={
            action :'add_book',
        };
        data['nonce'] = localizedObject.nonce;

        data['editor'] = jQuery('#editor').val();
        data['author'] = jQuery('#author').val();
        data['full_name'] = jQuery('#full_name').val();
        data['edition_type'] = jQuery('#edition_type').val();
        data['volume_lines'] = jQuery('#volume_lines').val();
        data['book_format'] = jQuery('#book_format').val();
        data['circulations'] = jQuery('#circulations').val();
        data['neck'] = jQuery('#neck').val();
        data['city'] = jQuery('#city-publisher').val();
        data['ISBN'] = jQuery('#ISBN').val();
        data['MPF'] = jQuery('#MPF').val();
        data['funding_source'] = jQuery('#funding-source').val();
        data['budget'] = jQuery('#budget').val();
        data['book_link'] = jQuery('#book-link').val();
        data['book_notes'] = jQuery('#book-notes').val();

        let IPM_availability = 0;
        var selected = jQuery("input[name='IPM_availability']:checked");

        if (selected.length > 0) {
            IPM_availability = 1;
        }
        data['IPM_availability'] = IPM_availability;


        jQuery.ajax(
            {
                url:localizedObject.ajaxurl,
                type:'POST',
                data: data,
                success: function(result){
                
                    alert(result.data);
                },
                error:  function(err){
                    console.log(err);
                }
            });
            
        })
})