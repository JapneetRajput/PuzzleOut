<?php 


if(isset($_GET['vkey'])){
    $vkey=$_GET['vkey'];
    $mysqli = NEW MySQLi('localhost','root','','puzzleout');
    $resultSet = $mysqli->query("Select verified,vkey FROM users where verified=0 and vkey='$vkey' LIMIT 1");

    if($resultSet->num_rows==1){
        $update = $mysqli->query("Update users set verified = 1 where vkey = '$vkey' Limit 1");
        if($update){
            echo 'Your account is verified.';
        }
    }else{
        echo 'This account is either invalid or already verified';
    }

} else{
    echo 'Something went wrong';
}

?>