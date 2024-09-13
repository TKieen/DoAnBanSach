<?php
// Kết nối tới cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "bansach");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận province_id từ yêu cầu POST
$province_id = $_POST['province_id'];

if (!empty($province_id)) {
    // Sử dụng prepared statement để tránh SQL Injection
    $sql = "SELECT district_id, district_name FROM districts WHERE province_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $province_id);  // Gán giá trị cho câu truy vấn
    $stmt->execute();
    $result = $stmt->get_result();
    
    $districts = array();
    
    // Kiểm tra và thêm các quận/huyện vào mảng $districts
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $districts[] = $row;
        }
    }
    
    // Trả về danh sách quận/huyện dưới dạng JSON
    echo json_encode($districts);
    
    // Đóng chuẩn bị truy vấn
    $stmt->close();
} else {
    // Trả về thông báo lỗi nếu không nhận được province_id
    echo json_encode(['error' => 'province_id is required']);
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
