<?php
    require('config.php');
    // select from product
    $sql = "SELECT pr.product_id, pr.product_name, ct.category_name, price, quantity  
    FROM products as pr INNER JOIN categories as ct 
    ON pr.category_id = ct.category_id";
    $query_product = mysqli_query($conn, $sql);
    if(!$query_product){
        die('Select product Fail');
    }else{
        echo "";
    }
   //
   if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE product_id =$id";
        $pr_list = mysqli_query($conn, $sql);  
   }
    
    // select category name
    $sql = "SELECT * FROM categories";
    $query_category = mysqli_query($conn, $sql);
    if(!$query_category){
        die('Select category Fail');
    }


?>