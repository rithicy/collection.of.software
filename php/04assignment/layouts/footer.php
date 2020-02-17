</div>


<footer class="footer-area jumbotron mb-0 mt-5"  >
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">About Us</h6>
						<p>Welcome to the fashion website.



						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Category</h6>

		          <ul class="navbar-nav">
		            <li class="nav-item">
		              <a class="nav-link" href="category.php?type=1">Men</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="category.php?type=2">Woman</a>
		            </li>
		          </ul>



					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6">
					<div>
						<h6 class="footer_title">Follow Us</h6>

						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="http://fb.com">Facebook</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="http://youtube.com">Youtube</a>
							</li>
						</ul>

					</div>
				</div>
			</div>
      <hr>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |

				</p>
			</div>
		</div>
	</footer>
  <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".list-section>li>a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
</body>
</html>
