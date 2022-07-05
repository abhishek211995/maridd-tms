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
                <?php 
                    $user_details = tm_get_current_user();

                    $customers = get_customer_list();
                ?>

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h4 class="card-title"> Create Ticket</h4>
                            </div>
                            <form id="createticket" method="post">
                                <div class="card-body">
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Ticket Subject <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<input type="text" id="ticket_title" required class="form-control " placeholder="Ticket Subject" name="subject" value="">
											</div>
										</div>
									</div>
                                    <?php
                                    
                                    $user = tm_get_current_user();
                                    if($user->user_role == 'superadmin'){
                                    ?>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Select Customer <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<select class="form-control select-2-int" name="ticket_user" required>
                                                    <option value="">Select Customer</option>
                                                    <?php foreach($customers as $customer){ ?>
                                                        <option value="<?php echo $customer->user_id ?>"><?php echo $customer->user_first_name.' '.$customer->user_last_name.' ('.$customer->user_email.')'; ?></option>
                                                    <?php } ?>
                                                </select>
											</div>
										</div>
									</div>
                                    <?php } else { ?>
                                        <input type="hidden" name="ticket_user" value="<?php echo get_current_user_id(); ?>">
                                    <?php } ?>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Ticket Category <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<select class="form-control" required name="ticket_category">
                                                    <option value="">Select Category</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Technical">Technical</option>
                                                    <option value="Billing">Billing</option>
                                                    <option value="Support">Support</option>
                                                </select>
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Ticket Description <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
												<textarea class="summernote" name="ticket_description" required></textarea>
											</div>
										</div>
									</div>
                                    <div class="form-group ">
									    <div class="row">
											<div class="col-md-3">
												<label class="form-label mb-0 mt-2">Upload Image <span class="text-red">*</span></label>
											</div>
											<div class="col-md-9">
                                            <div class="form-group">
                                                <div class="input-group file-browser">
                                                    <input class="form-control" value="" name="ticket_image" type="file">
                                                </div>
                                            </div>
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
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>