<?php
include("header.php");
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
                            <li class="breadcrumb-item active" aria-current="page">Jewellery Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
<?php
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$query="SELECT * from `product` where `id`=$id";
			// echo $query;
			include("config.php");
            $result=mysqli_query($connect,$query);
			$data=mysqli_fetch_array($result);
		}
		?>	
		 <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Jewellery
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/<?php echo $data['image']?>" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
					  <?php echo $data['productname']?>
                      </h6>
                    </div>
                    <p>
					<?php echo $data['description']?><br>
                      Price: &#8377;<?php echo $data['price']?>/-<br>
					  Type: <?php echo $data['category_name']?>
                    </p>
					<form method='post'>
						<input name='productname' value="<?php echo $data['productname']?>" type="hidden">
						
						<input name="price"value="<?php echo $data['price']?>" type="hidden" >
						<div class="snipcart-details item_add single-item hvr-outline-out button2">
						<input type="submit" name="submit" value="Add to cart" class="btn btn-primary">
					</div>	
					</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      
        </div>
      </div>
    </div>
  </section>


	
		<!--php-->
		<?php
		if(isset($_POST['submit'])){
			if(!isset($_SESSION['email'])){
				echo "<script>window.location.assign('userlogin.php?msg=Please login')</script>"; 
			}
			$productname=$_POST['productname'];
			$quantity=1;
			$price=$_POST['price'];
			$total=$price*$quantity;
			$email=$_SESSION['email'];
			include("config.php");
			$q1="SELECT * from `cart` where `email`='$email' and `productname`='$productname'";
			$r1=mysqli_query($connect,$q1);
			if(mysqli_num_rows($r1)<=0){
				$query4="INSERT into `cart`(`productname`,`quantity`,`price`,`total_price`,`email`)VALUES('$productname','$quantity','$price','$total','$email')";
				$result4=mysqli_query($connect,$query4);
				if($result4>0){
					echo "<script>window.location.assign('cart.php?msg=Product Added To cart!!!')</script>";
				}
				else{
					echo "<script>window.location.assign('cart.php?msg=Error while uploading')</script>";
				}
			}else{
				$d1=mysqli_fetch_array($r1);
				$quan=$d1['quantity']+$quantity;
				$total=$price*$quan;
				$q2="UPDATE `cart`  set `quantity`='$quan', `total_price`='$total' where `id`='$d1[id]'";
				$r4=mysqli_query($connect,$q2);
				if($r4>0){
					echo "<script>window.location.assign('cart.php?msg=Updated Successfully!!!')</script>";
				}
				else{
					echo "<script>window.location.assign('cart.php?msg=Error while uploading')</script>";
				}
			}
		}
		?>
		<!--php-->
			
 </div>
<!--//single_page-->

<?php
include("footer.php");
?>
