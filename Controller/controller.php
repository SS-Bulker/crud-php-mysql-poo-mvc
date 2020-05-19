<?php

class MvcController{

public function template(){
    include 'Views/template.php';
}
public function linkPagesController(){
    if(isset($_GET['action'])){
        $linkController = $_GET['action'];
    }else{
        $linkController = 'index.php';
    }
    $answer = MvcModel::linkPagesModel($linkController);

    include $answer;
}

}


class UsersController{
    #USERS REGISTRATION 
    public function registryUsersController(){
        if(isset($_POST['name'])){
        $dataController = array("name" => $_POST['name'], "email" => $_POST['email'], "address" => $_POST['address']);
        
        $answer = UsersModel::registryUsersModel($dataController, "users");
        
        if($answer == "Success"){
            header("location: index.php?action=SuccessfulRegistration");
        }else{
            header("location: index.php");
        }
        }
    }
    #LIST USERS
    public function listUsersController(){
        require_once 'libraries/passwords/SED.php';
        $answer = UsersModel::listUsersModel("users");
        foreach ($answer as $answers){
        $id = SED::encryption($answers['id_users']);
        echo "<tr>
        <td>$answers[name]</td>
        <td>$answers[email]</td>
        <td>$answers[address]</td>
        <td>
        <a href='index.php?action=edit&id=$id' class='btn btn-primary'>Edit</a>
        <a href='index.php?action=delete&id=$id' class='btn btn-danger'>Delete</a>
        </td>
        </tr>";
        }
    }
    #UPDATE USERS BUT LIST THEM
    public function updateListUsersController(){
    require_once 'libraries/passwords/SED.php';
    if(isset($_GET['id'])){
        $dataController = SED::decryption($_GET['id']);
        $answer = UsersModel::updateListUsersModel($dataController, "users");
        $id = SED::encryption($answer['id_users']);
        echo '
        <input type="hidden" value="'.$id.'" name="idEdit">
        <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" value="'.$answer['name'].'" name="nameEdit" placeholder="Enter name">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" value="'.$answer['email'].'" name="emailEdit" placeholder="Enter email">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" class="form-control" value="'.$answer['address'].'" name="addressEdit" placeholder="Enter address">
        </div>
        <a href=""><button type="submit" class="btn btn-primary">Submit</button></a>';
        
        }
    }
    #UPDATE THE FIELDS WHEN I RECEIVE THE BUTTON
    public function updateUsersController(){
        if(isset($_POST['nameEdit'])){
            $dataController = array("id_users" => $_POST['idEdit'],"name" => $_POST['nameEdit'], "email" => $_POST['emailEdit'], "address" => $_POST['addressEdit']);
            $answer = UsersModel::updateUsersModel($dataController, "users"); 
            if($answer == "Success"){
                header ("location: index.php?action=SuccessfulUpdate");
            }else{
                echo '<div class="alert alert-danger" role="alert">Failed to update! </div>';
            }
        }
    }
    #DELETE USERS
    public function deleteUsersController(){
    require_once 'libraries/passwords/SED.php';
    if(isset($_GET['id'])){
        $dataController = SED::decryption($_GET['id']);
        $answer = UsersModel::deleteUsersModel($dataController, "users");
        if($answer == "Success"){
            header ("location: index.php?action=SuccessfulDelete");
        }else{
            echo '<div class="alert alert-danger" role="alert">Failed to delete! </div>';
        }
    }
    }
}

?>