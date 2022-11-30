<?php
const DBNAME = "da1";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "localhost";

// tạo kết nối từ project php sang mysql
function getConnect()
{
    $sqlConnection = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=" . DBCHARSET;
    $connect = new PDO(
        $sqlConnection,
        DBUSER,
        DBPASS
    );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connect;
}



function pdo_query_all($query)
{
    // select * from users where email = ? or role_id = ?

    $args = func_get_args();
    $args = array_slice($args, 1);

    $conn = getConnect();

    $stmt = $conn->prepare($query);
    $stmt->execute($args);
    $data = $stmt->fetchAll();
    if (count($data) > 0) {
        return $data;
    }

    return [];

}


function pdo_query_one($query)
{
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = getConnect();
        $stmt = $conn->prepare($query);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);              //dùng hàm này nếu muốn lấy chi tiết 1 sản phẩm nào đấy
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }

}


function pdo_execute_get_id($query)
{

    $args = func_get_args();
    $args = array_slice($args, 1);

    $conn = getConnect();

    $stmt = $conn->prepare($query);
    $stmt->execute($args);
    $lastId = $conn->lastInsertId();
    return $lastId;
}


function pdo_execute($query)
{

    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = getConnect();
        $stmt = $conn->prepare($query);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
 
   
}
?>