/*
*    LEGEND:
*    - AINOW_UUID:
*        - AINOW stays for Artificial Intelligence Knowledge.
*        - UUID stays for Unique User ID.
*    - Ainow-Lsh: AINOW-Loading-Sign-Holder
 */

var loading_sign = "<div id='ainow-lsh'><div class='loader'></div></div>";

jQuery( document ).ready(function( $ ){
    if ( typeof(Storage) !== "undefined" ) {
        //localStorage.removeItem( "AINOW_UUID" ); // Uncomment this line only for test purposes!
    
        hostname = window.location.hostname;
        if ( localStorage.AINOW_UUID !== "undefined" && localStorage.AINOW_UUID !== undefined && localStorage.AINOW_UUID != "" ) {
            if ( localStorage.AINOW_UUID.indexOf( hostname ) > -1 ) {
                if ( sessionStorage.CURRENT_UUID === "undefined" || sessionStorage.CURRENT_UUID === undefined || sessionStorage.CURRENT_UUID == "" ) {
                    allIDS = localStorage.AINOW_UUID.split( "&" );
                    for ( count = 0; count < allIDS.length; count++ ) { if ( allIDS[ count ].indexOf( hostname ) > -1 ) { sessionStorage.CURRENT_UUID = allIDS[ count ]; break; } }
                }

                        jQuery.post(
                                ainow_ajax.ajax_url,
                                {
                                        'action': 'ainow_setup_uuid_global',
                                        'data': sessionStorage.CURRENT_UUID,
                                        'nonce': ainow_ajax.nonce
                                },
                                function( response ) {
                                        if ( response.success ) {
                                                console.log( 'UUID is set!' );
                                        } else {
                                                console.log( response.data.message );
                                        }
                                },
                                'json'
                        );
            } else { registerNewUUID(); }
        } else { registerNewUUID(); }
    } else {
        console.log( "The clients browser don't support localStorage. So I can't work :-(" );
    }

        jQuery( "#ainow-load-more-posts" ).on("click", function(){
                jQuery( "#ainow-posts-list" ).append( loading_sign );
                jQuery.post(
                        ainow_ajax.ajax_url,
                        {
                                'action': 'ainow_load_more_posts',
                                'data': '',
                                'nonce': ainow_ajax.nonce
                        },
                        function( response ) {
                                jQuery( '#ainow-lsh' ).remove();
                                if ( response.success && response.data.html ) {
                                        jQuery( '#ainow-posts-list' ).append( response.data.html );
                                } else {
                                        jQuery( '#ainow-load-more-posts' ).remove();
                                }
                        },
                        'json'
                );
        });
});

// Register new UUID function
function registerNewUUID() {
    jQuery.post(
        ainow_ajax.ajax_url,
        {
            'action': 'ainow_uuid_maker',
            'data': '',
            'nonce': ainow_ajax.nonce
        },
        function( response ) {
            if ( response.success && response.data.uuid ) {
                if ( ! localStorage.AINOW_UUID ) {
                    localStorage.AINOW_UUID = response.data.uuid;
                } else {
                    localStorage.AINOW_UUID += '&' + response.data.uuid;
                }
            } else {
                console.log( 'Something went very wrong in function: ainow_uuid_maker();' );
            }
        },
        'json'
    );
}