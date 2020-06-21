<?php
class Vol{

		function __construct() {
			$this->conn = new mysqli("localhost","root","","gestion_reservations");
		}

		function flight_insert($vdepart, $varrivee,$date_depart, $npalace,$prix,$statut) {	 


            $stmt =$this->conn->prepare("INSERT Into vols (depart, destination, date_depart,num_place, prix, statut) values(?,?,?,?,?,?)");
				$stmt->bind_param("sssiis", $vdepart, $varrivee,$date_depart, $npalace,$prix,$statut);
				$stmt->execute();
		}
		
		function flight_update($id,$statut) {
            mysqli_query($this->conn, "UPDATE `vols` SET `statut` = '$statut' WHERE `id` = '$id'") or die(mysqli_error($this->conn));
		}

		function flight_show($villedepart,$villearrivee) { //search on database
		$query = "SELECT * from vols where depart='$villedepart' AND destination='$villearrivee' AND num_place > 0 AND statut = 'Valide' ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		return  $result;		
		}

		function flight_show_id($id) { //Return result of id
			$query = "SELECT * from vols where id='$id'";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}

		function flight_show_all() {  //display flight data on admin Panal
			$query = "SELECT * from vols";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}













}










?>