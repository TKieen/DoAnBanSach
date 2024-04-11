<?php 
    function dateFormat($inputDateString) {
        try {
            $time = strtotime($inputDateString);
            $newformat = date('d-m-Y',$time);
            return $newformat;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
    }
    function dateFormatMYSQLI($inputDateString) {
        try {
            $time = strtotime($inputDateString);
            $newformat = date('Y-m-d',$time);
            return $newformat;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
    }
    function getYear($inputDate) {
        $date = dateFormat($inputDate);
        $dateArray = explode('-',$date);
        return $dateArray[2];
    }
?>