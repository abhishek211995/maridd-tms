<?php
/*
 * Here is the sidebar code
*/


function get_sidebar_menus(){
    $sidebar_items = array(
        'superadmin' => array(
            array(
                'menu_item' => 'Dashboard',
                'menu_link' => 'dashboard/stats',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            array(
                'menu_item' => 'Profile',
                'menu_link' => 'dashboard/profile',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            array(
                'menu_item' => 'Tickets',
                'menu_link' => 'dashboard/tickets',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z">
                    </path>
                </svg>',
                'custom_link' => '',
                'submenu' => array(
                    array(
                        'menu_item' => 'Create Tickets',
                        'menu_link' => 'dashboard/ticket/create-ticket',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'All Tickets',
                        'menu_link' => 'dashboard/ticket/all-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'My Tickets',
                        'menu_link' => 'dashboard/my-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                    array(
                        'menu_item' => 'Active Tickets',
                        'menu_link' => 'dashboard/ticket/active-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'Solved Tickets',
                        'menu_link' => 'dashboard/ticket/closed-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'Assigned Tickets',
                        'menu_link' => 'dashboard/ticket/assigned-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'My Assigned Tickets',
                        'menu_link' => 'dashboard/ticket/my-assigned-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                    array(
                        'menu_item' => 'On-Hold Tickets',
                        'menu_link' => 'dashboard/ticket/onhold-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'Overdue Tickets',
                        'menu_link' => 'dashboard/Overdue-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                ),
            ),
            array(
                'menu_item' => 'Manage Users',
                'menu_link' => '',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><path d="M4,18v-0.65c0-0.34,0.16-0.66,0.41-0.81C6.1,15.53,8.03,15,10,15c0.03,0,0.05,0,0.08,0.01c0.1-0.7,0.3-1.37,0.59-1.98 C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26c-0.42-0.6-0.75-1.28-0.97-2H4z"></path><path d="M10,12c2.21,0,4-1.79,4-4s-1.79-4-4-4C7.79,4,6,5.79,6,8S7.79,12,10,12z M10,6c1.1,0,2,0.9,2,2s-0.9,2-2,2 c-1.1,0-2-0.9-2-2S8.9,6,10,6z"></path><path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z"></path></g></g></svg>',
                'custom_link' => '',
                'submenu' => array(
                    array(
                        'menu_item' => 'Users',
                        'menu_link' => 'dashboard/all-customers',
                        'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M9 13.75c-2.34 0-7 1.17-7 3.5V19h14v-1.75c0-2.33-4.66-3.5-7-3.5zM4.34 17c.84-.58 2.87-1.25 4.66-1.25s3.82.67 4.66 1.25H4.34zM9 12c1.93 0 3.5-1.57 3.5-3.5S10.93 5 9 5 5.5 6.57 5.5 8.5 7.07 12 9 12zm0-5c.83 0 1.5.67 1.5 1.5S9.83 10 9 10s-1.5-.67-1.5-1.5S8.17 7 9 7zm7.04 6.81c1.16.84 1.96 1.96 1.96 3.44V19h4v-1.75c0-2.02-3.5-3.17-5.96-3.44zM15 12c1.93 0 3.5-1.57 3.5-3.5S16.93 5 15 5c-.54 0-1.04.13-1.5.35.63.89 1 1.98 1 3.15s-.37 2.26-1 3.15c.46.22.96.35 1.5.35z"></path></svg>',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'Technicians',
                        'menu_link' => 'dashboard/all-employees',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'Roles & Permissions',
                        'menu_link' => 'dashboard/roles-permissions',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                )
            ),
            
            array(
                'menu_item' => 'Reports',
                'menu_link' => 'dashboard/reports',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19.5 3.5L18 2l-1.5 1.5L15 2l-1.5 1.5L12 2l-1.5 1.5L9 2 7.5 3.5 6 2 4.5 3.5 3 2v20l1.5-1.5L6 22l1.5-1.5L9 22l1.5-1.5L12 22l1.5-1.5L15 22l1.5-1.5L18 22l1.5-1.5L21 22V2l-1.5 1.5zM19 19.09H5V4.91h14v14.18zM6 15h12v2H6zm0-4h12v2H6zm0-4h12v2H6z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            
            array(
                'menu_item' => 'Logout',
                'menu_link' => 'authentication/logout',
                'menu_icon' => '<i class="bx bxs-arrow-to-right me-3 fs-22 my-auto"></i>',
                'custom_link' => '',
                'submenu' => array()
            )
            
        ),


        'technician' => array(
            array(
                'menu_item' => 'Dashboard',
                'menu_link' => 'dashboard/stats',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            array(
                'menu_item' => 'Profile',
                'menu_link' => 'dashboard/profile',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            array(
                'menu_item' => 'Tickets',
                'menu_link' => 'dashboard/tickets',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z">
                    </path>
                </svg>',
                'custom_link' => '',
                'submenu' => array(
                    /*array(
                        'menu_item' => 'Create Tickets',
                        'menu_link' => 'dashboard/ticket/create-ticket',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                    array(
                        'menu_item' => 'My Tickets',
                        'menu_link' => 'dashboard/ticket/all-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'My Tickets',
                        'menu_link' => 'dashboard/my-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                    array(
                        'menu_item' => 'Active Tickets',
                        'menu_link' => 'dashboard/ticket/active-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'Solved Tickets',
                        'menu_link' => 'dashboard/ticket/closed-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'Assigned Tickets',
                        'menu_link' => 'dashboard/assigned-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                    array(
                        'menu_item' => 'On-Hold Tickets',
                        'menu_link' => 'dashboard/ticket/onhold-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'Overdue Tickets',
                        'menu_link' => 'dashboard/Overdue-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                ),
            ),
            array(
                'menu_item' => 'Reports',
                'menu_link' => 'dashboard/reports',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19.5 3.5L18 2l-1.5 1.5L15 2l-1.5 1.5L12 2l-1.5 1.5L9 2 7.5 3.5 6 2 4.5 3.5 3 2v20l1.5-1.5L6 22l1.5-1.5L9 22l1.5-1.5L12 22l1.5-1.5L15 22l1.5-1.5L18 22l1.5-1.5L21 22V2l-1.5 1.5zM19 19.09H5V4.91h14v14.18zM6 15h12v2H6zm0-4h12v2H6zm0-4h12v2H6z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            array(
                'menu_item' => 'Logout',
                'menu_link' => 'authentication/logout',
                'menu_icon' => '',
                'custom_link' => '',
                'submenu' => array()
            )
        ),


        'user' => array(
            array(
                'menu_item' => 'Dashboard',
                'menu_link' => 'dashboard/stats',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            array(
                'menu_item' => 'Profile',
                'menu_link' => 'dashboard/profile',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"></path></svg>',
                'custom_link' => '',
                'submenu' => array()
            ),
            array(
                'menu_item' => 'Tickets',
                'menu_link' => 'dashboard/tickets',
                'menu_icon' => '<svg class="sidemenu_icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M22 10V6c0-1.11-.9-2-2-2H4c-1.1 0-1.99.89-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2zm-2-1.46c-1.19.69-2 1.99-2 3.46s.81 2.77 2 3.46V18H4v-2.54c1.19-.69 2-1.99 2-3.46 0-1.48-.8-2.77-1.99-3.46L4 6h16v2.54zM11 15h2v2h-2zm0-4h2v2h-2zm0-4h2v2h-2z">
                    </path>
                </svg>',
                'custom_link' => '',
                'submenu' => array(
                    array(
                        'menu_item' => 'Create Tickets',
                        'menu_link' => 'dashboard/ticket/create-ticket',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'All Tickets',
                        'menu_link' => 'dashboard/ticket/all-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'Active Tickets',
                        'menu_link' => 'dashboard/ticket/active-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'Solved Tickets',
                        'menu_link' => 'dashboard/ticket/closed-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    array(
                        'menu_item' => 'On-Hold Tickets',
                        'menu_link' => 'dashboard/ticket/onhold-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),
                    /*array(
                        'menu_item' => 'Overdue Tickets',
                        'menu_link' => 'dashboard/Overdue-tickets',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    ),*/
                    array(
                        'menu_item' => 'Logout',
                        'menu_link' => 'authentication/logout',
                        'menu_icon' => '',
                        'custom_link' => '',
                        'submenu' => array()
                    )
                ),
            ),
        )


        

    );

    return $sidebar_items;
}