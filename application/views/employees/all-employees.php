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
            <div class="page-header d-xl-flex d-block justify-content-between">
                <div class="page-leftheader">
                    <h4 class="page-title"><span
                            class="font-weight-normal text-muted ms-2"><?php echo $data['page_title']; ?></span></h4>
                </div>
                <div class="page-rightheader">
                <a href="<?php echo  base_url(); ?>dashboard/create-employee" class="btn btn-green">Add Technicians</a>
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
                                <h4 class="card-title"> Technicians</h4>
                                
                            </div>
                            <div class="card-body">
                                <table class="datatableInt table table-vcenter text-nowrap table-bordered table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach($data['customer_data'] as $c_data){ 
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $c_data->user_id ?></td>
                                            <td><?php echo $c_data->user_first_name.' '.$c_data->user_last_name; ?></td>
                                            <td><?php echo $c_data->user_email; ?></td>
                                            <td><?php echo $c_data->user_phone ?></td>
                                            <td><?php echo get_user_status_html($c_data->user_status) ?></td>
                                            <td><?php echo date('d-m-Y h:i:s', $c_data->added_date); ?></td>
                                            <td>
                                                <div class="flex action-items">
                                                    <a href="<?php echo base_url() ?>dashboard/ticket/<?php echo $c_data->user_id ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url() ?>dashboard/ticket/<?php echo $c_data->user_id ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                                    $i++;
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
    $this->load->view('common/footer'); ?>

        </div>