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
                                <h4 class="card-title"> Add Company</h4>
                            </div>
                            <form id="addcompany" method="post">
                                <div class="card-body">
                                    <div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Name <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="company_name" required class="form-control " placeholder="Company Name" name="company_name" value="">
											</div>
										</div>
									</div>
									<div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Email <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="email" id="company_email" required class="form-control " placeholder="Company Email" name="company_email" value="">
											</div>
										</div>
									</div>
									<div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Phone Number <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="company_phone_number" required class="form-control " placeholder="Company Phone Number" name="company_phone_number" value="">
											</div>
										</div>
									</div>
                                    <div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Address <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="company_address_name" required class="form-control " placeholder="Company Address" name="company_address_name" value="">
											</div>
										</div>
									</div>
									<div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Status<span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<select name="company_status" class="form-control">
													<option value="">--Select Status--</option>
													<option value="Active">Active</option>
													<option value="Inactive">Inactive</option>
												</select>
											</div>
										</div>
									</div>
                                </div>
                                <div class="card-footer text-end">
                                    <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <button type="submit" id="addcompanybtn" class="btn btn-secondary">Add Company</button>
                                    <a href="all-companies" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>