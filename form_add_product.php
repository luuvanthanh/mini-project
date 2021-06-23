<?php
session_start();
if (!isset($_SESSION['username'])) {
	 header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container"><br><br>
    <form action="process_add_product.php" method="POST">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control"  placeholder="Enter productName">
        </div>
        <div class="form-group">
            <label >CategoryName</label>
            <select class="form-control" name="category_id">
            <?php
                require('process_view_product.php');
                while($row_cate = mysqli_fetch_array($query_category, MYSQLI_ASSOC)){
            ?>
                <option value="<?php echo $row_cate['category_id']?>"><?php echo $row_cate['category_name'] ?></option>
            <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control"  placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control"  placeholder="Enter Quantity">
        </div>
        <button type="submit" name="add" class="btn btn-primary">Add product</button>
        <a class="btn btn-primary" href="view_product.php">Quay lại</a>
    </form>
    </div>
</body>
</html>