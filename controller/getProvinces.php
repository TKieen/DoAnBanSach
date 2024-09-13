<?php
    // $conn = new mysqli("localhost","root","","bansach");
    // $sql = "SELECT province_id, province_name FROM provinces";
    // $result = mysqli_query($conn, $sql);
    
    $sql = "SELECT province_id, province_name FROM provinces";
    $result = getAll($sql);
    
    $provinces = array();
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $provinces[] = $row;
        }
    }
    // Trả về danh sách dưới dạng JSON
    echo json_encode($provinces);
?>