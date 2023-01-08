<?php
require "connect.php";

$query = "SELECT * FROM paylist";
$data = mysqli_query($con, $query);

$arrayplaylist = [];
while ($row = mysqli_fetch_assoc($data)) {
    array_push($arrayplaylist, [
        "idPaylist" => $row["idPayList"],
        "Ten" => $row["Ten"],
        "HinhNen" => $row["HinhNen"],
        "HinhIcon" => $row["HinhIcon"],
    ]);
}
echo json_encode($arrayplaylist);
?>
