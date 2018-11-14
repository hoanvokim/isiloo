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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['center/(:any)'] = 'webapp/center/dispatcher/$1';
$route['tag/(:any)'] = 'webapp/center/tag/$1';
$route['searchForm'] = 'webapp/center/search';
$route['dialForm'] = 'webapp/center/dial';
$route['registerForm'] = 'webapp/center/register';
$route['news/(:any)'] = 'webapp/news/all/$1';
$route['news/news_content/(:any)'] = 'webapp/news/content/$1';
$route['programs/(:any)'] = 'webapp/program/all/$1';
$route['album/(:any)'] = 'webapp/program/album/$1';

//essential
$route['login'] = 'webapp/center/dispatcher/login';
$route['admin'] = 'admin/dashboard/index';
$route['logout'] = 'admin/dashboard/logout';
$route['loginForm'] = 'admin/dashboard/login_submit';

//administration - news
$route['admin/news'] = 'admin/news';
$route['admin/news/create'] = 'admin/news/create';
$route['admin/news/empty'] = 'admin/news/news_empty';
$route['admin/news/update/:num'] = 'admin/news/update';
$route['admin/news/delete/:num'] = 'admin/news/delete';
$route['admin-news-create-form'] = 'admin/news/create_submit';
$route['admin-news-update-form'] = 'admin/news/update_submit';

$route['admin/category'] = 'admin/category';
$route['admin/category/empty'] = 'admin/category/category_empty';
$route['admin/category/sub/:num'] = 'admin/category/sub';
$route['admin/category/create/:num'] = 'admin/category/create';
$route['admin/category/update/:num'] = 'admin/category/update';
$route['admin/category/delete/:num'] = 'admin/category/delete';
$route['admin-category-create-form'] = 'admin/category/create_submit';
$route['admin-category-update-form'] = 'admin/category/update_submit';


$route['admin/album'] = 'admin/albums';
$route['admin/album/create'] = 'admin/albums/create';
$route['admin/album/update/:num'] = 'admin/albums/update';
$route['admin/album/delete/:num'] = 'admin/albums/delete';
$route['admin-album-create-form'] = 'admin/albums/create_submit';
$route['admin-album-update-form'] = 'admin/albums/update_submit';