<?php include 'layouts/header.php'; ?>



    <?php
      $page = new Page;
      if(isset($_GET['id'])){   ?>
        <br><br>

        <div class="">
        <div class="row">
<?php
      $id = $_GET['id'];
        $single = $page->single_product($id);
        if($single->num_rows>0)
        {
          while ($each = $single->fetch_assoc()) {
    ?>
      <div class="col-md-4">
          <img src="./assets/images/uploads/<?php echo $each['thumbnail']; ?>" alt="" class="img-thumbnail">
      </div>
      <div class="col-md-4">
        <h2><?php echo $each['code']; ?> <?php echo $each['description']; ?></h2>
        <table class="table table-responsive">

          <tr>
            <td>code</td>
            <td><?php echo $each['code']; ?></td>
          </tr>
          <tr>
            <td>price</td>
            <td>$ <?php echo $each['price']; ?> USD</td>
          </tr>
          <tr>
            <td>Color</td>
            <td>Not Avaliable</td>
          </tr>
          <tr>
            <td>Quantity</td>
            <td style="display:inline-block;"><button type="button" name="button" onclick="minus()">-</button>
                <input type="text" name="" value="1" id="quantity" style="width:50%;">
                <button type="button" name="button" onclick="plus()">+</button>
                <script type="text/javascript">
                  function minus(){
                    var a = document.getElementById('quantity').value;
                    if(a<=1){
                          document.getElementById('quantity').value=1;
                    }
                    else{
                      document.getElementById('quantity').value=--a;
                    }
                  }
                  function plus(){
                    var a = document.getElementById('quantity').value;
                    document.getElementById('quantity').value=++a;
                  }
                </script>
           </td>
          </tr>
          <tr>
            <td>price</td>
            <td>$ <?php echo $each['price']; ?> USD</td>
          </tr>

        </table>
        <p></p>
        <hr>
              Shiping: Free Shiping To Your Location
                       Estimated Delevery Time 11-13 days
        <hr>
        <button type="button" name="button" class="btn btn-info">Add To Cart</button>
        <button type="button" name="button" class="btn btn-danger">Buy Now</button>
      </div>
      <div class="col-md-4">
        <h2>Your Shopping Cart</h2>
        <p>You have no items in your shopping cart.</p>

        <p>Click here to continue shopping.</p>

        <p>We will send this product to you base on your selection. Read more...</p>

        <p>Call us now for more info about our products. Find out more...</p>

        <p>Return purchased items and get all your money back...
        </p>

      </div>


    <?php   } }?>


  </div>
</div>

<?php } else{
  include '404.php';
} ?>







<?php include 'layouts/footer.php'; ?>
