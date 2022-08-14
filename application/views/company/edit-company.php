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
                                <h4 class="card-title"> Edit Company</h4>
                            </div>
                            <form id="editcompany" method="post">
                                <div class="card-body">
                                    <div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Name <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="company_name" required class="form-control " placeholder="Company Name" name="company_name" value="<?php echo $data['company_details']->company_name; ?>">
											</div>
										</div>
									</div>
									<div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Email <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="email" id="company_email" required class="form-control " placeholder="Company Email" name="company_email" value="<?php echo $data['company_details']->company_email; ?>">
											</div>
										</div>
									</div>
                                    
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Phone Number <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="company_phone_number" required class="form-control " placeholder="Company Phone Number" name="company_phone_number" value="<?php echo $data['company_details']->company_mobile; ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Company Address <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="company_address_name" required class="form-control " placeholder="Company Address" name="company_address_name" value="<?php echo $data['company_details']->company_address; ?>">
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
													<?php if($data['company_details']->status == 'Active'){?>
														<option value="">--Select Status--</option>
														<option value="Active" selected>Active</option>
														<option value="Inactive">Inactive</option>
													<?php }else if($data['company_details']->status == 'Inactive'){?>
														<option value="">--Select Status--</option>
														<option value="Active">Active</option>
														<option value="Inactive" selected>Inactive</option>
													<?php }else{?>
														<option value="" selected>--Select Status--</option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
                                </div>
                                <div class="card-footer text-end">
									<input type="hidden" name="company_id" value="<?php echo $data['company_details']->company_id; ?>">
                                    <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <button type="submit" id="editcompanybtn" class="btn btn-secondary">Edit Company</button>
                                    <a href="javascript:window.history.go(-1);" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>