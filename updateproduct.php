
<?php
include("Adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}
?>
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminindex.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jewellery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    include("config.php");
    $query2="Select * from `product` where `id`='$id'";
    $result2=mysqli_query($connect,$query2);
    $data2=mysqli_fetch_array($result2);
}
else{
    echo "<script>window.location.assign('viewproduct.php?msg=Please choose an item to update')</script>";
}
?>
<div class="container my-5">
    <?php
    if(isset($_GET['msg'])){
    echo $_GET['msg'];
    }
    ?>
 <div class="card px-5 c1">
    <h1 class="text-center my-3">Update Product</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-md-2">
                <label>Product Name</label>
            </div>
            <div class="col-md-10">
                <input class="form-control" type="text" name="productname" value="<?php echo $data2['productname']?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-2">
                <label>Category Name</label>
            </div>
            <div class="col-md-10">
			<select class="form-control" name="cat_name"  >
                    <option  disabled>Choose one</option>
                    <?php
                    include("config.php");
                    $query3="Select * from `category`";
                    $result3=mysqli_query($connect,$query3);
                    while($data3=mysqli_fetch_array($result3)){
                        ?>
                    <option 
                    <?php
                    if($data2['category_name']==$data3['category_name']){
                        echo "selected";
                    }
                    ?>
                    ><?php echo $data3['category_name']?></option>
                     <?php   
                    }
                    ?>
            </select>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-2">
                <label>Image</label>
            </div>
            <div class="col-md-10">
                <input class="form-control" type="file" name="image" >
                <input value="<?php echo $data2['image']?>" name="hidden_old_image" type="hidden">
            </div>
        </div>
		<div class="row my-3">
            <div class="col-md-2">
                <label>Price</label>
            </div>
            <div class="col-md-10">
			<input class="form-control" type="number" name="price"  value="<?php echo $data2['price']?>">
            </div>
        </div>
		<div class="row my-3">
            <div class="col-md-2">
                <label>Description</label>
            </div>
            <div class="col-md-10">
            <input class="form-control" type="description" name="description"></textarea value="<?php echo $data2['description']?>">
			
            </div>
        </div>
        <button class="btn btn-primary d-block mx-auto my-3" name="submit_btn">Update</button>
    </form>
</div>
</div>
<?php
if(isset($_POST['submit_btn'])){
    $productname=$_POST['productname'];
	$categoryname=$_POST['cat_name'];
    if($_FILES['image']['name']){
        $img_name=$_FILES['image']['name'];
        $img_path=$_FILES['image']['tmp_name'];
        $new_name=rand().$img_name;
        echo $new_name;
        move_uploaded_file($img_path,"images/".$new_name);
    }
    else{
        $new_name=$_POST['hidden_old_image'];
        echo $new_name;
    }
	$price=$_POST['price'];
	$description=$_POST['description'];
    include("config.php");
    $query1="UPDATE `product` set `productname`='$productname',`category_name`='$categoryname',
	`image`='$new_name',`price`='$price',`description`='$description' where `id`='$id'";
    $result=mysqli_query($connect,$query1);
    if($result>0){
        echo "<script>window.location.assign('viewproduct.php?msg=Updated Successfully!!')</script>";
    }
    else{
        echo "<script>window.location.assign('viewproduct.php?msg=Error While Updating!!')</script>";
    }
}
?>

<?php
include("footer.php");
?>