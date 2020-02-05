<?php

include "conn.php";
$table = "";
$query = "SELECT brand, model FROM model INNER JOIN brand ON brand.id = model.id_brand ORDER BY brand";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
  $table .= "<tr><td scope='col'>".$row['brand']."</<td><td scope='col'>".$row['model']."</td></tr>";
}
echo $table;
mysqli_close($conn);
?>