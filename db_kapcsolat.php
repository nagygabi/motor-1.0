<?php
$MySqliLink = mysqli_connect("localhost", "root", "", "gabi_alap"); //root=felh név, ""=password
$MySqliLink->query("SET NAMES utf8 COLLATE utf8_hungarian_ci");
$HostInfo = mysqli_get_host_info($MySqliLink);
if (!$MySqliLink) {
    die('Kapcsolódási hiba (' . mysqli_connect_errno() . ') '    . mysqli_connect_error());
}
