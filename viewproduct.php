

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

<div class="container my-5">
        <h1 class="text-center my-3">View Product</h1>
        <?php
        if(isset($_GET['msg'])){
          ?>
          <div class="alert alert-success"><?php echo $_GET['msg']?></div>
          <?php  
        }
        ?>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>SNO</th>
                <th>Product Name</th>
                <th>Category </th>
				<th>Image </th>
				<th>Price </th>
				<th>Description </th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                include("config.php");
                $query="SELECT * from `product`";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $data['productname']?></td>
					<td><?php echo $data['category_name']?></td>
                    <td>
                        <img src="images/<?php echo $data['image']?>" style="height:200px; width: 40%;" class="img-fluid w-50">
                    </td>
                    <!-- <td><?php echo $data['id']?></td> -->
                    <td><?php echo $data['price']?></td>
					<td><?php echo $data['description']?></td>
					
					<td>
                        <a href="updateproduct.php?id=<?php echo $data['id']?>" class="btn btn-success">
                            <i class="bi bi-pencil-square">
                            </i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="deleteproduct.php?id=<?php echo $data['id']?>">
                            <i class="bi bi-trash">
                            </i>
                        </a>
                    </td>
                </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
    </div>

<!--footer-->
<?php
include("footer.php");
?>