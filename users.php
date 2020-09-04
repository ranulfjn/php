<?php

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
        $loginPage = new web_page();
        $loginPage->title = 'Login Page';
        $loginPage->content = <<< HTML
        <div class="alert alert-danger">{$err_msg}</div>
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
        $users = [['id' => 0, 'email' => 'abc@abc.com', 'pw' => '12345678'],
                    ['id' => 1, 'email' => 'abcdef@abc.com', 'pw' => '12345678'],
                    ['id' => 2, 'email' => 'john@abc.com', 'pw' => '124545678'],
                    ['id' => 3, 'email' => 'qwerwqer@abc.com', 'pw' => '12348678'],
                ];

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
        foreach ($users as $key => $value) {
            if ($email_input == $value['email'] && $pw_input == $value['pw']) {
                $flag = 1;
                break;
            }
        }

        if ($flag == 1) {
            $validPage = new web_page();
            $validPage->content = '<h1>Logged in Successfully<h1><br><h2>Welcome Back  '.$email_input.'</h2>';
            $validPage->render();
        } else {
            // <<<HTML
            $this->loginPage('Email or password doesnt not match, Try again!!!!!!', $_POST);
            //    HTML;
        }
    }

























    
}
