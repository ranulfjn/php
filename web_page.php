<?php

if (!isset($index_loaded)) {
    die('Direct Access to file is forbidden');
}
require_once 'global_defines.php';
class web_page
{
    public $title = PAGE_DEFAULT_TITLE;
    public $description = DESCRIPTION;
    public $author = AUTHOR;
    public $lang = LANG;
    public $icon = ICON;
    public $content = '';

    public function __constructor()
    {
    }

    public function render()
    {
        if ($this->content == '') {
            http_response_code(500); //http response code
            // mail(ADMIN_EMAIL, 'Error in web_page.php', 'no function set in file render()'); //email
            // die('Sorry Unable to handel request ');
        }
        if ($this->lang == 'en-CA') {
            require_once 'template.php';
        } elseif ($this->lang == 'fr-CA') {
            require_once 'template_fr.php';
        } else {
            die('Language not supported');
        }
    }
}
