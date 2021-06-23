<?php
session_start();
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
if(isset($_POST['logout'])){
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
    }
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container"><br><br>
    <table class="table table-bordered"><br><br><br>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="from-group">
                    <label for="">Search</label>
                    <input  type="text" id="search">
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <button  class="btn btn-primary" onclick="window.open('form_add_product.php', '_SELF')"> Thêm mới</button>
                </div>
                <div class="col-md-6">
                    <form method="post">
                        <button type="submit" name="logout" class="btn btn-secondary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div><br>
        <thead>
            <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Product Name</th>
            <th class="text-center" scope="col">Catefory Name</th>
            <th class="text-center" scope="col">Price</th>
            <th class="text-center" scope="col">Quantity</th>
            <th class="text-center" scope="col" colspan="2">Xử lý</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            require('process_view_product.php');
            while($row = mysqli_fetch_array($query_product, MYSQLI_ASSOC)):?>
                <tr>
                    <td class="text-center"><?php echo $i ?></td>
                    <td class="text-center"><?php echo $row['product_name']?></td>
                    <td class="text-center"><?php echo $row['category_name']?></td>
                    <td class="text-center"><?php echo $row['price']?></td>
                    <td class="text-center"><?php echo $row['quantity']?></td>
                    <td class="text-center"><a href="form_edit_product.php?id=<?php echo $row['product_id'] ?>" >Edit</a></td>
                    <td class="text-center"><a href="delete_product.php?id=<?php echo $row['product_id']?>">Delete</a></td>
                </tr>
            <?php $i++; endwhile;?>
        </tbody>
    </table>
    
</div>    
</body>
</html>

<script>
$("#search").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(2)").text();

            if (id.indexOf(value) === 0) {
                $row.show();
            }else{
                $row.hide();
            }
        }
    });
});
</script>