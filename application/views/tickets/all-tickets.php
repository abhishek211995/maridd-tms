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

                    $customers = get_customer_list();
                    /*echo "<pre>";
                    print_r($data['ticket_data']);
                    echo "</pre>";*/
                ?>

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h4 class="card-title"> All Tickets</h4>
                            </div>
                            <div class="card-body">
                                <?php if(!empty($data['ticket_data'])){ ?>
                                <table class="datatableInt table table-vcenter table-responsive text-nowrap table-bordered table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>#ID</th>
                                            <th>User</th>
                                            <th>Title</th>
                                            <th>Priority</th>
                                            <th>Category</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach($data['ticket_data'] as $ticket_data){ 
                                            $user_details = tm_get_current_user($ticket_data->user);
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $ticket_data->ticket_id ?></td>
                                            <td><?php echo $user_details->user_first_name.' '.$user_details->user_last_name; ?></td>
                                            <td><?php echo $ticket_data->ticket_title ?></td>
                                            <td><?php echo get_ticket_priority($ticket_data->ticket_priority) ?></td>
                                            <td><?php echo $ticket_data->ticket_category ?></td>
                                            <td><?php echo date('d-m-Y h:i:s', $ticket_data->added_date); ?></td>
                                            <td><?php echo get_ticket_status($ticket_data->status); ?></td>
                                            <td>
                                                <div class="flex action-items">
                                                    <a href="<?php echo base_url() ?>dashboard/ticket/<?php echo $ticket_data->id.'/'.$ticket_data->ticket_id ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url() ?>dashboard/ticket/<?php echo $ticket_data->id.'/'.$ticket_data->ticket_id ?>"><i class="fa fa-eye"></i></a>
                                                    <!--<a href="#"><i class="fa fa-trash"></i></a>-->
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                                    $i++;
                                    } ?>
                                    </tbody>
                                </table>
                                <?php } else{ ?>
                                    <div class="alert alert-danger">
                                        Oops ! No tickets available. Please try submitting a ticket.
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>