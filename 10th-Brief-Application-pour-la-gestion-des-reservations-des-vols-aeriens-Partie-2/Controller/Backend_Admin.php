<?php
include('../model/flight_class.php');
include('../model/User_Class.php');

//Insert Flight
if(ISSET($_POST['addFlight'])){
    $date_depart = $_POST['date_depart'];
    $vdepart = $_POST['vdepart'];
    $varrivee = $_POST['varrivee'];
    $npalace = $_POST['npalace'];
    $statut = $_POST['statut'];
    $prix = $_POST['prix'];
    $vol = new Vol();
    $vol -> flight_insert($vdepart, $varrivee,$date_depart, $npalace,$prix,$statut);
    header("location: ../Views/admin.php");
}

//Update Flight
if(ISSET($_POST['update-fight'])){
    $id = $_POST['id'];
    $statut = $_POST['statut'];
    $vol = new Vol();
    $vol -> flight_update($id,$statut);
    mysqli_query($conn, "UPDATE `vols` SET `statut` = '$statut' WHERE `id` = '$id'");
    header("location: ../Views/admin.php");
}











// ?>