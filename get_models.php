<?php

include "conn.php";
$brand = $_POST["brand"];
$modelOptions = "<option value=''>Select a Model</option>";
$queryModel = "SELECT * FROM model WHERE id_brand=".$brand;
$result = mysqli_query($conn, $queryModel);
while ($row = mysqli_fetch_array($result)) {
  $modelOptions .= "<option value='".$row['id']."'>".$row['model']."</option>";
}
echo $modelOptions;
mysqli_close($conn);
?>