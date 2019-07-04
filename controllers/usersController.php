<?php
session_start();
class usersController extends Controller
{
    function register()
    {
        require(ROOT . 'models/User.php');
        $user = new User();


        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $errMsg = '';
            if ($username == '') {
                $errMsg = 'Enter username';
            }

            if ($password == '') {
                $errMsg = 'Enter password';
            }
            if ($email == '') {
                $errMsg = 'Enter email';
            }
            if ($errMsg == '') {
                //somewhat of a valid form
                //TODO: need to check for existing user
                if ($user->getUserByUsername($username) == true) {
                    echo '<h1>User already exists</h1>';
                    //header("Location: " . WEBROOT . "users/login");  this works
                } else {
                    $user->create($username, $password, $email);
                    $_SESSION['username'] = $user->username;
                    header("Location: " . WEBROOT . "agenda/index");
                }
                //TODO: maybe think about how to login him right here
            }
        }
        $this->render("register");
    }

    function login()
    {
        // Do something if someone is already logged
        

        require(ROOT . 'models/User.php');
        $userModel = new User();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $userModel->getUserByUsername($username);
            if ($user == false) {
                $errMsg = "User $username not found.";
            } else {
                if ($password == $user->password) {
                    $_SESSION['username'] = $user->username;

                    if($user->username == 'admin') {
                        header("Location: " . WEBROOT . "admin/users");
                    }
                    else
                    {
                        header("Location: " . WEBROOT . "agenda/index");
                    }
                }
            }
        }
        $this->render("login");
    }
    function logout()
    {
        if ( isset( $_COOKIE[session_name()] ) )
        {
            unset($_COOKIE[session_name()]);
            setcookie( session_name(), '', -1, '/' );
        }
        session_unset();
        session_destroy();
        header("Location: " . WEBROOT . "users/login");
    }
}
