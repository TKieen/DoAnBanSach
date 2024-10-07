<?php
$sql = "select idSach, hinhanh, tuasach, tonkho, giaban, s.trangthai
        from sach as s inner join theloai as tl on s.idTL = tl.idTL 
        where 1";
if(isset($_POST['db'])) {
    $sql .= " and s.trangthai = 1";
}
 
if(isset($_POST['ba'])) {
    $sql .= " and s.trangthai = 0";
} 
        
if(isset($_POST['hh'])) {
    $sql .= " and tonkho = 0";
}
if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) {
        $sql .= " and (idSach LIKE '%".$kyw."%' or tuasach LIKE '%".$kyw."%')";

        if(isset($_POST['idTL']) && ($_POST['idTL']) != -1) {
            $theloai = $_POST['idTL'];
            $sql .= " and s.idTL = '$theloai'";
        }

        if(isset($_POST['priceFrom']) && ($_POST['priceFrom'])) {
            $priceFrom = $_POST['priceFrom'];
            // TH1: nếu người dùng nhập cả 2 ô priceFrom và priceTo
            if(isset($_POST['priceTo']) && ($_POST['priceTo'])) {
                $priceTo = $_POST['priceTo'];
                if (is_numeric($priceFrom) && is_numeric($priceTo)) {
                    if ($priceFrom < 0 || $priceTo < 0) {
                        echo "
                            <script>alert('Số tiền nhập vào phải lớn hơn 0!')</script>
                        ";
                    } 
                    else 
                        if ($priceFrom > $priceTo) {
                            echo "
                                <script>alert('Giá tối thiểu phải nhỏ hơn giá tối đa!')</script>
                            ";
                        }
                        else {
                        $sql .= " and (giaban between '$priceFrom' and '$priceTo')";
                    }
                } else {
                    echo "
                        <script>alert('Giá trị nhập vào phải là chữ số!')</script>
                    ";
                }
            } else {
                // TH2: nếu người dùng chỉ nhập priceFrom
                if (is_numeric($priceFrom)) {
                    if ($priceFrom < 0) {
                        echo "
                            <script>alert('Số tiền nhập vào phải lớn hơn 0!')</script>
                        ";
                    } else {
                        $sql .= " and (giaban between $priceFrom and (select MAX(giaban) from sach))";
                    }
                } else {
                    echo "
                        <script>alert('Giá trị nhập vào phải là chữ số!')</script>
                    ";
                }
            }
        } else {
            // TH3: nếu người dùng chỉ nhập priceTo
            if(isset($_POST['priceTo']) && ($_POST['priceTo'])) {
                $priceTo = $_POST['priceTo'];
                if (is_numeric($priceTo)) {
                    if ($priceTo < 0) {
                        echo "
                            <script>alert('Số tiền nhập vào phải lớn hơn hoặc bằng 0!')</script>
                        ";
                    } else {
                        $sql .= " and (giaban between 0 and '$priceTo')";
                    }
                } else {
                    echo "
<script>alert('Giá trị nhập vào phải là chữ số!')</script>
                    ";
                }
            }
        }
    }
    else {
        if(isset($_POST['idTL']) && ($_POST['idTL']) != -1) {
            $theloai = $_POST['idTL'];
            $sql .= " and s.idTL = '$theloai'";
        }

        if(isset($_POST['priceFrom']) && ($_POST['priceFrom'])) {
            $priceFrom = $_POST['priceFrom'];
            // TH1: nếu người dùng nhập cả 2 ô priceFrom và priceTo
            if(isset($_POST['priceTo']) && ($_POST['priceTo'])) {
                $priceTo = $_POST['priceTo'];
                if (is_numeric($priceFrom) && is_numeric($priceTo)) {
                    if ($priceFrom < 0 || $priceTo < 0) {
                        echo "
                            <script>alert('Số tiền nhập vào phải lớn hơn 0!')</script>
                        ";
                    }
                    else if ($priceFrom > $priceTo) {
                        echo "
                                <script>alert('Giá tối thiểu phải nhỏ hơn giá tối đa!')</script>
                            ";
                    } else {
                        $sql .= " and (giaban between '$priceFrom' and '$priceTo')";
                    }
                } else {
                    echo "
                        <script>alert('Giá trị nhập vào phải là chữ số!')</script>
                    ";
                }
            } else {
                // TH2: nếu người dùng chỉ nhập priceFrom
                if (is_numeric($priceFrom)) {
                    if ($priceFrom < 0) {
                        echo "
                            <script>alert('Số tiền nhập vào phải lớn hơn 0!')</script>
                        ";
                    } else {
                        $sql .= " and (giaban between $priceFrom and (select MAX(giaban) from sach))";
                    }
                } else {
                    echo "
                        <script>alert('Giá trị nhập vào phải là chữ số!')</script>
                    ";
                }
            }
        } else {
            // TH3: nếu người dùng chỉ nhập priceTo
            if(isset($_POST['priceTo']) && ($_POST['priceTo'])) {
                $priceTo = $_POST['priceTo'];
                if (is_numeric($priceTo)) {
                    if ($priceTo < 0) {
                        echo "
                            <script>alert('Số tiền nhập vào phải lớn hơn hoặc bằng 0!')</script>
                        ";
                    } else {
                        $sql .= " and (giaban between 0 and '$priceTo')";
                    }
                } else {
                    echo "
                        <script>alert('Giá trị nhập vào phải là chữ số!')</script>
                    ";
                }
            }
        }
    }
}

if(isset($_POST['sort'])){
    if($_POST['sort'] == 'asc') {
        $sql .= " order by tonkho asc";
    } else if ($_POST['sort'] == 'desc') {
        $sql .= " order by tonkho desc";
    }
}

$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>