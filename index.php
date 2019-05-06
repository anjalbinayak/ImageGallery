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
function display($mesg)
{
    echo $mesg;
}
?>
<body>
<div class="jumbotron">
<form method="POST" enctype="multipart/form-data">
<label for="name">Name : </label>
<input type="text" name="name" id="name" class="form-control" style="width:30%">
<br>
<label for="image">Image : </label>
<input type="file" name="image" id="image" >
 <br>
 <br>
<button type="submit" name="save" class="btn btn-success">Save </button>

</form>
</div>



</body>

<?php
$folder = "images/";

if(isset($_POST['save']))
{
$name = $_POST['name'];
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
       if(empty($name))
       {
           display("Please Enter Your Name");
       }
       else{
           if($img_err === 0)
           {
                    $filename = uniqid();
                    $fileNewName = $filename.".".$img_ext;
                    $destiny = $folder.$fileNewName;
                    echo $destiny;
           move_uploaded_file($img_tmp,$destiny);
           $sql = "INSERT INTO user(name,image,date) values('$name','$fileNewName','$date')";
           $res = mysqli_query($conn,$sql);
           header("LOCATION: image.php");
           }
           else{
           display("Sorry la trmo  kam nai vayena");
           }
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