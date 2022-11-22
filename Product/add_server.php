<?php
include("dbconn.php");
$error =array();
$emptyErr="";
$nameErr="";
$priceErr="";
$categoryErr = "";
$scategoryErr = "";
$filetypErr="";

$allowedFileType = array('jpg','png','jpeg');
///
$qry = "SELECT * FROM `category`";
$rslt = mysqli_query($con, $qry);
///////

if(isset($_POST["submit"])){
    $prname = $_REQUEST["prname"];
    $mdate = $_REQUEST["mdate"];
    $price = $_REQUEST["price"];
    $category = $_REQUEST["category"];
    $scategory = $_REQUEST["scategory"];
    $image = $_FILES["upload"]["name"];
    $tempname = $_FILES["upload"]["tmp_name"];
    $folder = "./uploads/" . $image;
    $file_type = pathinfo($folder, PATHINFO_EXTENSION);


    if(empty($prname) && empty($mdate) && empty($price) && empty($category) && empty($scategory)){
        array_push($error, $emptyErr="*Fields cannot left blank");

    }
    elseif(!preg_match("/^[a-zA-Z0-9 ]*$/", $prname)){
        array_push($error, $nameErr = "*Please insert a valid name.");
    }
    elseif(!preg_match ("/^[0-9]+(\.[0-9]{2})?$/", $price)){
        array_push($error, $priceErr = "*Please enter the price.");
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/", $category)){
        array_push($error, $categoryErr = "*Please select a category.");
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/", $scategory)){
        array_push($error, $scategoryErr = "*Please select a category.");
    }
    if(in_array(strtolower($file_type), $allowedFileType)){
        if(move_uploaded_file($tempname, $folder)){
            $upfile = "File uploaded.";
        }
    }
    else{
        array_push($error, $filetypErr = "*jpg, jpeg, png files only supported."); 
    }

    if(count($error) == 0){
        $sql = "INSERT INTO `product_list` (`name`,`mfdate`,`price`,`category`,`subcategory`, `images`) VALUES ('$prname','$mdate','$price','$category','$scategory','$image')";
        mysqli_query($con, $sql);
        header("Location: product_view.php");
    }
    else{
        echo "ERROR! Unable to connect.";
    }


}

?>