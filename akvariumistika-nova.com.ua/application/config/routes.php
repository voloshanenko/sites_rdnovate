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
$route['default_controller'] = "main";
$route['admin'] = "admin";
$route['orders/del/([0-9]+)'] = "orders/del/$1";
$route['facts/([0-9]+)'] = "facts/show/$1";
$route['feedbacks/grid'] = "feedbacks/grid";
$route['pagecomments/grid'] = "pagecomments/grid";
$route['admin/autocomplete'] = "/admin/autocomplete";
$route['admin/savefeedback/([0-9]+)'] = "catalogue/save_comment/$1";
$route['admin/savecomment/([0-9]+)'] = "page/save_comment/$1";
$route['admin/getcsv/([a-z])'] = "admin/get_csv/$1";
$route['admin/uploadcsv'] = "admin/upload_csv";
$route['admin/items/admins'] = "admin/items/admin/0";
$route['admin/sort_table'] = "admin/sort_table";
$route['admin/items/orders'] = "orders/show";
$route['admin/items/orders/([0-9]+)'] = "orders/show/$1";
$route['admin/orders/set_status'] = "orders/set_status";
$route['admin/search'] = "admin/search";
$route['admin/items/feedbacks'] = "feedbacks/show/0";
$route['admin/items/feedbacks/([0-9]+)'] = "feedbacks/show/$1";
$route['admin/items/feedbacks/approve/([0-9]+)'] = "feedbacks/approve/$1";
$route['admin/items/feedbacks/disapprove/([0-9]+)'] = "feedbacks/disapprove/$1";
$route['admin/items/feedbacks/show_on_main/([0-9]+)'] = "feedbacks/show_on_main/$1";
$route['admin/items/feedbacks/hide_on_main/([0-9]+)'] = "feedbacks/hide_on_main/$1";
$route['admin/items/feedbacks/delete/([0-9]+)'] = "feedbacks/delete/$1";
$route['admin/items/pagecomments'] = "pagecomments/show/0";
$route['admin/items/pagecomments/([0-9]+)'] = "pagecomments/show/$1";
$route['admin/items/pagecomments/approve/([0-9]+)'] = "pagecomments/approve/$1";
$route['admin/items/pagecomments/disapprove/([0-9]+)'] = "pagecomments/disapprove/$1";
$route['admin/items/pagecomments/show_on_main/([0-9]+)'] = "pagecomments/show_on_main/$1";
$route['admin/items/pagecomments/hide_on_main/([0-9]+)'] = "pagecomments/hide_on_main/$1";
$route['admin/items/pagecomments/delete/([0-9]+)'] = "pagecomments/delete/$1";
$route['admin/save_file'] = "admin/save_file";
$route['askme'] = "askme/send";
$route['mycart'] = "mycart";
$route['mycart/add'] = "mycart/add";
$route['mycart/update'] = "mycart/update";
$route['mycart/remove'] = "mycart/remove";
$route['mycart/checkout'] = "mycart/checkout";
$route['mycart/checkout_confirm'] = "mycart/checkout_confirm";
$route['search/byword'] = "search/byword";
$route['search/byletter/([а-яА-Я])'] = "search/letter/$1";
$route['search/tag/([а-я А-Я-])'] = "search/tag/$1";
$route['user'] = "user";
$route['user/registration'] = "user/registration";
$route['user/remind'] = "user/remind";
$route['user/logout'] = "user/logout";
$route['user/login'] = "user/login";
$route['user/cabinet'] = "user/cabinet";
$route['user/update'] = "user/update";
$route['catalogue/sort'] = "catalogue/sort";
$route['catalogue/filter'] = "catalogue/filter";
$route['catalogue/leavecomment'] = "catalogue/leave_comment";
$route['page/make_search'] = "page/make_search"; 
$route['page/leavecomment'] = "page/leave_comment"; 
$route['page/([A-Za-z0-9-_.]+)'] = "page/item/$1";
$route['pages/([A-Za-z0-9-_.]+)'] = "page/items/$1";
$route['pages/([A-Za-z0-9-_.]+)/([0-9 ]+)'] = "page/items/$1/$2";
$route['pages/bytag/(:any)'] = "page/listbytag/$1";
$route['([A-Za-z0-9-_.]+)'] = "catalogue/show_category/$1";
$route['([A-Za-z0-9-_.]+)/([0-9 ]+)'] = "catalogue/show_category/$1/$2";
$route['([A-Za-z0-9-_.]+)/prod/([A-Za-z0-9-_.]+)'] = "catalogue/show_item/$2";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */