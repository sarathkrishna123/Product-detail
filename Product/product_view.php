<?php
require("view_db.php");
require_once("add_server.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel = "stylesheet">
    <script src="jquery.main.js" type="text/javascript"></script>
    <title>Product View</title>
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
    <div>
        <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <h2>Product View</h2>
                    <li class="nav-item">
                        <h6>Filterby</h6>
                        <select name="category" id="category" onChange="getScategory(this.value);">
                            <option value disabled selected>Category</option>
                            <?php
                            foreach($rslt as $category){
                            ?>
                            <option value="<?php echo $category["catname"]; ?>"><?php echo $category["catname"]; ?></option>
                            <?php } ?>
                        </select>
                        <select name="scategory" id="scategory">
                            <option value="">SubCategory</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-sm btn-secondary">Search</button>
                    </li>
                </ul>
                <a href="product_add.php"><button class="float-end">ADD PRODUCT</button></a>
            </div>
        </nav>
        <div class="product">
            <?php while($result = mysqli_fetch_assoc($sql)){ ?>
                <div class="view">
                    <img src="./uploads/<?php echo $result['images']; ?>">
                </div>
                <div class="view">
                    <p class="pname"><?php echo $result['name']; ?></p>
                    <p>Manufacturing Date: <?php echo $result['mfdate']; ?></p>
                    <p>Amount:  <?php echo $result['price']; ?> </p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>