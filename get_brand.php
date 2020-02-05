<?php

include "conn.php";
$brandOptions = "<option value=''>Select a Brand</option>";
$queryBrand = "SELECT * FROM brand";
$result = mysqli_query($conn, $queryBrand);
while ($row = mysqli_fetch_array($result)) {
  $brandOptions .= "<option value='".$row['id']."'>".$row['brand']."</option>";
}
echo $brandOptions;
mysqli_close($conn);
?>