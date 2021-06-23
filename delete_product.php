<?php
    require('config.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM products WHERE product_id = $id";
        $query_delete = mysqli_query($conn, $sql);
        if(!$query_delete){
            die('delete fail');
        }else{
            header('location:view_product.php');
        }
    }
    
?>