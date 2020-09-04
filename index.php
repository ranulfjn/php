<?php

 $index_loaded = true;

require_once 'web_page.php';
require_once 'tools.php';
require_once 'products.php';
require_once 'users.php';
require_once 'registration.php';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = 0;
}
switch ($op) {
    case 0: homePage(); break;
    case 1: $userObj = new users();
            $userObj->loginPage(); break;
    case 2:
            $userObj = new users();
            $userObj->loginPageValidation(); break;

    case 3:  $registration = new registration();
             $registration->RegisterFormDisplay(); break;

    case 4:  $registration = new registration();
            $registration->RegisterFormVerify(); break;
    case 50: dispalyServerErrorLogs(); break;
    case 100:
            $producjObj = new products();
            $producjObj->Product_Display(); break;
    case 110:
            $producjObj = new products();
            $producjObj->Products_List(); break;
    case 111:
            $producjObj = new products();
            $producjObj->Products_Catalogue(); break;
    default: crash(400, 'Invalid op code in index.php');
}

function homePage()
{
    $home_page = new web_page();
    $home_page->title = 'ElectronicScooter.com Home- Welcome';
    $home_page->content = '<h1>Welcome to home page</h1>';
    $home_page->render();
}

function dispalyServerErrorLogs()
{
    $errorPage = new web_page();
    $errorPage->title = 'Server error logs';
    $errorPage->content = '';
    $errorPage->content = file_get_contents('logs/errors.log');
    $errorPage->render();
}
