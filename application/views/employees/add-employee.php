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
                                <h4 class="card-title"> Add Technician</h4>
                            </div>
                            <form id="createemployee" method="post">
                                <div class="card-body">
                                    <div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Technician First Name <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="technician_first_name" required class="form-control " placeholder="Technician Name" name="technician_first_name" value="">
											</div>
										</div>
									</div>
                                    <div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Technician Last Name <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="technician_last_name" required class="form-control " placeholder="Technician Last Name" name="technician_last_name" value="">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Technician Email <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="email" id="technician_email" required class="form-control " placeholder="Technician Email" name="technician_email" value="">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Technician Phone Number <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="technician_phone_number" required class="form-control " placeholder="Technician Phone Number" name="technician_phone_number" value="">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Technician Company <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="technician_company" required class="form-control " placeholder="Technician Company" name="technician_company" value="">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Password <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="password" id="user_password" required class="form-control " placeholder="Technician Password" name="user_password" value="">
											</div>
										</div>
									</div>
                                </div>
                                <div class="card-footer text-end">
                                    <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <button type="submit" id="addtechnician" class="btn btn-secondary">Add Technician</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>