<?php
require_once 'connection.php';

class MvcModel{
    public static function linkPagesModel($linkModel){
        if($linkModel == 'index'){
            $module = 'Views/home.php';
        }elseif($linkModel == 'add'){
            $module = 'Views/add.php';
        }elseif($linkModel == 'edit'){
            $module = 'Views/edit.php';
        }elseif($linkModel == 'delete'){
            $module = 'Views/home.php';
        }elseif($linkModel == 'SuccessfulRegistration'){
            $module = 'Views/home.php';
        }elseif($linkModel == 'SuccessfulUpdate'){
            $module = 'Views/home.php';
        }elseif($linkModel == 'SuccessfulDelete'){
            $module = 'Views/home.php';
        }else{
            $module = 'Views/home.php';
        }
        return $module;
    }
}

class UsersModel extends Connection{
    #USERS REGISTRATION
    public static function registryUsersModel($dataModel, $table){
        $stmt = Connection::connect() -> prepare("INSERT INTO $table(name, email, address) VALUES (:name, :email, :address)");

        $stmt->bindParam(":name", $dataModel['name'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $dataModel['email'], PDO::PARAM_STR);
        $stmt->bindParam(":address", $dataModel['address'], PDO::PARAM_STR);

        if($stmt->execute()){
            return "Success";
        }else{
            return "Error";
        }
        $stmt->close();
    }
    #LIST USERS
    public static function listUsersModel($table){
        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
    #EDIT USERS
    public static function updateListUsersModel($dataModel, $table){
        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE id_users = :id_users");
        $stmt->bindParam(":id_users", $dataModel, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
    public static function updateUsersModel($dataModel, $table){
        require_once 'libraries/passwords/SED.php';
        $id = SED::decryption($dataModel['id_users']);
        $stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, email = :email, address = :address WHERE id_users = :id_users");
        $stmt->bindParam(":id_users", $id, PDO::PARAM_STR);
        $stmt->bindParam(":name", $dataModel['name'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $dataModel['email'], PDO::PARAM_STR);
        $stmt->bindParam(":address", $dataModel['address'], PDO::PARAM_STR);
        if($stmt->execute()){
            return "Success";
        }else{
            return "Error";
        }
        $stmt->close();
    }

    #DELETE USERS
    public static function deleteUsersModel($dataModel, $table){
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id_users = :id_users");
        $stmt->bindParam(":id_users", $dataModel, PDO::PARAM_INT);
        if($stmt->execute()){
            return "Success";
        }else{
            return "Error";
        }
        $stmt->close();
    }

}



?>