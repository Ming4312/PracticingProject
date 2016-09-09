<?php
    require_once("connect.inc.php");
    
    function insertToUsersProfile(){
        
        $username = mysql_real_escape_string($_POST['username']);
        $id = getUserID($username);
        $age = mysql_real_escape_string($_POST['age']);
        $gender = mysql_real_escape_string($_POST['gender']);
        $nickname  = mysql_real_escape_string($_POST['nickname']);
        $birthday = mysql_real_escape_string($_POST['birthday']);
        $icon = mysql_real_escape_string($_POST['icon']);
        
        
        
        
        $sql = "INSERT INTO user_profile (user_profile_id,user_profile_username,user_profile_age,user_profile_gender,user_profile_nickname,
        user_profile_birthday) 
        VALUE ($id,'$username','$age','$gender','$nickname','$birthday')";
        mysql_query($sql);
    }
    
    function getUserID($username){
        $sql = "SELECT id FROM users WHERE user_username = '$username' LIMIT 1";
        $result = mysql_query($sql);
        return mysql_fetch_array($result)["id"];
    }

?>