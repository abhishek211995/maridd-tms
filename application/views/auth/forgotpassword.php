<?php
/*
 * Template Name: Forgot Password
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

                        <h1 class="mb-1">Forgot Password</h1>
                        <p class="text-gray">Reset your password</p>
                        <?php echo form_open('authentication', array('id' => 'loginForm')); ?>
                            <div class="form-group">
                                <label class="form-label">Email <span class="text-red">*</span></label>
                                <input class="form-control" required placeholder="Email" type="email" id="email" value="" name="email">
                            </div>
                            <div class="submit">
                                <input class="btn btn-secondary btn-block" type="submit" value="Login">
                            </div>
                            <div class="text-center mt-3">
                                <p class="mb-2"><a class="text-gray" href="<?php echo base_url('authentication'); ?>">Login?</a></p>
                                <p class="mb-2">New User ? <a href="<?php echo base_url('authentication/register'); ?>" class="text-gray"> Register an Account</a></p>
                            </div>
                        <?php echo form_close(); ?>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('common/footer');