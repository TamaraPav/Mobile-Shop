<?php
 require "../../config/connection.php";
 $output = '';
 $upit = "SELECT * FROM users";
 $rezultat = $konekcija->query($upit);
 $rezz = $rezultat->fetchAll();

 if(count($rezz) > 0){
 $output .= "<table class='excelTable'>
 <thead>
 <tr>
 <td>First Name</td>
<td>Last Name</td>
<td>Email</td>
<td>Address</td>
 </tr>
 </thead>
 <tbody>";
 foreach($rezz as $rez){

 $output .= "<tr>
 <td>" . $rez->firstName . "</td>
 <td>" . $rez->lastName . "</td>

 <td>" . $rez->email . "</td>
 <td>" . $rez->address . "</td>
 </tr>";
 }
 $output .= "</tbody></table>";
 }
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=users.xls");
 echo $output;
?>