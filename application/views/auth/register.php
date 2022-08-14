<?php
/*
 * Template Name: Register
*/

//print_r($data);

$this->load->view('common/header', $data);

?>

<section class="login-section d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body login-card p-5">

                        <img src="<?php echo base_url() ?>/assets/images/common/logo/Mariddlogo.png" alt="Maridd Logo">

                        <h1 class="mb-1">Register</h1>
                        <p class="text-gray">Create new account</p>
                        <?php //echo form_open('authentication/process_user_registration', array('id' => 'userRegistrationForm', 'method' => 'post')); ?>
                        <form id="userRegistrationForm" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">First Name <span class="text-red">*</span></label>
                                    <input class="form-control required" required placeholder="First Name" type="text" id="first_name" value="" name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name <span class="text-red">*</span></label>
                                    <input class="form-control required" required placeholder="Last Name" type="text" id="last_name" value="" name="last_name">
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="form-label">Email <span class="text-red">*</span></label>
                                <input class="form-control required" required placeholder="Email" type="email" id="email" value="" name="user_email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password <span class="text-red">*</span></label>
                                <input class="form-control required" required placeholder="Password" type="password" id="password" name="user_password">
                            </div>
                            <div class="form-group">
                                <label class="custom-control form-checkbox">
                                    <input type="checkbox" required class="custom-control-input required" name="remember" id="remember">
                                    <span class="custom-control-label">I agree to the Terms & Conditions</span>
                                </label>
                            </div>
                            <div class="submit">
                                <input type="hidden" name="user_role" value="<?php echo
                                (isset($_GET['role'])) ? $_GET['role'] : '';?>">
                                <input type="hidden" name="company_id" value="<?php echo (!isset($_GET['company']) || $_GET['company'] == '') ? 0 : 1; ?>">
                                <input type="hidden" id="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button class="btn btn-secondary btn-block" type="submit" name="submit" id="registrationBtn" value="Register">Register</button>
                            </div>
                            <div class="text-center mt-3">
                                <p class="mb-2"><a class="text-gray" href="<?php echo base_url('forgot-password'); ?>">Forgot Password?</a></p>
                                <p class="mb-2">Already have an account ? <a href="<?php echo base_url('authentication'); ?>" class="text-gray"> Login</a></p>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('common/footer');