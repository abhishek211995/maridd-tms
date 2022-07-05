<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$env = '';

if(isset($_SESSION)){
    $env = $_SESSION['role'];
}


$route['default_controller'] = 'Authentication';
$route['forgot-password'] = 'Authentication/forgot_password';


$route['dashboard/stats'] = 'UserDashboard';
$route['dashboard/profile'] = 'UserProfile/profile';

$route['dashboard/ticket/create-ticket'] = 'Tickets/create_tickets';
$route['dashboard/ticket/all-tickets'] = 'Tickets/all_tickets';
$route['dashboard/ticket/(:any)/(:any)'] = 'Tickets/view_ticket/$1/$2';

$route['dashboard/ticket/my-tickets'] = 'Tickets/my_tickets';
$route['dashboard/ticket/active-tickets'] = 'Tickets/active_tickets';
$route['dashboard/ticket/closed-tickets'] = 'Tickets/closed_tickets';
$route['dashboard/ticket/assigned-tickets'] = 'Tickets/assigned_tickets';
$route['dashboard/ticket/onhold-tickets'] = 'Tickets/onhold_tickets';
$route['dashboard/ticket/overdue-tickets'] = 'Tickets/overdue_tickets';

$route['dashboard/all-customers'] = 'Customers';
$route['dashboard/create-customers'] = 'Customers/create_customers';
$route['dashboard/edit-customers/(:any)'] = 'Customers/edit_customer/$1';

$route['dashboard/all-employees'] = 'Employees';
$route['dashboard/create-employee'] = 'Employees/create_employee';
$route['dashboard/edit-employee/(:any)'] = 'Employees/edit_employee/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
