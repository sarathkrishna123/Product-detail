<?php 
include("add_server.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add product</title>
    <script src="jquery.main.js" type="text/javascript"></script>
    <script>
        function getScategory(val) {   
            $.ajax({
            type: "POST",
            url: "getCategory.php",
            data:"cat_name="+val,
            success: function(data){
                $("#scategory").html(data);                
            }
            });
        }
    </script>

</head>
<body>
    <h3 class="text-center">Product Details</h3>
    <div class="container mt-2 col-sm-5 bg-light">
        <form action="" method="post" enctype="multipart/form-data">
        <?php echo '<div class="text-danger">'.$emptyErr.'</div>'; ?>
            <div>
                <label for="productname" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="prname" placeholder="Enter Product Name.">
                <?php echo '<div class="text-danger">'.$nameErr.'</div>'; ?>
            </div>
            <div>
                <label for="mdate" class="form-label">Manufacture Date</label>
                <input type="date" name="mdate" id="mdate" class="form-control">
            </div>
            <div>
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Enter Price of product.">
                <?php echo '<div class="text-danger">'.$priceErr.'</div>'; ?>
            </div>
            <div>
                <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select" onChange="getScategory(this.value);">
                        <option value disabled selected>Select Category</option>
                        <?php
                        foreach($rslt as $category){
                        ?>
                        <option value="<?php echo $category["catname"]; ?>"><?php echo $category["catname"]; ?></option>
                        <?php } ?>
                    </select>
                    <?php echo '<div class="text-danger">'.$categoryErr.'</div>'; ?>
            </div>
            <div>
                <label for="sub_category" class="form-label">Sub Category</label>
                <select name="scategory" id="scategory" class="form-select">
                    <option value="">Subcategory</option>
                </select>
                <?php echo '<div class="text-danger">'.$scategoryErr.'</div>'; ?>
            </div>
            <div>
                <label for="upload" class="form-label">Upload Images</label>
                <input type="file" class="form-control" name="upload" id="upload">
                <?php echo '<div class="text-danger">'.$filetypErr.'</div>'; ?>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-lg btn-primary">Upload</button>
            </div>
        </form>
    </div>

</body>
</html>