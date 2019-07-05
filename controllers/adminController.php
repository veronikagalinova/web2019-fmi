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
                $data['updatedProject']=true;
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
            if(isset($_POST['create-project']))
            {
                if(isset($_POST["project-name"]))
                {
                    //check if project exists
                    if($projectModel->getProjectById($_POST["project-name"])==false)
                    {
                        $projectModel->create($_POST["project-name"],$_POST["project-description"]);
                        echo '<div class="alert alert-success" role="alert">Project created successfully</div>';
                    }
                    else 
                    {
                        echo '<div class="alert alert-danger" role="alert">Project with that name already exists</div>';
                    }
                }
                else 
                {
                    echo '<div class="alert alert-danger" role="alert">Project name is required</div>';
                }
            }
            $this->render("create");
        }
    }
}