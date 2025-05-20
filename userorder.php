

<?php
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Please Login!!')</script>";
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
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<div class="container my-5">
        <h1 class="text-center my-3">View Orders</h1>
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
                <th>Order Number</th>
                <th>Order Date </th>
				<th>Total Price </th>
				<th>Shipping Details </th>
				<th>Status </th>
            </tr>
            <?php
                include("config.php");
                $query="SELECT * from `order` where `email`='$_SESSION[email]'";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><a href="order_details.php?orderno=<?php echo $data['orderno']?>"><?php echo $data['orderno']?></a></td>
					<td><?php echo $data['orderdate']?></td>
                    <td>&#8377;<?php echo $data['totalprice']?></td>
                    <td><?php echo $data['name'].",".$data['address'].",<br> Contact-". $data['contact']?></td>
					<td><?php echo $data['status']?></td>
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