
<?php 
/*
 * View Ticket Template
*/

$this->load->view('common/header', $data);
?>
<div class="dashboard-page">
    <?php 
    
    $this->load->view('common/dashboard-sidebar');

    $company_data = $data['ticket_data'];
    
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
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                
                                <div class="card-header border-0 mb-1 d-block">
                                    <div class="d-sm-flex d-block">
                                        <div>
                                            <h4 class="card-title mb-1 fs-22"><?php echo $company_data->company_name ?></h4>
                                        </div>
                                        <div class="card-options float-sm-end ticket-status">
                                            <?php echo get_ticket_status($company_data->status); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">

                                <div class="card-header  border-0">
                                    <div class="card-title">Company Information</div>
                                </div>
                                <div class="card-body pt-2 ps-0 pe-0 pb-0">
                                    <div class="table-responsive tr-lastchild">
                                        <table class="table mb-0 table-information">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="w-50">Company ID</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $company_data->company_unique_id; ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Company name</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $company_data->company_name ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Company Email</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $company_data->company_email ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Company Address</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $company_data->company_address ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Total Users</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $company_data->total_users ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Total Technicians</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $company_data->total_technician ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Open Date</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $company_data->added_date ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Status</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo get_ticket_status($company_data->status); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $user_id = get_current_user_id();
                                $owner_details = get_company_owner_details($company_data->company_id);
                                ?>
                            <div class="card">
                                 <div class="card-header  border-0">
                                    <div class="card-title">Company Owner Details</div>
                                </div>
                                <div class="card-body pt-2 ps-0 pe-0 pb-0">
                                    <div class="table-responsive tr-lastchild">
                                        <table class="table mb-0 table-information">
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Owner Name</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <span class="font-weight-semibold"><?php echo $owner_details->user_first_name.' '.$owner_details->user_last_name; ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="w-50">Owner Email</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $owner_details->user_email ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Owner Mobile</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $owner_details->user_phone ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span class="w-50">Owner Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo get_ticket_status($owner_details->user_status) ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="center">
                                    <a href="javascript:window.history.go(-1);" >Back</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $this->load->view('common/footer'); ?>
        </div>
    </div>
</div>
<style>
.center {
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>