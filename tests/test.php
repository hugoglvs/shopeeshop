<?php

require_once  "../includes/config.php";
$sql = "Select * from Articles";
$rep = $conn->query($sql);
$row = $rep->fetch();
print_r($row);
echo "<br><br><br><br>";

$sql = "Select * from Articles";
$sth = $conn->prepare($sql);
$sth->execute();
while($row = $sth->fetch()) {
print_r($row);
}