<?php
 function connectdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=BanSach", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

function getPage(){
    if(isset($_GET['index'])){
        $curr_page=$_GET['index'];
    }
    else $curr_page=1; //khi vao homepage thi page khong co
    return $curr_page;
}

function getAll($sql){
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    //$stmt->bindParam("ss",$start, $skip);
    $stmt->execute();
    //set resulting array to associative
    //array: ar[0] by index
    //associative array: [key] => value
    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //lay tat ca : fetchAll
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //lay 1: fetch
    $arr = $stmt->fetchAll();
    $conn=null;
    return $arr;
}

function getOne($sql){
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    //$stmt->bindParam("ss",$start, $skip);
    $stmt->execute();
    //set resulting array to associative
    //array: ar[0] by index
    //associative array: [key] => value
    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //lay tat ca : fetchAll
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //lay 1: fetch
    $arr = $stmt->fetch();
    $conn=null;
    return $arr;
}

function insert($sql){
    $conn = connectdb();
    $conn->exec($sql);
    $conn=null;
}

function delete($sql){
    $conn = connectdb();
    $conn->exec($sql);
    $conn=null;
}

function edit($sql){
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn=null;
}
?>