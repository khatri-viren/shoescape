<?php
  require_once('src/components/header.php');
  // $products = db_select('products', ' 1 ORDER BY id DESC LIMIT 8');
  $products = fetch_products(null, 'g.gst_id DESC' ,' LIMIT 8 ');

  // fake_products_generator();
  // die("done!");
?>

<!-- Hero slider-->
      <section class="tns-carousel tns-controls-lg">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}} }">
          <!-- Item-->  
          <div class="w100">
            <div class="d-lg-flex justify-content-between align-items-center">
              <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0 " src="img/home/10.jpg" alt="Men Accessories">
          
            </div>
          </div>
          <!-- Item-->
          <div class="w100">
            <div class="d-lg-flex justify-content-between align-items-center">
              <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0 " src="img/home/11.jpg" alt="Men Accessories">
           
            </div>
          </div>
          <!-- Item-->
          <div class="w100">
            <div class="d-lg-flex justify-content-between align-items-center">
              <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0 " src="img/home/12.jpg" alt="Men Accessories">
        
            </div>
          </div>
        </div>
      </section>
      <section class="container pt-md-3 pb-5 mb-md-3 mt-3">
        <h2 class="h3 text-center">Trending products</h2>
        <div class="row pt-4 mx-n2">
          <!-- Product-->
          <?php foreach ($products as $key => $value) { ?>
          <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
              <a class="card-img-top d-block overflow-hidden" href="product.php?id=<?= $value['gst_id'] ?>"><img src="<?= get_image_thumb($value['image']) ?>" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?= $value['b_name'] ?></a>
                <h3 class="product-title fs-sm"><a href="product.php?id=<?= $value['gst_id'] ?>"><?= $value['product_name'] ?></a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">$<?= $value['price'] ?></span></div>
                  
                </div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>
          <?php } ?>
         
        </div>
        <div class="text-center pt-3"><a class="btn btn-outline-accent" href="shop-grid-ls.html">More products<i class="ci-arrow-right ms-1"></i></a></div>
      </section>
      <!-- Banners-->
      <section class="container pb-4 mb-md-3">
        <div class="row">
          <div class="col-md-8 mb-4">
            <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden rounded-3">
              <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                <h4 class="fs-lg fw-light mb-2">Hurry up! Limited time offer</h4>
                <h3 class="mb-4">Converse All Star on Sale</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
              </div><img class="d-block ms-auto" src="img/shop/catalog/banner.jpg" alt="Shop Converse">
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-flex flex-column h-100 justify-content-center bg-size-cover bg-position-center rounded-3" style="background-image: url(img/blog/banner-bg.jpg);">
              <div class="py-4 my-2 px-4 text-center">
                <div class="py-1">
                  <h5 class="mb-2">Your Add Banner Here</h5>
                  <p class="fs-sm text-muted">Hurry up to reserve your spot</p><a class="btn btn-primary btn-shadow btn-sm" href="#">Contact us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Featured category (Hoodie)-->
      <section class="container mb-4 pb-3 pb-sm-0 mb-sm-5">
        <div class="row">
      <!-- Blog + Instagram info cards-->
      <section class="container-fluid px-0">
        <div class="row g-0">
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary" href="blog-list-sidebar.html">
              <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h5 mb-1">Read the blog</h3>
                <p class="text-muted fs-sm">Latest store, fashion news and trends</p>
              </div></a></div>
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
              <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
                <h3 class="h5 mb-1">Follow on Instagram</h3>
                <p class="text-muted fs-sm">#ShopWithCartzilla</p>
              </div></a></div>
        </div>
      </section>

<?php
  require_once('src/components/footer.php');
?>

    