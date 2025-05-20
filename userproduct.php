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
                            <li class="breadcrumb-item active" aria-current="page">Jewellery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_GET['name'])){
    $category_name=$_GET['name'];
    $query="Select * from `product` where `category_name`='$category_name'";
   
}
else{
    include("config.php");
    $query="Select * from `product`";
}
include("config.php");
$result1=mysqli_query($connect,$query);

?>
 <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <p>Our latest releases,just for you!</p>
      </div>
      <div class="row">
      <?php
        
        while($data=mysqli_fetch_array($result1)){
       ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="single.php?id=<?php echo $data['id'] ?>">
              <div class="img-box">
                <img src="images/<?php echo $data['image']?>" alt="">
              </div>
              <div class="detail-box">
                <h6>
                <?php echo $data['productname']?>
                </h6>
                <h6>
                  Price
                  <span>
                  &#8377; <?php echo $data['price']?>
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  <?php echo $data['category_name']?>
                </span>
              </div>
            </a>
          </div>
        </div>
        <?php
         }
         ?>
      </div>
      
    </div>
  </section>


<?php
include("footer.php");
?>