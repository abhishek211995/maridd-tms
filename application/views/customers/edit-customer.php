<?php 
/*
 * Create Ticket Template
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
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h4 class="card-title"> Edit User</h4>
                            </div>
                            <form id="edituser" method="post">
                                <div class="card-body">
                                    <div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">First Name <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="user_first_name" required class="form-control " placeholder="First Name" name="user_first_name" value="<?php echo $data['customer_details']->user_first_name; ?>">
											</div>
										</div>
									</div>
                                    <div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Last Name <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="user_last_name" required class="form-control " placeholder="Technician Last Name" name="user_last_name" value="<?php echo $data['customer_details']->user_last_name; ?>">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Email <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="email" id="user_email" required class="form-control " placeholder="Email" name="user_email" value="<?php echo $data['customer_details']->user_email; ?>">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Phone Number <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="user_phone_number" required class="form-control " placeholder="Phone Number" name="user_phone_number" value="<?php echo $data['customer_details']->user_phone; ?>">
											</div>
										</div>
									</div>
									<?php 
                                        	if($this->session->userdata('user_role') != 'Admin')
                                        	{

                                      	?>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<select name="user_company" class="form-control">
													<option value="">--Select Company--</option>
													<option value="0" <?php echo ($data['customer_details']->company_id == 0) ? 'selected' : ''; ?>>Maridd Telecom</option>
												</select>
											</div>
										</div>
									</div>
									<?php 
                                        	}
                                      	?>
                                </div>
                                <div class="card-footer text-end">
									<input type="hidden" name="user_id" value="<?php echo $data['customer_details']->user_id; ?>">
                                    <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <button type="submit" id="adduserbtn" class="btn btn-secondary">Update User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>