<?php
/*
 * Hatter application loading
 */
require_once "db.inc.php";




// Process in a function
//processLoad($_GET['user'], $_GET['pw'], $_GET['id']);







processLoad();





/**
 * Process the query
 * @param $user the user to look for
 * @param $password the user password
 * @param $id the id in the hatting table
 */
function processLoad()
{
    $pdo = pdo_connect();
    $query = "SELECT * from conferenceRooms";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $activities = $statement->fetchAll();

    $x = 0;
    foreach ($activities as $row) {
        $result[$x] = array($row['location'],
            $row['confRm'],
             $row['capacity'],
            $row['polycomExt'],
             $row['avResources'],
           $row['ownership'],
             $row['notes'],
             $row['status'],
             $row['floor'],
            $row['roomEmail']
        );
        $x = $x + 1;

    }

    echo json_encode($result);

   // echo json_encode($result);

    exit;
}

