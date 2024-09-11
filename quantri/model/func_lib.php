<?php
    function priceFormat($price) {
        return number_format($price, 0, ',', '.');
    }

    function dateTimeFormat($date) {
        return date("d-m-Y H:i:s", strtotime($date));
    }

    function dateFormat($date) {
        return date("d-m-Y", strtotime($date));
    }

    function strToDate($date) {
        return date("Y-m-d", strtotime($date));
    }
    /* End: Datas format */


    /* Start: Get datas from database (PDO) */
    function getOrderInfo($idDH){
        //Lấy dữ liệu đơn hàng để in từ database
        $sql = "SELECT 	dh.idDH, dh.ngaytao, tk.idTK, tk.tenTK, tk.dienthoai, dh.tongtien
                FROM	donhang dh, taikhoan tk
                WHERE	dh.idTK = tk.idTK
                    AND	dh.idDH = $idDH";
        return getOne($sql);
    }

    function getOrderDetailInfo($idDH){
        //Lấy dữ liệu đơn hàng để in từ database
        $sql = "SELECT 	ct.idSach, sach.tuasach, ct.soluong, ct.gialucdat
            FROM	ctdonhang ct, sach
            WHERE	ct.idSach = sach.idSach
                AND	ct.idDH = $idDH";
        return getAll($sql);
    }

    function getGRNInfo($idPN) {
        //Lấy dữ liệu đơn hàng để in từ database
        $sql = "SELECT DISTINCT	pn.idPN, pn.ngaytao, sach.idNCC, ncc.tenNCC, ncc.dienthoai, ncc.email, pn.tongsoluong, pn.tongtien
                FROM	phieunhap pn, ctphieunhap ctpn, sach, nhacungcap ncc
                WHERE	pn.idPN = ctpn.idPN
                    AND	ctpn.idSach = sach.idSach
                    AND	sach.idNCC = ncc.idNCC
                    AND pn.idPN = ".$idPN;
        return getOne($sql);
    }

    function getGRNDetails($idPN){
        $sql = "SELECT 	ctpn.idSach, sach.tuasach, ctpn.soluong, sach.giabia, ctpn.gianhap, ctpn.soluong*ctpn.gianhap as thanhtien
                FROM	phieunhap pn, ctphieunhap ctpn, sach
                WHERE	pn.idPN = ctpn.idPN
                    AND	ctpn.idSach = sach.idSach
                    AND pn.idPN = ".$idPN;
        return getAll($sql);
    }

    //Hàm lấy dữ liệu doanh thu theo tháng (chia theo tuần)
        //Trả về tổng tiền doanh thu của từng tuần trong tháng
    function getOrderTotal($dateStart, $dateEnd) {
        $sql = "SELECT 	SUM(dh.tongtien) as tongtien
                FROM	donhang dh
                WHERE	dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'
                    AND dh.trangthai = 'ht'
                GROUP BY dh.trangthai";
        $result = getOne($sql);
        if($result == null) return 0;
        return $result['tongtien'];
    }
        //Hàm trả về số đơn hàng của từng tuần trong tháng
    function getOrderCount($dateStart, $dateEnd) {
        $sql = "SELECT	COUNT(dh.idDH) as tongsodon
                FROM	donhang dh
                WHERE	dh.trangthai = 'ht'
                    AND	dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
        $result = getOne($sql);
        if($result == null) return 0;
        return $result['tongsodon'];
    }

        //Hàm trả về tổng số lượng sản phẩm đã bán của từng tuần trong tháng
    function getQuantityCount($dateStart, $dateEnd) {
        $sql = "SELECT	SUM(ct.soluong) as tongsp
                FROM	ctdonhang ct, donhang dh
                WHERE	ct.idDH = dh.idDH
                    AND	dh.trangthai = 'ht'
                    AND	dh.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
        $result = getOne($sql);
        if($result['tongsp'] == null) return 0;
        return $result['tongsp'];
    }

    function getGRNCount($dateStart, $dateEnd) {
        $sql = "SELECT COUNT(pn.idPN) as tongdonnhap
                FROM	phieunhap pn
                WHERE	pn.trangthai = 'ht'
                    AND	pn.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
        $result = getOne($sql);
        if($result == null) return 0;
        return $result['tongdonnhap'];
    }

    function getGRNQty($dateStart, $dateEnd) {
        $sql = "SELECT SUM(ctpn.soluong) as tongspnhap
                FROM	phieunhap pn, ctphieunhap ctpn
                WHERE	pn.trangthai = 'ht'
                    AND pn.idPN = ctpn.idPN
                    AND	pn.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
        $result = getOne($sql);
        if($result['tongspnhap'] == null) return 0;
        return $result['tongspnhap'];
    }

    function getGRNTotal($dateStart, $dateEnd) {
        $sql = "SELECT SUM(pn.tongtien) as tongtiennhap
                FROM	phieunhap pn
                WHERE	pn.trangthai = 'ht'
                    AND	pn.ngaytao BETWEEN '".$dateStart."' AND '".$dateEnd."'";
        $result = getOne($sql);
        if($result == null) return 0;
        return $result['tongtiennhap'];
    }

    function getProfit($dateStart, $dateEnd) {
        // return getOrderTotal($dateStart, $dateEnd) - getGRNTotal($dateStart, $dateEnd);
        
        $sql = "SELECT SUM(dh.tongtien) - SUM(pn.tongtien) as loinhuan
                FROM	phieunhap pn, donhang dh
                WHERE 1";
        $sql .= " AND pn.trangthai = 'ht'";
        $sql .= " AND dh.trangthai = 'ht'";
        $sql .= " AND dh.ngaytao BETWEEN '".$dateStart."' AND ".$dateEnd."'";   
        $sql .= " AND pn.ngaytao BETWEEN '".$dateStart."' AND ".$dateEnd."'" ;

        $result = getOne($sql);
        if($result == null) return 0;
        return $result['loinhuan'];
    }
    /* End: Get datas from database (PDO) */


    /* Start: Other function */
    function numberToWords($number) {
        $hyphen      = ' ';
        $conjunction = '  ';
        $separator   = ' ';
        $negative    = 'âm ';
        $decimal     = ' phẩy ';
        $dictionary  = array(
            0                   => 'Không',
            1                   => 'Một',
            2                   => 'Hai',
            3                   => 'Ba',
            4                   => 'Bốn',
            5                   => 'Năm',
            6                   => 'Sáu',
            7                   => 'Bảy',
            8                   => 'Tám',
            9                   => 'Chín',
            10                  => 'Mười',
            11                  => 'Mười một',
            12                  => 'Mười hai',
            13                  => 'Mười ba',
            14                  => 'Mười bốn',
            15                  => 'Mười lăm',
            16                  => 'Mười sáu',
            17                  => 'Mười bảy',
            18                  => 'Mười tám',
            19                  => 'Mười chín',
            20                  => 'Hai mươi',
            30                  => 'Ba mươi',
            40                  => 'Bốn mươi',
            50                  => 'Năm mươi',
            60                  => 'Sáu mươi',
            70                  => 'Bảy mươi',
            80                  => 'Tám mươi',
            90                  => 'Chín mươi',
            100                 => 'trăm',
            1000                => 'nghìn',
            1000000             => 'triệu',
            1000000000          => 'tỷ',
            1000000000000       => 'nghìn tỷ',
            1000000000000000    => 'nghìn triệu triệu',
            1000000000000000000 => 'tỷ tỷ'
        );
    
        if (!is_numeric($number)) {
            return false;
        }
    
        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'numberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }
    
        if ($number < 0) {
            return $negative . numberToWords(abs($number));
        }
    
        $string = $fraction = null;
    
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
    
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . numberToWords($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = numberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
    
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                   $string .= numberToWords($remainder);
                }
                break;
        }
    
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
    
        return $string;
    }

    function getCurrentDate() {
        return "ngày " . date("d") . " tháng " . date("m") . " năm " . date("Y");
    }

    function getYear($date) {
        return date("Y", strtotime($date));
    }

    function getMonth($date) {
        return date("m", strtotime($date));
    }

    function dayEndOfMonth($date) {
        return date("t", strtotime($date));
    }

    //Hàm lấy các tuần và ngày trong tuần của tháng
    function getWeeks($date) {
        $day = 1;
        //Mảng chứa các tuần của tháng
        $weeks = array();
        //Lấy ngày cuối cùng của tháng
        $dayEnd = dayEndOfMonth($date);
        //Duyệt qua các ngày của tháng (với tuần bắt đầu từ 1)
        $week = 1;
        while ($day <= $dayEnd) {
            $weeks[$week][] = strToDate(getYear($date) . '-' . getMonth($date) . '-' . $day);
            $day++;
            if (date("w", strtotime($date . '-' . $day)) == 1) { //"w" là số thứ tự của ngày trong tuần (0: Chủ nhật, 6: Thứ 7)
                $week++;
            }
        }
        return $weeks;
    }

    //Hàm lấy các ngày của mỗi tháng của năm
    function getDaysOfMonth($year) {
        $months = array();
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = array();
            $dayEnd = dayEndOfMonth($year . '-' . $i . '-01');
            for ($j = 1; $j <= $dayEnd; $j++) {
                $months[$i][] = $year . '-' . $i . '-' . $j;
            }
        }
        return $months;
    }

    //10-4
    function createMonthSelectBox() {
        $selectBox = '<select name="thang" id="xemthang">';
        $month = date('m');
        $year = date('Y');
        for ($i = 1; $i <= $month; $i++) {
            for($j = 2024; $j <= $year; $j++) {
                $selectBox .= "<option value='$j-$i'";
                $selectBox .= (isset($_GET['thang']) && $_GET['thang'] == ($j . '-' . $i)) ? 'selected' : '';
                $selectBox .= ">Tháng $i/$j</option>";
            }
        }
        $selectBox .= '</select>';
        return $selectBox;
    }

    function createYearSelectBox() {
        $selectBox = '<select name="nam" id="xemnam">';
        $year = date('Y');
        for ($i = 2024; $i <= $year; $i++) {
            $selectBox .= "<option value='$i'";
            $selectBox .= (isset($_GET['nam']) && $_GET['nam'] == $i) ? 'selected' : '';
            $selectBox .= ">$i</option>";
        }
        $selectBox .= '</select>';
        return $selectBox;
    }
    //10-4

    /* End: Other function */
?>