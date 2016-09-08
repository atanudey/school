<?php

phpinfo();

/*date_default_timezone_set('Asia/Kolkata');

$conn = mysqli_connect("localhost", "sssdb_user", "User123*", "educare_db");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$conn->query("SET `time_zone` = '".date('P')."'");

echo date("Y-m-d H:i:s") . "<br>";

//$conn->query("UPDATE `educare_db`.`login` SET  `Added_On` =  NOW() WHERE  `login`.`ID` =2");

$conn->query("CALL TESTPROC()");

$result = $conn->query("SELECT * FROM test ORDER BY id DESC LIMIT 1");
$row = $result->fetch_assoc();

var_dump($row);

$time = $conn->query("SELECT CURTIME()");
$trow = $time->fetch_assoc();

var_dump($trow);

$conn->close();*/
