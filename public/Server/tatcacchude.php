<?php
require "connect.php";

$arraychude = [];
$query = "SELECT * FROM idChude";
$data = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($data)) {
    array_push(
        $arraychude, array(
			"idChuDe" => $row["idChude"],
			"TenChuDe" => $row["TenChuDe"],
			"HinhChuDe" => $row["HinhChuDe"]
		)
    );
}

echo json_encode($arraychude , JSON_UNESCAPED_UNICODE);
?>
