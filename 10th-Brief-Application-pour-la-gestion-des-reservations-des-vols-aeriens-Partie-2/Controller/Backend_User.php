<?php
include('../Model/User_Class.php');
include('../Model/Passanger_class.php');
include('../Model/reservation_class.php');
include('../Model/flight_class.php');


//displays information about this command (use AJAX).
if (isset($_POST['reservation_id'])) {
  $id = $_POST['reservation_id'];
  $output = '';//call on form string

  $reservation = new Reservation();
  $res = $reservation->reservation_show_id($id); //call if of reservation
  $rowid = $res->fetch_assoc();//display on form array

  //display data of flight based on id 
  $vol = new Vol();
  $res1 = $vol->flight_show_id($rowid['vol_id']);
  //search of passanger and stock it on res2
  $passager = new Passager();
  $res2 = $passager->passager_show_id($rowid['passager_id']);
  //output of table
  $output .= '  
  <div class="table-responsive">  
  <table class="table table-bordered table-dark table-hover">';
  while ($row2 = $res2->fetch_assoc())
  while ($row1 = $res1->fetch_assoc()) {
    $output .= '  
            <tr>  
                 <th><label>Full Name</label></td>  
                 <td>' . $row2["nom"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Address</label></td>  
                 <td>' . $row2["adresse"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Email</label></td>  
                 <td>' . $row2["email"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Age</label></td>  
                 <td>' . $row2["age"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Phone</label></td>  
                 <td>' . $row2["tele"] . ' </td>  
            </tr> 
            <tr>  
                 <th><label>Tecket</label></td>  
                 <td>' . $row1["id"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Departure city</label></td>  
                 <td>' . $row1["depart"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Arrival city</label></td>  
                 <td>' . $row1["destination"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Departure date</label></td>  
                 <td>' . $row1["date_depart"] . '</td>  
            </tr>  
            <tr>  
                 <th><label>Number of places</label></td>  
                 <td>1</td>  
            </tr> 
            <tr>  
                 <th><label>Price</label></td>  
                 <td>' . $row1["prix"] . ' </td>  
            </tr>  
            <tr>  
                 <th><label>status</label></td>  
                 <td>' . $row1["statut"] . ' </td>  
            </tr>  
            ';
  }
  $output .= "</table></div>";
}
$result = $output;
echo $result;


?>