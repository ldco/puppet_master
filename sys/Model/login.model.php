<?php

declare(strict_types=1);

namespace sys\Model;

use Mysqli;
use sys\Controller\DB;

class Login
{

    //@var object The database connection

    private $DB = null;

    //@var array Collection of error messages

    public $errors = array();

    //@var array Collection of success / neutral messages

    public $messages = array();

    public function __construct()
    {
        global $DB;
        if (!isset($DB)) $DB = new DB;
        $this->DB = $DB;
        // create/read session, absolutely necessary
        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }


    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            $result = $this->DB->query("SELECT user_name, user_email, user_password_hash FROM users WHERE user_name = ? LIMIT 1", $_POST['user_name']);
            $checkRow = $result->fetchAll();
            foreach ($checkRow as $row) {
                if (password_verify($_POST['user_password'], $row['user_password_hash'])) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_email'] = $row['user_email'];
                    $_SESSION['user_login_status'] = 1;
                } else {
                    $this->errors[] = "Wrong password, try again";
                }
            }
            if (empty($checkRow)) $this->errors[] = "Wrong password, try again";
        }
    }

    //perform the logout
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        // return a little feeedback message
        $this->messages[] = "Successfully logged out";
    }

    //simply return the current state of the user's login @return boolean user's login status

    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] === 1) {
            return true;
        }
        return false;
    }
}