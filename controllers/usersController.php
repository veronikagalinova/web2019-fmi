<?php
class agendaController extends Controller
{
    function register()
    {
        require(ROOT . 'models/User.php');
        $user = new User();
        

        if(isset($_POST['register'])) 
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

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
                $user->create($username, $password, $email);
                //TODO: maybe think about how to login him right here
            }
        }
        $this->render("register");
    }

    function login()
    {
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
                if($password == $user['password']) {
                    $_SESSION['username'] = $data['username'];
                    // header('Location: dashboard.php');
                }
            }
        }
        $this->render("login");
    }
    
}
?>