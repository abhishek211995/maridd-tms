<?php 
/*
 * View Ticket Template
*/

$this->load->view('common/header', $data);
?>
<div class="dashboard-page">
    <?php 
    
    $this->load->view('common/dashboard-sidebar');

    $ticket_data = $data['ticket_data'];
    $ticket_chat = json_decode($ticket_data->ticket_chat);

    //echo 'Ticket ID : '.$this->input->get('id');
    //echo 'Ticket ID : '.$this->input->server('QUERY_STRING');

    ?>
    <div class="app-content main-content">
        <div class="side-app">
            <?php $this->load->view('common/dashboard-navigation'); ?>
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <h4 class="page-title"><span
                            class="font-weight-normal text-muted ms-2">#<?php echo $data['page_title']; ?></span></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-12">

                            <div class="card">
                                
                                <div class="card-header border-0 mb-1 d-block">
                                    <div class="d-sm-flex d-block">
                                        <div>
                                            <h4 class="card-title mb-1 fs-22"><?php echo $ticket_data->ticket_title ?></h4>
                                        </div>
                                        <div class="card-options float-sm-end ticket-status">
                                            <?php echo get_ticket_status($ticket_data->status); ?>
                                        </div>
                                    </div>
                                    <!--<small class="fs-13"><i class="fa fa-clock-o text-muted mr-1"></i>Last
                                        Updated on <span class="text-muted">24 minutes ago</span></small>-->
                                </div>
                                <div class="card-body pt-2 readmores px-6 mx-1">
                                    <?php 
                                    /*echo "<pre>";
                                    print_r($ticket_chat);
                                    echo "</pre>";*/
                                    ?>


                                    <div class="ticket-primary-content">
                                        <span><?php echo $ticket_chat->ticket_chats[0]->description ?></span>
                                    </div>

                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header border-0">
                                    <h4 class="card-title">Reply Ticket</h4>
                                </div>
                                <form method="POST" action="" id="ticket_view_form" enctype="multipart/form-data">
                                    <div class="card-body status">
                                        <?php if($ticket_data->status !== 'Solved'){ ?>
                                        <div class="form-group">
                                            <textarea class="summernote form-control " rows="6" cols="100"
                                                name="ticket_chat" aria-multiline="true"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Upload Image</label>
                                            <input class="form-control" name="ticket_attachment" type="file">
                                            <small class="text-muted"><i>The file size should not be more than
                                                    36MB</i></small>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">

                                        <?php 
                                        /*echo "<pre>";
                                        print_r($ticket_data);
                                        echo "</pre>";*/
                                        ?>

                                            <div class="custom-controls-stacked d-md-flex" id="text">
                                                <label class="form-label mt-1 mr-5">Status</label>
                                                <?php if($ticket_data->status !== 'Solved'){ ?>
                                                <label class="custom-control form-radio mr-4">

                                                    <input type="radio" class="custom-control-input hold" name="ticket_status"
                                                        value="active" <?php echo ($ticket_data->status == 'active') ? 'checked' : ''; ?> autocomplete="off">
                                                    <span class="custom-control-label">Active</span>

                                                </label>
                                                <label class="custom-control form-radio mr-4">

                                                    <input type="radio" class="custom-control-input hold" name="ticket_status"
                                                        value="Inprogress" <?php echo ($ticket_data->status == 'Inprogress') ? 'checked' : ''; ?> autocomplete="off">
                                                    <span class="custom-control-label">Inprogress</span>

                                                </label>
                                                <label class="custom-control form-radio mr-4">
                                                    <input type="radio" class="custom-control-input hold" name="ticket_status"
                                                        value="Solved" <?php echo ($ticket_data->status == 'Solved') ? 'checked' : ''; ?> autocomplete="off">
                                                    <span class="custom-control-label">Solved</span>
                                                </label>
                                                <label class="custom-control form-radio mr-4">
                                                    <input type="radio" class="custom-control-input" name="ticket_status"
                                                        id="onhold" value="On-Hold" <?php echo ($ticket_data->status == 'On-Hold') ? 'checked' : ''; ?> autocomplete="off">
                                                    <span class="custom-control-label">On-Hold</span>
                                                </label>
                                                <?php } else { ?>
                                                    <label class="custom-control form-radio mr-4">

                                                    <input type="radio" class="custom-control-input hold" name="ticket_status"
                                                        value="active" <?php echo ($ticket_data->status == 'active') ? 'checked' : ''; ?> autocomplete="off">
                                                    <span class="custom-control-label">Re-Open Ticket</span>

                                                    </label>

                                                    <small class="text-primary"><strong>This ticket is solved. If you think that your issue is still not solved you can Re-Open the ticket again</strong></small>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="form-group float-end">
                                            <input type="hidden" name="ticket_id" value="<?php echo $data['ticket_id']; ?>">
                                            <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                            <input type="submit" class="btn btn-secondary"  id="replyBtn">
                                        </div>
                                    </div>
                                </form>
                            </div>




                            <div class="card">
                                <div class="card-header border-0">
                                    <h4 class="card-title">Conversions</h4>
                                </div>
                                <div class="tms-support-conversation">
                                    <?php 
                                    $ticket_chat_arr = array_reverse($ticket_chat->ticket_chats);
                                    //echo "<pre>";
                                    //print_r($ticket_chat_arr);
                                    foreach($ticket_chat_arr as $chat){ 
                                    $user_details = tm_get_current_user($chat->user_id);
                                        
                                    ?>
                                    <div class="card-body">
                                        <div class="d-sm-flex">
                                            <div class="d-flex mr-3">
                                                <a href="#">

                                                    <img src="<?php echo base_url(); ?>assets/images/common/user-profile.png"
                                                        class="media-object rounded brround avatar-lg" alt="default">

                                                </a>
                                            </div>
                                            <div class="media-body">

                                                <h5 class="mt-1 mb-1 font-weight-semibold"><?php echo $user_details->user_first_name.' '.$user_details->user_last_name; ?><span
                                                        class="badge badge-primary-light badge-md ms-2"><?php echo $user_details->user_role; ?></span>
                                                </h5>

                                                <small class="text-muted"><i class="fa fa-clock-o"></i><?php echo date('d-m-Y h:i:s', $chat->added_date); ?></small>
                                                <div class="fs-13 mb-0 mt-1">
                                                    <?php echo $chat->description ?>
                                                </div>
                                                <?php if(!empty($chat->ticket_attachment)){ ?>
                                                <a class="text-muted" href="<?php echo base_url().$chat->ticket_attachment; ?>">View Attachment</a>
                                                <?php } ?>

                                            </div>

                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>


                        </div>

                        <div class="col-xl-3 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header  border-0">
                                    <div class="card-title">Ticket Information</div>
                                </div>
                                <div class="card-body pt-2 ps-0 pe-0 pb-0">
                                    <div class="table-responsive tr-lastchild">
                                        <table class="table mb-0 table-information">
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Ticket ID</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $ticket_data->ticket_id; ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="w-50">Ticket Category</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>

                                                        <span class="font-weight-semibold"><?php echo $ticket_data->ticket_category; ?></span>
                                                        <?php if(get_current_user_role() == 'superadmin' || get_current_user_role() == 'admin'){ ?>
                                                        <?php if($ticket_data->status !== 'Solved'){ ?>
                                                        <a href="javascript:void(0)" data-id="SP-5" data-toggle="modal" data-target="#AssignCatModal"
                                                            class="p-1 sprukocategory border border-primary br-7 text-white bg-primary ms-2">
                                                            <i class="fa fa-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Change Category"
                                                                aria-label="Change Category"></i></a>
                                                                <?php } ?>
                                                                <?php } ?>


                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Ticket Priority</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td id="priorityid">

                                                        <?php echo get_ticket_priority($ticket_data->ticket_priority); ?>
                                                        <?php if(get_current_user_role() == 'superadmin' || get_current_user_role() == 'admin'){ ?>
                                                            <?php if($ticket_data->status !== 'Solved'){ ?>
                                                        <button id="priority" data-toggle="modal" data-target="#AssignPriorityModal"
                                                            class="p-1 border border-primary br-7 text-white bg-primary ms-2">
                                                            <i class="fa fa-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=""
                                                                data-bs-original-title="Change priority"
                                                                aria-label="Add priority"></i>
                                                        </button>
                                                        <?php } } ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Open Date</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo date('d-m-Y h:i:s', $ticket_data->added_date) ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="w-50">Status</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo get_ticket_status($ticket_data->status); ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer ticket-buttons">

                                    

                                    <?php
                                    $emp_id = $ticket_data->assigned_employee;
                                    $emp_details = tm_get_current_user($emp_id);
                                    $emp_name = $emp_details->user_first_name.' '.$emp_details->user_last_name;
                                    
                                    
                                    $current_user = tm_get_current_user();
                                    //echo $current_user->user_role;
                                    ?>
                                    <?php 
                                    if($current_user->user_role == 'superadmin'){ ?>
                                    <?php if($ticket_data->status !== 'Solved'){ ?>
                                        
                                    <?php if(empty($emp_id)) { ?>
                                        <button data-id="5" id="assigned" class="btn btn-primary my-1" data-toggle="modal" data-target="#AssignEmpModal"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Assign">
                                            <i class="feather feather-users"></i> Assign
                                        </button>
                                    <?php } else { ?>
                                        <label>Ticket Assigned To:</label>
                                        <a data-toggle="modal" data-target="#AssignEmpModal" class="btn btn-primary"><?php echo $emp_name ?> <i class="fa fa-close"></i></a>
                                    <?php }
                                    } else { ?>
                                        <label>Ticket Assigned To:</label><br>
                                        <span class="badge badge-danger"><?php echo $emp_name; ?></span>
                                    <?php } } ?>

                                </div>
                            </div>

                            <!-- Customer Details -->
                            <div class="card">
                                <?php
                                $user_id = get_current_user_id();
                                $customer_details = get_customer_details($ticket_data->user);
                                ?>
                                <div class="card-header  border-0">
                                    <div class="card-title">Customer Details</div>
                                </div>
                                <div class="card-body text-center pt-2 px-0 pb-0 py-0">
                                    <div class="profile-pic">
                                        <div class="profile-pic-img mb-2">
                                            <span class="bg-success dots" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="" data-bs-original-title="Online"
                                                aria-label="Online"></span>

                                            <img src="https://uhelp.spruko.com/uhelp/uploads/profile/user-profile.png"
                                                class="brround avatar-xxl" alt="default">

                                        </div>
                                        <a href="#" class="text-dark">
                                            <h5 class="mb-1 font-weight-semibold2"><?php echo $customer_details->user_first_name.' '.$customer_details->user_last_name ?></h5>
                                            <small class="text-muted "><?php echo $customer_details->user_email ?>
                                            </small>
                                        </a>
                                    </div>
                                    <div class="table-responsive text-start tr-lastchild">
                                        <table class="table mb-0 table-information">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="w-50">Mobile Number</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $customer_details->user_phone ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="w-50">Company</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold">
                                                            Maridd Telecom
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End Customer Details -->
                            <!--ticke note  -->

                            <?php /*if(get_current_user_role() == 'superadmin' || get_current_user_role() == 'employee'){ ?>

                            <div class="card">
                                <div class="card-header  border-0">
                                    <div class="card-title">Ticket Note</div>
                                    <div class="card-options">

                                        <a href="javascript:void(0)" class="btn btn-secondary" id="create-new-note"><i
                                                class="fa fa-plus"></i></a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center ">
                                        <div class="avatar avatar-xxl empty-block mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50"
                                                viewBox="0 0 48 48">
                                                <path fill="#CDD6E0"
                                                    d="M12.8 4.6H38c1.1 0 2 .9 2 2V46c0 1.1-.9 2-2 2H6.7c-1.1 0-2-.9-2-2V12.7l8.1-8.1z">
                                                </path>
                                                <path fill="#ffffff"
                                                    d="M.1 41.4V10.9L11 0h22.4c1.1 0 2 .9 2 2v39.4c0 1.1-.9 2-2 2H2.1c-1.1 0-2-.9-2-2z">
                                                </path>
                                                <path fill="#CDD6E0" d="M11 8.9c0 1.1-.9 2-2 2H.1L11 0v8.9z"></path>
                                                <path fill="#FFD05C" d="M15.5 8.6h13.8v2.5H15.5z"></path>
                                                <path fill="#dbe0ef"
                                                    d="M6.3 31.4h9.8v2.5H6.3zM6.3 23.8h22.9v2.5H6.3zM6.3 16.2h22.9v2.5H6.3z">
                                                </path>
                                                <path fill="#FFD15C" d="M22.8 35.7l-2.6 6.4 6.4-2.6z"></path>
                                                <path fill="#334A5E" d="M21.4 39l-1.2 3.1 3.1-1.2z"></path>
                                                <path fill="#FF7058" d="M30.1 18h5.5v23h-5.5z"
                                                    transform="rotate(-134.999 32.833 29.482)"></path>
                                                <path fill="#40596B"
                                                    d="M46.2 15l1 1c.8.8.8 2 0 2.8l-2.7 2.7-3.9-3.9 2.7-2.7c.9-.6 2.2-.6 2.9.1z">
                                                </path>
                                                <path fill="#F2F2F2" d="M39.1 19.3h5.4v2.4h-5.4z"
                                                    transform="rotate(-134.999 41.778 20.536)"></path>
                                            </svg>
                                        </div>
                                        <h4 class="mb-2">Don’t have any notes yet</h4>
                                        <span class="text-muted">Add your notes here</span>
                                    </div>
                                </div>
                            </div>

                            <?php }*/ ?>

                            <!-- End ticket note  -->
                        </div>
                    </div>
                </div>
            </div>


            <!--===========================================================
            Assign Employee to a Ticket Modal 
            =============================================================-->
            <div id="AssignEmpModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Assign Technician to this Ticket</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" id="assign_ticket_to_emp">
                                <div class="form-group">
                                    <label for="selectEmp">Select Technician</label>
                                    <select class="form-control" name="emp_id">
                                        <option value="">Select Technician</option>
                                        <?php
                                            $emp_list = get_employee_list();
                                            foreach($emp_list as $emp){
                                                echo '<option value="'.$emp->user_id.'">'.$emp->user_first_name.' '.$emp->user_last_name.'</option>';
                                            }
                                        
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="ticket_id" value="<?php echo $data['ticket_id']; ?>">
                                <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button id="assignempbtn" type="submit" class="btn btn-primary">Assign Technician to Ticket</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!--===========================================================
            Assign Priority to a Ticket Modal 
            =============================================================-->
            <div id="AssignPriorityModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Set Priority to this Ticket</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" id="assign_priority_form">
                                <div class="form-group">
                                    <label for="selectEmp">Select Priority</label>
                                    <select class="form-control" name="priority">
                                        <option value="">Select Priority</option>
                                        <option value="Critical">Critical</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <input type="hidden" name="ticket_id" value="<?php echo $data['ticket_id']; ?>">
                                <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" id="setprioritybtn" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--===========================================================
            Assign Category to a Ticket Modal 
            =============================================================-->
            <div id="AssignCatModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Set Category to this Ticket</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" id="assign_category_form">
                                <div class="form-group">
                                    <label for="selectEmp">Select Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        <option value="Billing">Billing</option>
                                        <option value="Support">Support</option>
                                        <option value="Technical">Technical</option>
                                        <option value="Sales">Sales</option>
                                    </select>
                                </div>
                                <input type="hidden" name="ticket_id" value="<?php echo $data['ticket_id']; ?>">
                                <input type="hidden" id="csrfname" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <button type="submit" id="savecatbtn" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $this->load->view('common/footer'); ?>

        </div>