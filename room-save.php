<?php
require_once "db.inc.php";
echo '<?xml version="1.0" encoding="UTF-8" ?>';


// Process in a function
updateroomstatus($_REQUEST['status'], $_REQUEST['email'],$_REQUEST['room'],$_REQUEST['location']);


/**
 * Ask the database for the user ID. If the user exists, the password
 * must match.
 * @param $pdo PHP Data Object
 * @param $user The user name
 * @param $password Password
 * @return id if successful or exits if not
 */



function updateroomstatus($stat, $email,$roomNum,$location) {
    // Connect to the database
    $pdo = pdo_connect();

    $sql = <<<SQL
        UPDATE conferenceRooms
        SET status=?,roomEmail=?
        WHERE confRm=?
SQL;

    $statement = $pdo->prepare($sql);
    $statement->execute(array($stat,$email,$roomNum,$location));


}