<?php
/***
 * Package Binayak
 * Date 2019/5/6
 * Cryatal Project
 * Image Gallery 
 * Coder Binayak
 */

/**Crystal Solution Project 657 */


include("conn.php");

$folder = "images/"; //used to update the image

$image = (isset($_GET['image'])) ? $_GET['image'] : "";
$sql = "SELECT * FROM user WHERE image = '$image'";
$res = mysqli_query($conn,$sql);
if($res)
{
    if(mysqli_num_rows($res) == 1)
    { 
    $row = mysqli_fetch_assoc($res);

?>
  <div class="container">
  <div class="jumbotron">   
<img src="images/<?php echo $row['image']; ?>" class="img-thumbnail" >
<form method ="POST" enctype="multipart/form-data" >
<label> Update Image : </label><input type="file" name="image">
<br>
<br>
<button type="submit" name="update" class="btn btn-success"> Update </button>

</form>
</div>
</div>
    <?php }
    else 
    {
        header("LOCATION: image.php");
    }
}



if(isset($_POST['update']))
{

if(isset($_FILES['image']))
{
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_tmp = $_FILES['image']['tmp_name'];
    $img_err = $_FILES['image']['error'];
    $tmp = explode(".",$img_name);
    $img_ext = end($tmp);
    $ext_array = array("jpg","jpeg","png");
    $date = date("Y-m-d h:i:s");

    if(in_array($img_ext,$ext_array))
    {
     
      
           if($img_err === 0)
           {
                    $filename = uniqid();
                    $fileNewName = $filename.".".$img_ext;
                    $destiny = $folder.$fileNewName;
                    echo $destiny;
           move_uploaded_file($img_tmp,$destiny);
           $sql = "UPDATE user set image='$fileNewName', date='$date' WHERE image='$image'";
           $res = mysqli_query($conn,$sql);
           unlink($folder.$image);
           header("LOCATION: image.php");
           }
           else{
           display("Sorry la trmo  kam nai vayena");
           }
       
    }
    else {
        display(" Our system Only supports png,jpg,jpeg format of images");
    }
}
else
{
    display("Error");
}
}

/**
 * Footer
 * 
 */
?>
