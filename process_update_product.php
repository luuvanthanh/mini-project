<?php
    require('config.php');

    if(isset($_POST['save'])){
        $id = $_GET['id'];
        $product_name = $_POST['product_name'];
        $categoryID = $_POST['category_id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        echo  $product_name, $categoryID,$price,$quantity;
        $sql = "UPDATE products 
        SET product_name = '$product_name', 
            category_id = $categoryID, 
            price = $price, 
            quantity = '$quantity' 
        WHERE product_id = $id ";
        $query_edit = mysqli_query($conn,$sql );
        if(!$query_edit){
            die('edit fail');
        }else{
            header('location:view_product.php');
        }
    }
?>