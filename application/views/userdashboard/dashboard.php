<?php 
/*
 * Dashboard Template
*/

$this->load->view('common/header', $data);

$user_details = tm_get_current_user();

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
                <h4 class="page-title"><span class="font-weight-normal text-muted ms-2">Dashboard</span></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="alert alert-danger">
                    You have not verified your account yet. Please verify your account to continue
                </div>-->
                <div class="card">
                    <div class="card-header border-0">
                        <h4 class="card-title">Welcome Back <?php echo $user_details->user_first_name; ?> 😊</h4>
                    </div>
                    <div class="card-body">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    </div>
                </div>
            </div>

            <!--
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">All Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">30</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-primary my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Active Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">20</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-warning my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Closed Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">09</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-success my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Oh-Hold Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">5</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-info my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">My Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">30</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-secondary my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Assigned Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">00</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-danger my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">My Assigned Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">4</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-primary my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card">
                    <a href="https://uhelp.spruko.com/uhelp/admin/alltickets" class="admintickets"></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-0 text-start"><span class="fs-14 font-weight-semibold">Overdue Tickets</span>
                                    <h3 class="mb-0 mt-1 mb-2">01</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="icon1 bg-danger my-auto  float-end"> <i class='bx bx-grid-alt'></i> </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>

    <?php
    $this->load->view('common/footer'); ?>

</div>