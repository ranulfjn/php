<?php

require_once 'db_pdo.php';
if (!isset($index_loaded)) {
    die('Direct Access to file is forbidden');
}
class users
{
    public function loginPage($err_msg = '', $prev_val = [])
    {
        if ($prev_val == []) {
            //set initial val , first time display
            $prev_val['email'] = '';
            $prev_val['pw'] = '';
        }

        if (isset($_COOKIE['userEmail'])) {
            $welcome_msg = 'welecomeback '.$_COOKIE['username'].'! you last visited '.date('d-m-yy', $_COOKIE['last_login_date']);
        } else {
            $welcome_msg = '';
        }
        $loginPage = new web_page();
        $loginPage->title = 'Login Page';
        $loginPage->content = <<< HTML
        <div class="alert alert-danger">{$err_msg}</div>
        <div style="color:red" class="alert alert-primary">{$welcome_msg}</div>
        <form action="index.php?op=2" method="POST" style='width:300px'>
            <!-- <input type="hidden" name="op" value="2"> -->
            <input class="form-control" type="email" name="email" requried maxlength="126" size="25" placeholder="Email" value="{$prev_val['email']}"><br>
            <input class="form-control" type="password" name="pw" requried maxlength="8"  placeholder="Password (8 Char)" value="{$prev_val['pw']}"><br>
            <input class="btn btn-primary" type="submit" value='Continue' >
        </form>
    HTML;
        $loginPage->render();
    }

    public function loginPageValidation()
    {
        // $users = [['id' => 0, 'email' => 'abc@abc.com', 'pw' => '12345678', 'name' => 'mary', 'level' => 'employee'],
        //             ['id' => 1, 'email' => 'abcdef@abc.com', 'pw' => '12345678', 'name' => 'mark', 'level' => 'customer'],
        //             ['id' => 2, 'email' => 'john@abc.com', 'pw' => '124545678', 'name' => 'mac'],
        //             ['id' => 3, 'email' => 'qwerwqer@abc.com', 'pw' => '12348678', 'name' => 'stan'],
        //         ];

        $DB = new db_pdo();
        $users = $DB->querySelect('select * from users');
        $err_msg = '';

        if (isset($_POST['email'])) {
            $email_input = $_POST['email'];
        } else {
            crash(500, 'Email not found in login from, class users.php ');
        }

        if (!filter_var($email_input, FILTER_VALIDATE_EMAIL)) {
            $err_msg .= 'Invalid email format<br>';
        }

        if (isset($_POST['pw'])) {
            $pw_input = $_POST['pw'];
        } else {
            crash(500, 'Password not found in login from, class users.php ');
        }

        if (strlen($_POST['pw']) != 8) {
            $err_msg .= 'enter 8 digit password <br>';
        }

        if ($err_msg != '') {
            //display form with err msg and previously entered data
            $this->loginPage($err_msg, $_POST);
        }

        $flag = 0;
        $current_user;
        foreach ($users as $key => $value) {
            if ($email_input == $value['email'] && $pw_input == $value['pw']) {
                $flag = 1;
                $current_user = $value;
                break;
            }
        }

        if ($flag == 1) {
            $_SESSION['user_connected'] = true;
            $_SESSION['user_email'] = $current_user['email'];
            $_SESSION['user_name'] = $current_user['fullname'];
            $_SESSION['user_id'] = $current_user['id'];
            $_SESSION['level'] = $current_user['level'];
            setcookie('username', $current_user['fullname'], time() + (2 * 365 * 24 * 60 * 60));
            setcookie('userEmail', $current_user['email'], time() + (2 * 365 * 24 * 60 * 60));
            setcookie('last_login_date', time(), time() + (2 * 365 * 24 * 60 * 60));

            $validPage = new web_page();
            $validPage->content = '<h1>Logged in Successfully<h1><br><h2>Welcome Back  '.$email_input.'</h2>';
            $validPage->render();
        } else {
            if (!isset($_SESSION['login_count'])) {
                $_SESSION['login_count'] = 1;
            } else {
                ++$_SESSION['login_count'];
            }

            $this->loginPage('Email or password doesnt not match, Try again!!!!!!', $_POST);
        }
    }

    public function logout()
    {
        $_SESSION['user_connected'] = null;
        $_SESSION['user_email'] = null;
        $_SESSION['user_name'] = null;
        $_SESSION['user_id'] = null;
        $_SESSION['level'] = null;
        $LogoutPage = new web_page();
        $LogoutPage->content = '<h1>Logged out Succesfully'.'</h2>';
        $LogoutPage->render();
    }
}
