<?php
    $GLOBALS['conn'] = new mysqli("localhost","root","","bansach");
    function getPage(){
        $curr_page = 1;
        if(isset($_GET['index']))
            $curr_page=$_GET['index'];
        return $curr_page;
    }

    function getAll($sql){
        $result= $GLOBALS['conn']->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    function getOne($sql){  
        $result= $GLOBALS['conn']->query($sql)->fetch_assoc();
        return $result;
    }
    function insert($sql){
        $GLOBALS['conn']->query($sql);
    }

    function delete($sql){
        $GLOBALS['conn']->query($sql);
    }

    function edit($sql){
        $GLOBALS['conn']->query($sql);
    }
?>