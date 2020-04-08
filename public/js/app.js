/* Theme Name: Joba - Responsive Landing Page Template
   Author: Maidathemes
   Version: 1.0.0
   File Description: Main JS file of the template
*/


(function ($) {

    'use strict';

    // Loader 
    $(window).on('load', function() {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({
            'overflow': 'visible'
        });
    }); 

    // Selectize
    $('#select-category, #select-lang,#select-country').selectize({
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        },
        dropdownParent: 'body'
    });

    // Checkbox all select
    $("#customCheckAll").click(function() {
        $(".all-select").prop('checked', $(this).prop('checked'));
    });

    // Nice Select
    $('.nice-select').niceSelect();

    // Back to top
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    }); 
    $('.back-to-top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 3000);
        return false;
    });

    
})(jQuery)

// Clicking the save button on the open modal for both CREATE and UPDATE
// $("#update_bio").click(function (e) {
//     // $.ajaxSetup({
//     //     headers: {
//     //         'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
//     //     }
//     // });
//     e.preventDefault();
//     var formData = {
//         url: '/update',
//         bio: jQuery('#edit_bio').val(),
//     };
//     // var state = jQuery('#btn-save').val();
//     var type = "POST";
//     var link_id = jQuery('#link_id').val();
//     var ajaxurl = 'links';
//     // if (state == "update") {
//     //     type = "PUT";
//     //     ajaxurl = 'links/' + link_id;
//     // }
//     $.ajax({
//         type: type,
//         url: '/update',
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             $('#bio').val() = bio;
//             // if (state == "add") {
//             //     jQuery('#links-list').append(link);
//             // } else {
//             //     $("#link" + link_id).replaceWith(link);
//             // }
//             jQuery('#modalFormData').trigger("reset");
//             jQuery('#linkEditorModal').modal('hide')
//         },
//         error: function (data) {
//             console.log('Error:', data);
//         }
//     });
// });
