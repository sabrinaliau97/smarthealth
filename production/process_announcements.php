<?php

require_once 'include/common.php';

// var_dump($_SESSION['CH']);
//var_dump($_POST['announcements']);

if (isset($_POST['announcements']))
{   
    $announcements = $_POST['announcements'];

    $dao = new EditnewsDAO();
    $msg = $dao->editnews($announcements);

    header("Location: ch_bed_avail.php");
    return;  
}
else
{
    $msg = "Missing information";
    header("Location: ch_bed_avail.php");
    return;  
}

?>

