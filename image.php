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

$sql = "SELECT * FROM user";
$res = mysqli_query($conn,$sql);

?>
<body>
<div class="row">
<?php
while ($row = mysqli_fetch_assoc($res))
{
?>
<div class="card" style="width:290px; margin:30px">
<img class="card-top-img" src="images/<?php echo $row['image']; ?>" style="width:18rem;">
<div class="card-title"> <?php echo $row['name']; ?><small class="text-muted"> <?php echo " uploaded on ".manipulate($row['date']); ?></small></div>
<div class="card-footer"><a href="update.php?image=<?php echo $row['image']; ?>" class="btn btn-warning">Update </a></div>
</div>


<?php
}
?>
</div>
</body>

<?php




/**
 * Footer
 * 
 */
?>