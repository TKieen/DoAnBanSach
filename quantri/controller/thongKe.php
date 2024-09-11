<?php
    include_once "../../lib/connect.php";
    include_once "../model/functions.php";
    
    function DoanhThu_getTongDH($startDate, $endDate) {
        $sql = "SELECT * FROM donhang WHERE ngaytao >='".dateFormatMYSQLI($startDate)."' AND ngaytao <='".dateFormatMYSQLI($endDate)."'";
        $result = getAll($sql);
        return count($result);
    }
    
    function DoanhThu_getTongTien($startDate, $endDate) {
        $sql = "SELECT tongtien FROM donhang WHERE ngaytao >='".dateFormatMYSQLI($startDate)."' AND ngaytao <='".dateFormatMYSQLI($endDate)."'";
        $result = getAll($sql);
        $tongTienTotal = 0;
        foreach ($result as $dh) {
            $tongTienTotal += $dh['tongtien'];
        }
        return $tongTienTotal;
    }

    function DoanhThu_getTongSL($startDate, $endDate) {
        $sql = "SELECT tongSL FROM donhang WHERE ngaytao >='".dateFormatMYSQLI($startDate)."' AND ngaytao <='".dateFormatMYSQLI($endDate)."'";
        $result = getAll($sql);
        $tongSLTotal = 0;
        foreach ($result as $dh) {
            $tongSLTotal += $dh['tongSL'];
        }
        return $tongSLTotal;
    }

?>