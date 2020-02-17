<?php include 'layouts/header.php'; ?>

<?php
   $page = new Page;
if(isset($_GET['name']) && isset($_GET['type']) ){      ?>

<?php     $archive = $page->archive_product($_GET['name'],$_GET['type']);
        if(isset($archive->num_rows)){
            $header_data = $page->get_archive_header($_GET['name'],$_GET['type']);
                if($header_data->num_rows==1){
                  while ($item = $header_data->fetch_assoc()) { ?>
                    <br>
                        <h2 class="text-center"><?php echo $item['main']; ?> | <?php echo $item['sub']; ?></h2>
                        <br>
              <?php    }
                }
          ?>


          <?php
          if($archive->num_rows>0){ ?>
                <div class="row text-center">
             <?php
                  while ($prod = $archive->fetch_assoc()) { ?>

                      <div class="col-md-2">
                        <a href="product.php?id=<?php echo $prod['product_id']; ?>" class="home-block">
                          <img src="./assets/images/uploads/<?php echo $prod['thumbnail']; ?>" alt="" style="width:60%;">
                        <p><?php echo $prod['code']; ?></p>
                         <p>$ <?php echo $prod['price']; ?> USD</p>
                        </a>
                      </div>



        <?php          } ?>

          </div> <?php
          }
        }

      else{
        ?>
            <div class="row">
              <div class="col mt-6">
                <br><br>
                <center>
                  <h2>Product Not Found</h2>
                  <a href="index.php" class="btn btn-info">Back to Home page</a>
                </center>
              </div>

            </div>

        <?php
      }

?>
<?php }else {   include '404.php'; } ?>

<?php include 'layouts/footer.php'; ?>
