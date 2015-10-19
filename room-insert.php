<?php
/*
 * Hatter application loading
 */
require_once "db.inc.php";



insertroom($_REQUEST['location'],$_REQUEST['room'],$_REQUEST['floor'],$_REQUEST['status'],$_REQUEST['email'],$_REQUEST['ownership'],$_REQUEST['resources'],$_REQUEST['capacity']);

//echo '<.$_GET['location']+.$_GET['room'],$_GET['floor'],$_GET['status'],$_GET['email'],$_GET['ownership'],$_GET['resources'],$_GET['capacity']>'


function insertroom($location,$room,$floor,$status,$email,$owner,$resources,$capacity){
    $poly = "";
    $note = "";
    $sql =<<<SQL
INSERT INTO conferenceRooms(location,confRm,capacity,polycomExt,avResources,ownership,notes,status,floor,roomEmail)
VALUES (?,?,?,?,?,?,?,?,?,?)
SQL;
    $pdo = pdo_connect();
    $statement = $pdo->prepare($sql);
    if ($statement->execute(array($location,$room,$capacity,$poly,$resources,$owner,$note,$status,$floor,$email))) {
        return true;
    } else {
        return false;
    }
}
