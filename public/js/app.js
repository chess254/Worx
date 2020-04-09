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

// to send data to modal on profile page, when user clicks edit on their education details
$("#eduModal").on('show.bs.modal', function (e) {
    console.log('edu modal opened');
    var button = $(e.relatedTarget);
    var institute,certificate,course,fromdate,todate,educid;
    institute = button.data('institute');
    certificate = button.data('certificate');
    course = button.data('course');
    fromdate = button.data('fromdate');
    todate = button.data('todate');
    educid = button.data('educid');
     
    var modal = $(this);
    modal.find('.modal-body #edit_certificate').val(certificate);
    modal.find('.modal-body #edit_institute').val(institute);
    modal.find('.modal-body #edit_course').val(course);
    modal.find('.modal-body #edit_from_date').val(fromdate);
    modal.find('.modal-body #edit_to_date').val(todate);
    modal.find('.modal-body #educationDetails_id').val(educid);
    console.log(educid);

});

$("#expModal").on('show.bs.modal', function (e) {
    console.log('exp modal opened');
    var button = $(e.relatedTarget);
    var company_name,job_title,start_date,end_date,website,job_location_city,job_location_county,job_location_country,expid;
    company_name = button.data('company_name');
    job_title = button.data('job_title');
    website = button.data('website');
    start_date = button.data('start_date');
    end_date = button.data('end_date');
    job_location_city = button.data('job_location_city');
    job_location_county = button.data('job_location_county');
    job_location_country = button.data('job_location_country');
    expid = button.data('expid');
     
    var modal = $(this);
    modal.find('.modal-body #edit_job_title').val(job_title);
    modal.find('.modal-body #edit_company_name').val(company_name);
    modal.find('.modal-body #edit_website').val(website);
    modal.find('.modal-body #edit_start_date').val(start_date);
    modal.find('.modal-body #edit_end_date').val(end_date);
    modal.find('.modal-body #edit_job_city').val(job_location_city);
    modal.find('.modal-body #edit_job_county').val(job_location_county);
    modal.find('.modal-body #edit_job_country').val(job_location_country);
    modal.find('.modal-body #experienceDetails_id').val(expid);
    console.log(expid);

});

