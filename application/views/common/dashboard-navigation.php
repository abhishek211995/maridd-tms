<?php 
/*
 * Template Name: Dashboard Navigation Bar
*/

$user_details = tm_get_current_user();

?>

<div class="app-header header header-main">
    <div class="container-fluid">
        <div class="d-flex">
            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                <a class="close-toggle" href="#">
                    <i class='bx bx-menu'></i>
                </a>
                <a class="open-toggle" href="#">
                    <i class='bx bx-x'></i>
                </a>
            </div>
            <div class="header-buttons-main">
                <!--<a class="btn btn-outline-light header-buttons text-center"
                    href="<?php echo base_url(); ?>dashboard/ticket/create-ticket"><i
                        class="fa fa-paper-plane-o pe-lg-2"></i><span class="d-m-none">Create Ticket</span></a>-->

            </div><!-- SEARCH -->
            <div class="d-flex order-lg-2 ml-auto dropdown-container align-items-center">
                <div class="dropdown profile-dropdown">
                    <a class="nav-link p-1 leading-none dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="user-initials">
                            <?php echo get_user_initials(); ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
                        <div class="p-2 text-center border-bottom">
                            <a href="<?php echo base_url(); ?>dashboard/profile"
                                class="text-center user pb-0 font-weight-bold"><?php echo $user_details->user_first_name.' '.$user_details->user_last_name; ?></a>
                            <p class="text-center user-semi-title"><?php echo $user_details->user_role; ?></p>
                        </div>
                        <a class="dropdown-item d-flex" href="<?php echo base_url(); ?>dashboard/profile">
                            <i class='bx bx-user me-3 fs-16 my-auto'></i>
                            <div class="mt-1">Profile</div>
                        </a>
                        <a type="submit" class="dropdown-item d-flex" href="<?php echo base_url() ?>authentication/logout">
                            <i class='bx bxs-arrow-to-right me-3 fs-16 my-auto'></i>
                            <div class="mt-1">Log Out</div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>