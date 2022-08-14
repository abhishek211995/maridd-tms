<?php
/*
 * Dashboard Sidebar Navigation
*/

$user_details = tm_get_current_user();

?>

<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>assets/images/common/logo/Mariddlogo.png"
                class="header-brand-img dark-logo" alt="logo">
        </a>
    </div>
    <div class="app-sidebar3 ps ps--active-y">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    <?php if(empty($user_details->user_image)){ ?>
                    <img src="<?php echo base_url() ?>/assets/images/common/user-profile-image.png"
                        class="avatar-xxl rounded-circle mb-1" alt="default">
                    <?php } else { ?>
                    <img src="<?php echo base_url().'uploads/'.$user_details->user_image ?>"
                        class="avatar-xxl rounded-circle mb-1" alt="default">
                    <?php } ?>
                </div>
                <div class="user-info">
                    <h5 class=" mb-2"><?php echo $user_details->user_first_name.' '.$user_details->user_last_name; ?></h5>
                    <span class="text-muted app-sidebar__user-name text-sm"><?php echo $user_details->user_role; ?></span>
                </div>
            </div>
        </div>
        <ul class="side-menu custom-ul">

            <?php
            
            $sidebar_items = get_sidebar_menus();
            foreach($sidebar_items[$user_details->user_role] as $items){
            ?>

            <li class="slide">
                <a class="side-menu__item" href="<?php echo (empty($items['submenu'])) ? base_url().$items['menu_link'] : '#'; ?>" <?php echo (!empty($items['submenu'])) ? 'data-bs-toggle="slide"' : ''; ?>>
                    <?php echo $items['menu_icon']; ?>
                    <span class="side-menu__label"><?php echo $items['menu_item']; ?></span>
                    <?php if(!empty($items['submenu'])){ ?>
                        <i class="angle fa fa-angle-right"></i>
                    <?php } ?>
                </a>

                <?php if(!empty($items['submenu'])){ ?>
                <ul class="slide-menu custom-ul">
                    <?php foreach($items['submenu'] as $submenu){ ?>
                    <li><a href="<?php echo base_url().$submenu['menu_link'] ?>" class="slide-item"><?php echo $submenu['menu_item'] ?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>

            </li>

            <?php } ?>
        </ul>
</aside>