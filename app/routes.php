<?php

$router->get("", "PagesController@home");
$router->get("s", "PagesController@page");
$router->post("dashboard", "DashboardController@home");
$router->post("update", "DashboardController@update");
$router->post("account", "DashboardController@register");
//$router->post("users", "UsersController@store"); for POSTs