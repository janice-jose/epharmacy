<?php
    $con = mysqli_connect('localhost','root','','pharmacy');

    if(!$con)
    {
        echo 'Check database connection!';
    }
?>