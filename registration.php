<?php

class registration
{
    public function RegisterFormDisplay($err_msg = '', $prev_val = [])
    {
        if ($prev_val == []) {
            //set initial val , first time display
            $prev_val['email'] = '';
            $prev_val['pw'] = '';
            $prev_val['pw2'] = '';

            $prev_val['fullname'] = '';
            $prev_val['city'] = '';
            $prev_val['postal_code'] = '';
            $prev_val['address'] = '';
            $prev_val['province'] = '';
            $prev_val['address_line1'] = '';
            $prev_val['address_line2'] = '';
            $prev_val['lang'] = 'fr';
            $prev_val['other_lang'] = '';
            $prev_val['spam_ok'] = '1';
        }
        $Provinces = [
                ['id' => 0, 'code' => 'QC', 'name' => 'Québec'],
                ['id' => 1, 'code' => 'ON', 'name' => 'Ontario'],
                ['id' => 2, 'code' => 'NB', 'name' => 'New-Brunswick'],
                ['id' => 4, 'code' => 'NS', 'name' => 'Nova-Scotia'],
                ['id' => 5, 'code' => 'MN', 'name' => 'Manitoba'],
                ['id' => 6, 'code' => 'SK', 'name' => 'Saskatchewan'],
            ];
        $ProvincesSelect = '';
        $ProvincesSelect .= '<select name="province"  class="form-control">';
        foreach ($Provinces as $p) {
            if ($p['code'] == $prev_val['province']) {
                $ProvincesSelect .= '<option  value="'.$p['code'].'" selected>'.$p['name'].'</option>';
            } else {
                $ProvincesSelect .= '<option  value="'.$p['code'].'" >'.$p['name'].'</option>';
            }
        }
        $ProvincesSelect .= '</select>';

        $alert = '';
        if ($err_msg == '') {
            $alert .= '   <div class="alert alert-primary">'.$err_msg.'</div>';
        } else {
            $alert .= ' <div class="alert alert-danger">'.$err_msg.'</div>';
        }
        $registerPage = new web_page();
        $registerPage->title = 'Registration Page';
        $registerPage->content = <<< HTML
         <!-- <div class="alert alert-danger">{$err_msg}</div> -->
         {$alert}
        <form action="index.php?op=4" method="POST" style='width:40%' class="form-check">
            <!-- <input type="hidden" name="op" value="2"> -->
            <legend>Registration Form </legend>
            <input type="text" name="fullname" maxlength="50" requried placeholder="firstname  lastname" class="form-control" value="{$prev_val['fullname']}"><br>
            <label class="form-check-label" for="address">Address (Optional)</label>
                <input type="text" name="address_line1" maxlength="50"  placeholder="Address Line 1" class="form-control" value="{$prev_val['address_line1']}"><br>
                <input type="text" name="address_line2" maxlength="250"  placeholder="Address Line 2" class="form-control" value="{$prev_val['address_line2']}"><br>
                <label class="form-check-label" for="address">City (Optional)</label>
                <input type="text" name="city" maxlength="50"  placeholder="City" class="form-control" value="{$prev_val['city']}"><br>
                <label class="form-check-label" for="province">Province (Optional)</label>
                {$ProvincesSelect}
                <label class="form-check-label" for="address">Postal Code (Optional)</label>
                <input type="text" name="postal_code" maxlength="7"  placeholder="eg. A1A-1A1" class="form-control" value="{$prev_val['postal_code']}"><br>
                <legend>Language</legend>
                <input type="radio" name=lang value=en  > English<br>
                <input type="radio" name=lang value=fr checked > French<br>
                <input type="radio" name=lang value=Other  > Other <input name='other_lang' type="text" maxlength="25" value="{$prev_val['other_lang']}">
                <legend>Connection Info (Requried)</legend>
                <input class="form-control" type="email" name="email" requried maxlength="126" size="25" placeholder="Email" value="{$prev_val['email']}" ><br>
                <input class="form-control" type="password" name="pw" requried maxlength="8"  placeholder="Password - must be (8 Char)" value="{$prev_val['pw']}"><br>
                <input class="form-control" type="password" name="pw2" requried maxlength="8"  placeholder="repeat password" value="{$prev_val['pw2']}"><br>
                <input type="checkbox"  name="spam_ok" value="1" checked> I accept to periodically receive  information about new products <br>
                <input class="btn btn-primary" type="submit" value='Continue' >
        </form>
    HTML;
        $registerPage->render();
    }

    public function RegisterFormVerify()
    {
        $Users = [
            ['id' => 0, 'email' => 'abc@test.com', 'pw' => '12345678'],
            ['id' => 1, 'email' => 'def@test.com', 'pw' => '12345678'],
            ['id' => 0, 'email' => 'abc@gmail.com', 'pw' => '11111111'],
        ];

        $err_msg = '';

        if (isset($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        } else {
            $err_msg .= 'Error in name .reg.php  <br>';
        }

        if (isset($_POST['address_line1'])) {
            $address_line1 = $_POST['address_line1'];
        } else {
            $err_msg .= 'Error in Address Line 1 .reg.php  <br>';
        }

        if (isset($_POST['address_line2'])) {
            $address_line1 = $_POST['address_line2'];
        } else {
            $err_msg .= 'Error in Address Line 2 .reg.php  <br>';
        }
        if (isset($_POST['city'])) {
            $city = $_POST['city'];
        } else {
            $err_msg .= 'Error in city .reg.php  <br>';
        }

        if (isset($_POST['province'])) {
            $province = $_POST['province'];
        } else {
            $err_msg .= 'Error in province .reg.php  <br>';
        }
        if (isset($_POST['postal_code'])) {
            $postal_code = $_POST['postal_code'];
        } else {
            $err_msg .= 'Error in postal_code .reg.php  <br>';
        }

        if (isset($_POST['lang'])) {
            $postal_code = $_POST['lang'];
        } else {
            $err_msg .= 'Error in language .reg.php  <br>';
        }

        if (isset($_POST['other_lang'])) {
            $other_lang = $_POST['other_lang'];
        } else {
            $err_msg .= 'Error in other_lang .reg.php  <br>';
        }

        // if (isset($_POST['spam_ok'])) {
        //     $spam_ok = $_POST['spam_ok'];
        // } else {
        //     $err_msg .= 'Error in spam_ok .reg.php  <br>';
        // }

        if ($fullname == '') {
            $err_msg .= 'Please enter a fullname <br>';
        }
        if (strlen($_POST['postal_code']) != 7) {
            $err_msg .= 'enter 7 letter zipcode  <br>';
        }

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
            crash(500, 'Password not found in login from, class reg.php ');
        }
        if (isset($_POST['pw2'])) {
            $pw2_input = $_POST['pw2'];
        } else {
            crash(500, 'Password not found in login from, class reg.php ');
        }
        if (strlen($_POST['pw']) != 8) {
            $err_msg .= 'enter 8 digit password <br>';
        }

        foreach ($Users as $key => $value) {
            if ($email_input == $value['email']) {
                $err_msg .= 'Email Already Exists!!!! Use different Email <br>';
                break;
            }
        }

        if ($pw2_input != $pw_input) {
            $err_msg .= 'Two Passwords do not match <br>';
        }

        if ($err_msg != '') {
            //display form with err msg and previously entered data
            $this->RegisterFormDisplay($err_msg, $_POST);
        }

        $validPage = new web_page();
        $validPage->content = '<h2>Added User:'.$email_input.' Successfully</h2>';
        $validPage->render();
    }
}
