<?php
    require('config.php');
    // add product
    if(isset($_POST['add'])){
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $sql = "INSERT INTO products (product_name,category_id,price,quantity) 
                            VALUES('$product_name', $category_id, $price, '$quantity')";
        $query_add = mysqli_query($conn, $sql);
        if(!$query_add){
            die('Add Fail');
        }else{
            header('location:view_product.php');
        }
    }
?>