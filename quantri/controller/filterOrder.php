<?php
$sql = "select idDH, tenTK, ngaytao, ngaycapnhat, tongtien, dh.trangthai 
        from donhang as dh inner join taikhoan as tk on dh.idTK = tk.idTK
        where 1";

if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) $sql .= " and (dh.idDH LIKE '%".$kyw."%' or tk.tenTK LIKE '%".$kyw."%')";
        
        if(isset($_POST['trangthai']) && ($_POST['trangthai']) != -1) {
            $trangthai = $_POST['trangthai'];
            $sql .= " and dh.trangthai = '$trangthai'";
        }

        if($_POST['dateFrom'] != "" && $_POST['dateTo'] != ""){
            $from = date('Y-m-d', strtotime($_POST['dateFrom']));
            $to = date('Y-m-d', strtotime($_POST['dateTo']));
            if($from > $to) {
                echo "
                    <script>alert('Ngày bắt đầu không thể lớn hơn ngày kết thúc!')</script>
                ";
            } else{
                $sql.=' AND ngaycapnhat BETWEEN "'.$from.'" AND "'.$to.'"';
            }
        }
        else if(($_POST['dateFrom'] == "" && $_POST['dateTo']!= "") || ($_POST['dateFrom'] != "" && $_POST['dateTo'] == "")){
            if($_POST['dateFrom'] == "") $sql.=' AND ngaycapnhat <= "'.$_POST['dateTo'].'"';
            if($_POST['dateTo'] == "") $sql.=' AND ngaycapnhat >= "'.$_POST['dateFrom'].'"';
        }
    $sql.=' ORDER BY idDH';
}

$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>