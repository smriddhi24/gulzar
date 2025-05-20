<?php
include('header.php');
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
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<div class="container table-responsive " style="margin-top:30px; border:1px solid grey;box-shadow: 10px 10px 5px grey;">
<?php
        // if(isset($_GET['id'])){
        //     $id=$_GET['id'];
        //     include("config.php");
        //     $query2="Select * from `cart` where `id`='$id'";
        //     $result2=mysqli_query($connect,$query2);
        //     $data2=mysqli_fetch_array($result2);
        // }
        
        if(isset($_GET['msg'])){
          ?>
          <div class="alert alert-success"><?php echo $_GET['msg']?></div>
          <?php  
        }
        ?>    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SNo</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>price</th>
                <th>Total price</th>
                <th>Delete</th>
        </thead>
        <tbody>
            <?php
                include("config.php");
                $query="SELECT * from `cart` where `email`='$_SESSION[email]'";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $data['productname']?></td>
                    <td>
                        <form method="post">
                            <button name="dec" class="btn btn-danger">-</button>
                            <input name="quantity" value="<?php echo $data['quantity']?>" readonly>
                            <input type="hidden"name="id" value="<?php echo $data['id']?>">
                            <input type="hidden"name="price" value="<?php echo $data['price']?>">
                            <button name="inc" class="btn btn-success">+</button>
                        </form>
                        <?php
                        if(isset($_POST['dec']))
                        {
                            $quantity=$_POST['quantity'];
                            $price=$_POST['price'];
                            $id=$_POST['id'];
                            if($quantity<=1){
                                $query3="DELETE from `cart` where `id`='$id'";
                            }
                            else{
                                $quantity1=$quantity-1;
                                $total=$price*$quantity1;
                             $query3="UPDATE `cart` set `quantity`='$quantity1',`total_price`='$total' where `id`='$id'";
                            }
                           
                            include("config.php");
                            $result3=mysqli_query($connect,$query3);
                            if($result3>0){
                                echo "<script>window.location.assign('cart.php?msg=Updated Successfully!!')</script>";
                            }
                            else{
                                echo "<script>window.location.assign('cart.php?msg=Error While Updating!!')</script>";
                            }
                        }
                        if(isset($_POST['inc']))
                        {
                            $quantity=$_POST['quantity'];
                            $quantity1=$quantity+1;
                            $price=$_POST['price'];
                            $total=$price*$quantity1;
                            $id=$_POST['id'];
                            include("config.php");
                            $query4="UPDATE `cart` set `quantity`='$quantity1',`total_price`='$total' where `id`='$id'";
                            $result4=mysqli_query($connect,$query4);
                            if($result4>0){
                                echo "<script>window.location.assign('cart.php?msg=Updated Successfully!!')</script>";
                            }
                            else{
                                echo "<script>window.location.assign('cart.php?msg=Error While Updating!!')</script>";
                            }
                        }
                        ?>
                    </td>
                    <td>&#8377;<?php echo $data['price']?></td>
                    <td>&#8377;<?php echo $data['total_price']?></td>
                    <td>
                        <a class="btn btn-danger" href="deletecart.php?id=<?php echo $data['id']?>">
                            <i class="bi bi-trash">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
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
    <br>
    <br>    
<div class="container" style=" border:1px solid grey;box-shadow: 10px 10px 5px grey;">
    <div class="row">
            <div class="col-md-4 col-md-offset-1 ">
            <strong><br>Price Details:</strong>
            <div class="row">
        <br><div class="col-md col-md-offset-1">
        <?php
        include("config.php");
        $query1="SELECT sum(total_price) as total from `cart` where `email`='$_SESSION[email]'";
        $result1=mysqli_query($connect,$query1);
        $data1=mysqli_fetch_array($result1);
        // print_r($data1['total']);
        $total=$data1['total'];
        ?>    
        MRP: &#8377; <?php echo $data1['total'];?> 
        <input name="MRP" type="hidden" value="<?php echo $data1['total'];?>" style="border:none;"></div>
        <?php
        ?>
        <div class="col-md col-md-offset-1">
            Delivery Fee:&#8377;100<br>
            Total Amount: &#8377;<?php echo $total+100?>
        </div>
    </div>
            </div>
            <div class="col-md-5 my-3 address_form">
                        <h4 class="my-3">Shipping Address</h4>
                        <?php
                        $query_user="SELECT * from `user` where `email`='$_SESSION[email]'";
                        include("config.php");
                        $result_user=mysqli_query($connect,$query_user);
                        $data_user=mysqli_fetch_array($result_user);
                        ?>
                        <form method="post" class="creditly-card-form shopf-sear-headinfo_form">
                            <div class="creditly-wrapper wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Name: </label>
											<input class="billing-address-name form-control" type="text" name="name" required="" value="<?php echo $data_user['name'];?>">
                                            <!-- <label class="control-label">Email: </label>
											<input class="billing-address-name form-control" type="text" name="email" placeholder="Product Id" value="<?php echo $email;?>"> -->
											
                                        </div>
                                            <div class="card_number_grid_right my-3">
                                                <div class="controls">
                                                    <label class="control-label">Address: </label>
                                                    <input class="form-control" type="text" required="" name="address" value="<?php echo $data_user['address']?>">
                                                </div>
                                            </div>
                                            <div class="card_number_grid_right my-3">
                                                <div class="controls">
                                                    <label class="control-label">Contact: </label>
                                                    <input class="form-control" type="text" required="" name="contact" value="<?php echo $data_user['contact']?>">
                                                    <input class="form-control" name="total" type="hidden" value="<?php echo $total?>">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Address type: </label>
                                            <select class="form-control option-fieldf" required>
                                            <option value="" selected disabled>Select One</option>
                                                <option>Office</option>
                                                <option>Home</option>
                                                <option>Commercial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    if($total>0 || $total!=""){
                                    ?>
                                    <button class="btn formbtn1 btn-primary my-3" name="order_btn">Place Order</button>
                                    <?php }?>
                                </div>
                            </div>
                        </form>
                    </div>
    </div>
    <?php
    if(isset($_REQUEST['order_btn'])){
        $name=$_REQUEST['name'];
        $address=$_REQUEST['address'];
        $contact=$_REQUEST['contact'];
        $order_no="OD".rand();
        $user_email=$_SESSION['email'];
        $order_date=date("d-m-y");
        $totalprice=$_REQUEST['total']+100;
         $order_query="INSERT into `order`(`name`, `email`, `address`, `contact`, `orderno`, `totalprice`, `orderdate`)VALUES('$name','$user_email','$address','$contact','$order_no','$totalprice','$order_date')";
        include("config.php");
        $order_result=mysqli_query($connect,$order_query);
        if($order_result>0){
            include("config.php");
                $querycart="SELECT * from `cart` where `email`='$_SESSION[email]'";
                $resultcart=mysqli_query($connect,$querycart);
                $sno=1;
                while($datacart=mysqli_fetch_array($resultcart)){
                    $query_details="INSERT into `orderdetails`(`productname`, `quantity`, `price`, `orderno`) VALUES ('$datacart[productname]','$datacart[quantity]','$datacart[price]','$order_no')";
                    $result_details=mysqli_query($connect,$query_details);
                    if($result_details>0){
                        $qeury_delete="DELETE from `cart` where `id`='$datacart[id]'";
                        $result_delete=mysqli_query($connect,$qeury_delete);
                        if($result_delete>0){
                            echo "<script>window.location.assign('userorder.php?msg=Order Successfull with order number $order_no and total amount is $total')</script>";
                        }
                        else{
                            echo "<script>window.location.assign('cart.php?msg=There was some error while ordering please try again later!!')</script>";
                        }
                    }
                }
        }

    }
    ?>

           
    <!-- <div class="row">
        <div class="col-md col-md-offset-9">
        <a class="btn btn-danger" type="button" href="checkout.php" >Checkout</a>
        </div>
    </div><br> -->
</div>
<div class="text-center">
<br><a class="btn btn-danger text-right" href="userproduct.php" role="button">Continue Shopping</a></div>


<?php
include('footer.php');
?>