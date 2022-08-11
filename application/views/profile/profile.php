<?php 
/*
 * Dashboard Template
*/

$this->load->view('common/header', $data);
?>
<div class="dashboard-page">
    <?php 
    
    $this->load->view('common/dashboard-sidebar');

    ?>
    <div class="app-content main-content">
        <div class="side-app">
            <?php $this->load->view('common/dashboard-navigation'); ?>
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <h4 class="page-title"><span
                            class="font-weight-normal text-muted ms-2"><?php echo $data['page_title']; ?></span></h4>
                </div>
            </div>
            <div class="row">
                <?php 
                    $user_details = tm_get_current_user();
                ?>
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="card user-pro-list overflow-hidden">
                        <div class="card-body">
                            <div class="user-pic text-center">
                            <?php if(empty($user_details->user_image)){ ?>
                                <img src="../assets/images/common/user-profile.png"
                                    class="avatar-xxl rounded-circle mb-1" alt="default">
                                <?php } else { ?>
                                <img src="<?php echo base_url().$user_details->user_image ?>"
                                    class="avatar-xxl rounded-circle mb-1" alt="default">
                                <?php } ?>

                                <div class="pro-user mt-3">
                                    <h5 class="pro-user-username text-dark mb-1 fs-16"><?php echo $user_details->user_first_name ?></h5>
                                    <h6 class="pro-user-desc text-muted fs-12"><?php echo $user_details->user_email ?></h6>
                                    <h6 class="pro-user-desc text-muted fs-12"><?php echo ucfirst($user_details->user_role) ?></h6>
                                    <!--<div class="btn-list">
                                        <a href="#" class="btn btn-secondary mt-3">Edit Profile</a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title"> Personal Details</h4>
                        </div>
                        <div class="card-body px-0 pb-0">

                            <div class="table-responsive tr-lastchild">
                                <table class="table mb-0 table-information">
                                    <tbody>
                                        <tr>
                                            <td class="py-2">
                                                <span class="font-weight-semibold w-50"> Name </span>
                                            </td>
                                            <td class="py-2 ps-4"><?php echo $user_details->user_first_name.' '.$user_details->user_last_name ?></td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                <span class="font-weight-semibold w-50"> Role </span>
                                            </td>
                                            <td class="py-2 ps-4">
                                                <?php echo ucfirst($user_details->user_role); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                <span class="font-weight-semibold w-50"> Email </span>
                                            </td>
                                            <td class="py-2 ps-4"><?php echo $user_details->user_email; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                <span class="font-weight-semibold w-50"> Phone </span>
                                            </td>
                                            <td class="py-2 ps-4"><?php echo $user_details->user_phone; ?></td>
                                        </tr>
                                        <!--<tr>
                                            <td class="py-2">
                                                <span class="font-weight-semibold w-50"> Languages </span>
                                            </td>
                                            <td class="py-2 ps-4">

                                                <ul class="custom-ul">
                                                    <li class="tag mb-1">English</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                <span class="font-weight-semibold w-50">Skills </span>
                                            </td>
                                            <td class="py-2 ps-4">

                                                <ul class="custom-ul">
                                                    <li class="tag mb-1"></li>
                                                </ul>
                                            </td>
                                        </tr>-->
                                        <tr>
                                            <td class="py-2">
                                                <span class="font-weight-semibold w-50"> Location </span>
                                            </td>
                                            <td class="py-2 ps-4">Bostwana</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h4 class="card-title"> Profile Details</h4>
                            </div>
                            <form id="updateprofile" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"> First Name <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="firstname" required value="<?php echo $user_details->user_first_name ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"> Last Name <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="lastname" required value="<?php echo $user_details->user_last_name ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"> Email address <span class="text-red">*</span></label>
                                                <input type="email" class="form-control" name="user_email" required value="<?php echo $user_details->user_email ?>">
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Gender <span class="text-red">*</span></label>
                                                <select class="form-control select2" name="user_gender" required>
                                                    <option label="Select Country"></option>
                                                    <option value="Male" <?php echo ($user_details->user_gender == "Male") ? 'selected' : ''; ?>> Male</option>
                                                    <option value="Female" <?php echo ($user_details->user_gender == "Female") ? 'selected' : ''; ?>> Female</option>
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"> Mobile Number</label>
                                                <input type="text" required class="form-control " name="user_phone" value="<?php echo $user_details->user_phone ?>">
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"> Languages</label>
                                                <input type="text" class="form-control" value="<?php echo $user_details->user_language; ?>" name="user_languages">
                                            </div>
                                        </div>-->
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"> Address</label>
                                                <input type="text" class="form-control" value="<?php echo $user_details->user_address; ?>" name="user_address">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Profile Image</label>
                                                <div class="input-group file-browser">
                                                    <input class="form-control" value="<?php echo $user_details->user_image ?>" name="user_profile_image" type="file" accept="image/png, image/jpeg,image/jpg">
                                                </div>
                                                <?php if(!empty($user_details->user_image)){ ?>
                                                <div class="user-pic">
                                                    <img src="<?php echo base_url().$user_details->user_image ?>" class="avatar-xl rounded-md mb-1" alt="default">
                                                </div>
                                                <?php } ?>
                                                <small class="text-muted"><i>The file size should not be more than 5MB</i></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <button type="submit" id="updateprofilebtn" class="btn btn-secondary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <form method="POST" id="updatepassword" action="">
                                <div class="card-header border-0">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Current Password <span class="text-red">*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="password" required class="form-control" required placeholder="Current Password" value="" name="current_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">New Password <span class="text-red">*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="password" required class="form-control " placeholder="New Password" value="" name="new_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Confirm Password <span class="text-red">*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="password" required class="form-control" placeholder="Confirm password" value="" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <input type="hidden" id="csrfname_pwd" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <button type="submit" id="updatePasswordBtn" class="btn btn-secondary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>