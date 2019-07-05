<?php
session_start();
require(ROOT . 'models/User.php');
require(ROOT . 'models/Project.php');
class adminController extends Controller
{
    function users()
    {
        //check if the user is admin
        if(!isset($_SESSION['username']) || $_SESSION['username']!='admin')
        {
            header("Location: " . WEBROOT . "users/login");
        }
        else 
        {
          $userModel = new User();
          $projectModel = new Project();
            if(isset($_POST["edit-user-project"]) && isset($_POST["project"]) && isset($_POST["user"])) {
                $projectName = $_POST["project"];
                $user = $_POST["user"];
                $userModel->updateUserProject($user,$projectName);
                //TODO: needs notification
            }
            $data['users'] = $userModel->getAllUsers();
            $data['projects'] = $projectModel->getAllProjects();
            $this->set($data);
            $this->render("users");
        }
    }
    function create() 
    {
        if(!isset($_SESSION['username']) || $_SESSION['username']!='admin')
        {
            header("Location: " . WEBROOT . "users/login");
        }
        else
        {
            $projectModel = new Project();
            if(isset($_POST['create-project']) && isset($_POST["project-name"]))
            {
                $projectModel->create($_POST["project-name"],$_POST["project-description"]);
                header("Location: " . WEBROOT . "admin/users");
            }
            $this->render("create");
        }
    }
}