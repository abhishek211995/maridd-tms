
/*========================================================
TOASTIFY FUNCTION
=======================================================*/

function toastify(text, classname, duration){
    Toastify({
        text: text,
        className: classname,
        duration: duration,
        close: true
    }).showToast();
}

/*==========================================================
LOGIN FORM VALIDATION
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#loginForm").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Authentication/processlogin',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#loginbtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#loginbtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#loginbtn").html("Login");
                    jQuery("#loginbtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#loginForm').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'dashboard/stats';
                        }, 2000);
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
    });
});

/*==========================================================
USER REGISTRATION FORM VALIDATION
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#userRegistrationForm").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Authentication/process_user_registration',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#registrationBtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#registrationBtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#registrationBtn").html("Register");
                    jQuery("#registrationBtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#userRegistrationForm').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        $("#userRegistrationForm")[0].reset();
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/authentication';
                        }, 2000);
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});

/*==========================================================
UPDATE DASHBOARD PROFILE FOR ADMIN, EMPLOYEE, USER
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#updateprofile").validate({
        submitHandler: function(form) {
            var form = $('#updateprofile')[0];
            var formData = new FormData(form);
            console.log(formData);
            jQuery.ajax({
                url: localized_data.ajax_url+'UserProfile/update_profile',
                type: "POST",          
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function () {
                    jQuery("#updateprofilebtn").html("Please Wait <i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#updateprofilebtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#updateprofilebtn").html("Save Changes");
                    jQuery("#updateprofilebtn").removeAttr('disabled', 'disabled');
                },
                data: formData,
                success: function(data) {
                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            location.reload();
                        }, 1000);
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
    });
});


/*==========================================================
UPDATE DASHBOARD UPDATE PASSWORD
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#updatepassword").validate({
        submitHandler: function(form) {
            var form = $('#updatepassword')[0];
            var formData = new FormData(form);
            console.log(formData);
            jQuery.ajax({
                url: localized_data.ajax_url+'UserProfile/update_password',
                type: "POST",          
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function () {
                    jQuery("#updatePasswordBtn").html("Please Wait <i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#updatePasswordBtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#updatePasswordBtn").html("Save Changes");
                    jQuery("#updatePasswordBtn").removeAttr('disabled', 'disabled');
                },
                data: formData,
                success: function(data) {
                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            location.reload();
                        }, 1000);
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname_pwd").value = data.hash;
                }
            });
            return false;
        },
    });
});

/*==========================================================
CREATE TICKET ADMIN / USER / AGENT
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#createticket").validate({
        submitHandler: function(form) {
            var form = $('#createticket')[0];
            var formData = new FormData(form);
            console.log(formData);
            jQuery.ajax({
                url: localized_data.ajax_url+'Tickets/process_create_ticket',
                type: "POST",          
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function () {
                    jQuery("#updateprofilebtn").html("Please Wait <i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#updateprofilebtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#updateprofilebtn").html("Save Changes");
                    jQuery("#updateprofilebtn").removeAttr('disabled', 'disabled');
                },
                data: formData,
                success: function(data) {
                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            location.reload();
                        }, 1000);
                    } else {
                        toastify(data.msg, 'danger', 5000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
    });
});


/*========================================================================
REPLY TO TICKET FORM PROCESSING
==========================================================================*/


jQuery(document).ready(function(){
    jQuery("#ticket_view_form").validate({
        submitHandler: function(form) {
            var form = $('#ticket_view_form')[0];
            var formData = new FormData(form);
            console.log(formData);
            jQuery.ajax({
                url: localized_data.ajax_url+'Tickets/process_ticket_chat',
                type: "POST",          
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function () {
                    jQuery("#replyBtn").html("Please Wait <i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#replyBtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#replyBtn").html("Save Changes");
                    jQuery("#replyBtn").removeAttr('disabled', 'disabled');
                },
                data: formData,
                success: function(data) {
                    //console.log(data);
                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            location.reload();
                        }, 1000);
                    } else {
                        toastify(data.msg, 'danger', 5000);
                    }
                    jQuery('.csrfname').attr('value', data.hash);
                }
            });
            return false;
        },
    });
});


/*==========================================================
SET TICKET PRIORITY
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#assign_priority_form").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Tickets/set_ticket_priority',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#setprioritybtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#setprioritybtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#setprioritybtn").html("Save");
                    jQuery("#setprioritybtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#assign_priority_form').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            location.reload();
                        }, 2000);
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    //document.getElementsByClassName("csrfname").value = data.hash;
                    jQuery('.csrfname').attr('value', data.hash);
                }
            });
            return false;
        },
    });
});


/*==========================================================
SET TICKET CATEGORY
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#assign_category_form").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Tickets/set_ticket_category',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#savecatbtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#savecatbtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#savecatbtn").html("Save");
                    jQuery("#savecatbtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#assign_category_form').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            location.reload();
                        }, 2000);
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    jQuery('.csrfname').attr('value', data.hash);
                }
            });
            return false;
        },
    });
});

/*==========================================================
ASSIGN TICKET TO EMPLOYEE
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#assign_ticket_to_emp").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Tickets/assign_ticket_to_emp',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#assignempbtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#assignempbtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#assignempbtn").html("Save");
                    jQuery("#assignempbtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#assign_ticket_to_emp').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            location.reload();
                        }, 2000);
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    jQuery('.csrfname').attr('value', data.hash);
                }
            });
            return false;
        },
    });
});

/*========================================================================
REGISTER TECHNICIAN
==========================================================================*/

/*==========================================================
EMPLOYEE REGISTRATION FORM VALIDATION
==========================================================*/

jQuery(document).ready(function(){
    jQuery("#createemployee").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Employees/process_create_employee',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#addtechnician").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#addtechnician").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#addtechnician").html("Register");
                    jQuery("#addtechnician").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#createemployee').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        $("#createemployee")[0].reset();
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/dashboard/all-employees';
                        }, 2000);
                        
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});


jQuery(document).ready(function(){
    jQuery("#editemployee").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Employees/process_edit_employee',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#edittechnician").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#edittechnician").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#edittechnician").html("Register");
                    jQuery("#edittechnician").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#editemployee').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/dashboard/all-employees';
                        }, 2000);
                        
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});



/*==========================================================
USER REGISTRATION FORM VALIDATION
==========================================================*/


jQuery(document).ready(function(){
    jQuery("#adduser").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Customers/process_create_customer',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#adduserbtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#adduserbtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#adduserbtn").html("Register");
                    jQuery("#adduserbtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#adduser').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        $("#adduser")[0].reset();
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/dashboard/all-customers';
                        }, 2000);
                        
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});

/*==========================================================
USER EDIT FORM VALIDATION
==========================================================*/


jQuery(document).ready(function(){
    jQuery("#edituser").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Customers/process_edit_customer',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#adduserbtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#adduserbtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#adduserbtn").html("Register");
                    jQuery("#adduserbtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#edituser').serialize(),
                success: function(data) {
                    //jQuery('.csrfname').val(localized_data.csrf_tms_name);

                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        $("#edituser")[0].reset();
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/dashboard/all-customers';
                        }, 2000);
                        
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});

/*==========================================================
COMPANY REGISTRATION FORM VALIDATION
==========================================================*/


jQuery(document).ready(function(){
    jQuery("#addcompany").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Company/process_add_company',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#addcompanybtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#addcompanybtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#addcompanybtn").html("Register");
                    jQuery("#addcompanybtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#addcompany').serialize(),
                success: function(data) {
                    
                    if(data.status == 1)
                    {
                        toastify(data.msg, 'success', 10000);
                        $("#addcompany")[0].reset();
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/dashboard/all-companies';
                        }, 2000);
                        
                    }
                    else 
                    {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});
/*==========================================================
COMPANY EDIT FORM VALIDATION
==========================================================*/


jQuery(document).ready(function(){
    jQuery("#editcompany").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Company/process_edit_company',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#editcompanybtn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#editcompanybtn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#editcompanybtn").html("Register");
                    jQuery("#editcompanybtn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#editcompany').serialize(),
                success: function(data) {
                    
                    if(data.status == 1){
                        toastify(data.msg, 'success', 10000);
                        $("#editcompany")[0].reset();
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/dashboard/all-companies';
                        }, 1000);
                        
                    } else {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});
/*==========================================================
COMPANY REGISTRATION FORM VALIDATION PROFILE
==========================================================*/


jQuery(document).ready(function(){
    jQuery("#addcompany_v1").validate({
        submitHandler: function(form) {

            jQuery.ajax({
                url: localized_data.ajax_url+'Company/process_add_company_profile',
                type: "POST",          
                dataType: "json",
                beforeSend: function () {
                    jQuery("#addcompany_v1btn").html("<i class='bx bx-loader-alt bx-spin'></i>");
                    jQuery("#addcompany_v1btn").attr('disabled', 'disabled');
                },
                complete: function (response) {
                    jQuery("#addcompany_v1btn").html("Register");
                    jQuery("#addcompany_v1btn").removeAttr('disabled', 'disabled');
                },
                data: jQuery('#addcompany_v1').serialize(),
                success: function(data) {
                    
                    if(data.status == 1)
                    {
                        toastify(data.msg, 'success', 10000);
                        $("#addcompany_v1")[0].reset();
                        setTimeout(function(){ 
                            window.location.href = localized_data.ajax_url+'/dashboard/profile';
                        }, 2000);
                        
                    }
                    else 
                    {
                        toastify(data.msg, 'danger', 10000);
                    }
                    document.getElementById("csrfname").value = data.hash;
                }
            });
            return false;
        },
        
    });
});