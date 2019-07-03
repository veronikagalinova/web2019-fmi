<?php
class usersController extends Controller
{
    function register()
    {
        echo 'entered register in users controller';
        require(ROOT . 'models/User.php');
        $user = new User();
        

        if(isset($_POST['register'])) 
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $errMsg = '';
            if($username == '') {
                $errMsg = 'Enter username';
            }
			
		    if($password == '') {
                $errMsg = 'Enter password';
            }
			if($email == '') {
                $errMsg = 'Enter email';
            }
            if($errMsg == ''){
                //somewhat of a valid form
                //TODO: need to check for existing user
                if($user->getUserByUsername($username)==true) {
                    echo '<h1>User already exists</h1>';
                    //header("Location: " . WEBROOT . "users/login");  this works
                }
                else
                {
                    $user->create($username, $password, $email);
                    
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
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user=$userModel->getUserByUsername($username);
            if($user == false)
            {
                $errMsg = "User $username not found.";
            }
            else
            {
                if($password == $user->password) {
                    $_SESSION['username'] = $user->username;
                    header("Location: " . WEBROOT . "agenda/index");
                    // header('Location: dashboard.php');
                }
            }
        }
        $this->render("login");
    }
    
}
?>