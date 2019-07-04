<?php
session_start();
require(ROOT . 'models/User.php');
require(ROOT . 'models/Project.php');
class adminController extends Controller
{
    function users()
    {
        $userModel = new User();
        $projectModel = new Project();
        $data['users'] = $userModel->getAllUsers();
        $data['projects'] = $projectModel->getAllProjects();
        $this->set($data);
        $this->render("users");
    }
}