<?php
require("dbconn.php");

if(!empty($_POST["cat_name"])){
    $check = $_POST["cat_name"];
    $query = "SELECT * FROM `sub_category` WHERE cat_name = '".$check."'";
    $result = mysqli_query($con, $query);
?>
<option value disabled selected>Sub Category</option>
<?php foreach($result as $scat){ ?>
<option value="<?php echo $scat['scatname']; ?>"><?php echo $scat['scatname']; ?></option>
<?php
}
}

?>