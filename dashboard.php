<?php
session_start();
include 'User.php';

$user = new User();

if ($user->currentUser()) {
    echo 'je bent ingelogt neef';
} else{
    echo 'GAST JE MAG HIER NIET ZIJN A NEEF';
}
?>
