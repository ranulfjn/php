<?php

session_start();
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

 $_SESSION['login_count'] = 0; // unlock from session
switch ($op) {
    case 0: homePage(); break;
    case 1:

        if ($_SESSION['login_count'] > 3 and isset($_SESSION['login_count'])) {
            $validPage = new web_page();
            $validPage->content = '<h2>max login limit reached!!! Try after some time</h2>';
            $validPage->render();
            break;
        } else {
            $userObj = new users();
            $userObj->loginPage();
            break;
        }

            // no break
    case 2:
            $userObj = new users();
            $userObj->loginPageValidation(); break;
    case 5:
                $userObj = new users();
                $userObj->logout(); break;
    case 3:  $registration = new registration();
             $registration->RegisterFormDisplay(); break;

    case 4:  $registration = new registration();
            $registration->RegisterFormVerify(); break;
    case 50:
                dispalyServerErrorLogs(); break;
    case 51:
                $DB = new db_pdo();
        // $users = $DB->querySelect('select * from users');
        $users = $DB->table('users'); //goto pdo_db page
        $table_html = tableDisplay($users);
        $page = new web_page();
        $page->content = $table_html;
        $page->render();
break;
    case 100:
            $producjObj = new products();
            $producjObj->Product_Display(); break;
    case 110:
            $producjObj = new products();
            $producjObj->Products_List(); break;
    case 111:
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $DB = new db_pdo();
            $product = $DB->querySelect("select * from products where name like'$search%'");
            $producjObj = new products();
            $producjObj->searchDisplay($product);
        } else {
            $producjObj = new products();
            $producjObj->Products_Catalogue();
        }
    break;
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
