<?php

if(isset($_POST['LoginButton'])) {
    $username = $_POST['LoginUserName'];
    $password = $_POST['LoginPassword'];

    $result = $account->login($username, $password);
    if($result == true) {
        $_SESSION['userLoggedIn'] = $username;
        
        header("Location: index.php");
    }
    
}

?>