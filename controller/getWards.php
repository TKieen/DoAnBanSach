<?php
// Kết nối tới cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "bansach");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận district_id từ yêu cầu POST
$district_id = $_POST['district_id'];

if (!empty($district_id)) {
    // Sử dụng prepared statement để tránh SQL Injection
    $sql = "SELECT ward_id, ward_name FROM wards WHERE district_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $district_id);  // Gán giá trị cho câu truy vấn
    $stmt->execute();
    $result = $stmt->get_result();
    
    $wards = array();
    
    // Kiểm tra và thêm các xã/phường vào mảng $wards
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $wards[] = $row;
        }
    }
    
    // Trả về danh sách xã/phường dưới dạng JSON
    echo json_encode($wards);
    
    // Đóng chuẩn bị truy vấn
    $stmt->close();
} else {
    // Trả về thông báo lỗi nếu không nhận được district_id
    echo json_encode(['error' => 'district_id is required']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
