<?php
require "connect.php";

$query =
    "SELECT DISTINCT * FROM paylist 	ORDER BY rand(" . date("Ymd") . ") LIMIT 3";

$arrayplaylistfortoday = [];
$data = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($data)) {
    array_push($arrayplaylistfortoday, [
        "idPaylist" => $row["idPaylist"],
        "Ten" => $row["Ten"],
        "HinhNen" => $row["HinhNen"],
        "HinhIcon" => $row["HinhIcon"],
    ]);
}

echo json_encode($arrayplaylistfortoday);

?>
