<?php
/*
 * Template Name: Login
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

                        <h1 class="mb-1">Login</h1>
                        <p class="text-gray">Sign In to your account</p>
                        <form id="loginForm" method="post">
                            <div class="form-group">
                                <label class="form-label">Email <span class="text-red">*</span></label>
                                <input class="form-control" required placeholder="Email" type="email" id="email" value="" name="user_email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password <span class="text-red">*</span></label>
                                <input class="form-control" required placeholder="Password" type="password" id="password" name="user_password">
                            </div>
                            <div class="form-group">
                                <label class="custom-control form-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                    <span class="custom-control-label">Remember me</span>
                                </label>
                            </div>
                            <div class="submit">
                                <input type="hidden" id="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button class="btn btn-secondary btn-block" id="loginbtn" type="submit" value="Login">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                <p class="mb-2"><a class="text-gray" href="<?php echo base_url('forgot-password'); ?>">Forgot Password?</a></p>
                                <p class="mb-2">New User ? <a href="<?php echo base_url('authentication/register'); ?>" class="text-gray"> Register an Account</a></p>
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