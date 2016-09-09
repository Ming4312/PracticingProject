<?php
    require_once("connect.inc.php");
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $username = mysql_real_escape_string($_POST['username']);
    
    if(!validEmailAddress($email)){
        echo "existing email";
    }else if(!validUsername($username)){
        echo "existing username";
    }else{
        insertToUsers();
        
    }
    
    /*if(insertToUsers()){
        if(mysql_affected_rows() == 0){
            echo "Existing Email or Username";
        }else if(mysql_affected_rows() == 1){
            echo "Account Created";
            header("Location: /home.html");
            exit();
        }
    }else{
        echo "error";
    }*/

   
    function insertToUsers(){
        /*
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $username = mysql_real_escape_string($_POST['username']);*/
        $sql = "INSERT INTO users (user_email, user_password, user_username) 
        SELECT * FROM (SELECT '$email', '$password', '$username') As temp 
        WHERE NOT EXISTS (
            SELECT user_email FROM users WHERE user_email = '$email' OR user_username = '$username'
        ) LIMIT 1";
        mysql_query($sql);
    }
    
    function validEmailAddress($email){
        
        $sql = "SELECT user_email FROM users WHERE user_email = '$email'";
        $result = mysql_query($sql);
       
        return mysql_fetch_array($result)==false;
    }
    function validUsername($username){
        $sql = "SELECT user_username FROM users WHERE user_username = '$username'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result)==false;
    }
    
    
?>