(function($){   
  // edit coupons
  $(document).on( 'change', '#displayRepertoiresFiles select', function( event ) {
        var entreprise = $("#entreprisesFiles").val();
        var repertoire = $(this).val();
        var page = location.href;
        jQuery.post(
            ajaxurl,
            {
            'action': 'repertoires_files',
            'entreprise': entreprise,
            'repertoire': repertoire,
            'page' : page
            },
            function (data, response) {
                jQuery('#displayFilesInRep').html(data);
            console.log(data);
            }
        );

    });

    // Add coupon
  $(document).on( 'change', '#displayRepertoiresFiles select', function( event ) {
    var entreprise = $("#entreprisesFiles").val();
    var repertoire = $(this).val();
    var page = location.href;
    jQuery.post(
        ajaxurl,
        {
        'action': 'repertoires_files',
        'entreprise': entreprise,
        'repertoire': repertoire,
        'page' : page
        },
        function (data, response) {
            jQuery('#displayFilesInRep').html(data);
        console.log(data);
        }
    );

});

})(jQuery);