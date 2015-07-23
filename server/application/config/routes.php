<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['404_override'] = '';
$route['default_controller'] = 'app';


$route['classroom'] = 'app/get_classrooms';



$route['get-classrooms'] = 'app/get_classrooms';
$route['get-classroom/(:any)'] = 'app/get_classroom/$1';
$route['add-classroom/(:any)'] = 'app/add_classroom/$1';
$route['add-file-classroom/(:any)'] = 'app/add_file_classroom/$1';
$route['del-classroom/(:any)'] = 'app/del_classroom/$1';
$route['activate-classroom/(:any)'] = 'app/activate_classroom/$1';

$route['get-tests'] = 'app/get_tests';
$route['get-test/(:any)'] = 'app/get_test/$1';
$route['add-test/(:any)'] = 'app/add_test/$1';
$route['add-file-test/(:any)'] = 'app/add_file_test/$1';
$route['del-test/(:any)'] = 'app/del_test/$1';
$route['activate-test/(:any)'] = 'app/activate_test/$1';

$route['get-students/(:any)'] = 'app/get_students/$1';
$route['add-student/(:any)/(:any)'] = 'app/add_student/$1/$2';
$route['del-student/(:any)'] = 'app/del_student/$1';

$route['get-marks/(:any)'] = 'app/get_marks/$1';
$route['add-mark/(:any)/(:any)'] = 'app/add_mark/$1/$2';

/*
$route['get-files'] = 'app/get_files';
$route['get-file-data/(:any)'] = 'app/get_file_data/$1';
$route['add-file/(:any)'] = 'app/add_file/$1';
$route['del-file/(:any)'] = 'app/del_file/$1';
*/

$route['add-server-file/(:any)'] = 'app/add_server_file/$1';


$route['get-user/(:any)'] = 'app/get_user_info/$1';
$route['invite-user'] = 'register/invite_user';
$route['change-pwd'] = 'register/change_pwd';
$route['change-tof'] = 'register/change_tof';

$route['find-users/(:any)'] = 'app/find_users/offset';

$route['share-classroom/(:any)'] = 'app/share_classroom/$1';
$route['share-test/(:any)'] = 'app/share_test/$1';
$route['send-file/(:any)'] = 'app/send_file/$1';

$route['create-std-from-file/(:any)/(:any)'] = 'app/std_from_file/$1/$2';

$route['logout'] = 'register/signout';

//$route['(:any)'] = 'pages/view/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */