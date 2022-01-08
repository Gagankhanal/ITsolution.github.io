<?php
$SERVER="localhost";
$USERNAME="root";
$PASSWORD="";
$DATABASE="idiscuss";
$connection=mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if(!$connection){
    die("we are failed to connect to the database");
}
?>