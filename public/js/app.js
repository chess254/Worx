/* Theme Name: Worx
   Author: Chess254
   Version: 1.0.0
   File Description: Main JS file of the template
*/


(function ($) {

    'use strict';

    // Loader 
    $(window).on('load', function() {
        $('#status').fadeOut();
        $('#preloader').delay(150).fadeOut('slow');
        $('body').delay(200).css({
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
    fromdate = button.data('fromdate').split(' ')[0];
    todate = button.data('todate').split(' ')[0];
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
    start_date = button.data('start_date').split(' ')[0];
    end_date = button.data('end_date').split(' ')[0];
    job_location_city = button.data('city');
    job_location_county = button.data('county');
    job_location_country = button.data('country');
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
    console.log(start_date);
    console.log(button.data());

});

//when creating job, populates company data when selected from dropdown
$('#company_id').change(function() {
    $.get('../company-profile/'+this.value, function(data){
        // Code to populate the secondary select element

        var company = data;
        console.log(company);
        console.log("company id:" + company.id);
        $('#company_name').val(company.name);
        $('#company_email').val(company.email);
        $('#company_website').val(company.website);
        $('#company_biz_stream').val(company.business_stream.name);
        $('#company_id').val(company.id);
        $('#company_business_stream_id').val(company.business_stream.id);
        $('#company_twitter').val(company.twitter);
        $(tinymce.get('company_description').getBody()).html(company.description);
        
    });
});

// let addEducInput = 2;
// document.getElementById('add-education-details').onclick = function () {
//     let template = `
//     <hr>
//     <div class="row pt-5" >
//         <div class="col-md-6">
//                                 <div class="form-group app-label">
//                                     <label class="text-muted">Course</label>
//                                     <input name="educ[${addEducInput}][course]"  type="text" class="form-control resume" placeholder="">
//                                 </div>
//                             </div>

//                             <div class="col-md-6">
//                                 <div class="form-group app-label">
//                                     <label class="text-muted">Institute</label>
//                                     <input name="educ[${addEducInput}][institute]"  type="text" class="form-control resume"
//                                            placeholder="">
//                                 </div>
//                             </div>

//                             <div class="col-lg-6">
//                                 <div class="form-group app-label">
//                                     <label class="text-muted">Certificate</label>
//                                     <input name="educ[${addEducInput}][certificate]"  type="text" class="form-control resume"
//                                            placeholder="">
//                                 </div>
//                             </div>

//                             <div class="col-lg-6">
//                                 <div class="row">
//                                     <div class="col-md-6">
//                                         <div class="form-group app-label">
//                                             <label class="text-muted">Date From</label>
//                                             <input name="educ[${addEducInput}][starting-date]"  type="date" class="form-control resume"
//                                                    placeholder="01-Jan-2018">
//                                         </div>
//                                     </div>

//                                     <div class="col-md-6">
//                                         <div class="form-group app-label">
//                                             <label class="text-muted">Date To</label>
//                                             <input name="educ[${addEducInput}][completion-date]"  type="date" class="form-control resume"
//                                                    placeholder="31-March-2019">
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>

//                             <div class="col-lg-12">
//                                 <div class="form-group app-label">
//                                     <label>Additional Information :</label>
//                                     <textarea name="educ[${addEducInput}][addition-details]"  rows="4" class="form-control resume"
//                                               placeholder=""></textarea>
//                                 </div>
//                             </div>
// </div>
        
//         `;

//     let container = document.getElementById('education-container');
//     let div = document.createElement('div.custom-form');
//     div.innerHTML = template;
//     container.appendChild(div);

//     addEducInput++;
// }

