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
            $errMsg = "";
            if ($username == '') {
                $errMsg = $errMsg . "\n Enter username";
            }

            if ($password == '') {
                $errMsg = $errMsg . "\n Enter password";
            }
            if ($email == '') {
                $errMsg = $errMsg . "\n Enter email";
            }
            if ($errMsg == "") {
                if ($user->getUserByUsername($username) == true) {
                    echo '<div class="alert alert-danger" role="alert"> User already exists</div>';
                } else {
                    $user->create($username, $password, $email);
                    $_SESSION['username'] = $user->username;
                    header("Location: " . WEBROOT . "agenda/index");
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">' . $errMsg . '</div>';
            }
        }
        $this->render("register");
    }

    function login()
    {
        require(ROOT . 'models/User.php');
        $userModel = new User();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $userModel->getUserByUsername($username);
            if ($user == false) {
                echo '<div class="alert alert-danger" role="alert">Invalid username or password</div>';
            } else {
                if ($password == $user->password) {
                    $_SESSION['username'] = $user->username;
                    if ($user->username == 'admin') {
                        header("Location: " . WEBROOT . "admin/users");
                    } else {
                        header("Location: " . WEBROOT . "agenda/index");
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">Invalid username or password</div>';
                }
            }
        }
        $this->render("login");
    }
    function logout()
    {
        if (isset($_COOKIE[session_name()])) {
            unset($_COOKIE[session_name()]);
            setcookie(session_name(), '', -1, '/');
        }
        session_unset();
        session_destroy();
        header("Location: " . WEBROOT . "users/login");
    }
}
