<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['^ge/(.+)$'] = "$1";
$route['^en/(.+)$'] = "$1";
$route['^ar/(.+)$'] = "$1";
 

$route['^ge$'] = $route['default_controller'];
$route['^en$'] = $route['default_controller'];
$route['^ar$'] = $route['default_controller'];