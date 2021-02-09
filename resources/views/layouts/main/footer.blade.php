
	        <!-- footer -->
			{{-- <div class="footer">
				<div class="row" style="margin-left: -2px; background: #f5f3f3;">
					<div class="col-lg-3 col-md-6 col-sm-12 ">
						<div>
							<h6>Get to Know Us</h6>
							<ul>
								<li>
									<a href="/main/about">About Us</a>
								</li>
								<li>
									<a href="/main/career">Career</a>
								</li>
								<li>
									<a href="/main/blog">Blog</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 ">
						<div>
							<h6>Spree Business</h6>
							<ul>
								<li>
									<a href="/main/partner">Sell on Spree</a>
								</li>
								<li>
									<a href="/main/vendors">Advertise With Us</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 ">
						<div>
							<h6>Customer Service</h6>
							<ul>
								<li>
									<a href="/main/contact">Contact Us </a>
								</li>
								<li>
									<a href="/main/contact">FAQ</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3  ">
						<h6>Social</h6>
						<div class="d-flex">
							<div style="width: 24px;">
								<i class="fa fa-instagram" aria-hidden="true"></i>
	
							</div>
							<div style="width: 24px;" class="ml-3">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</div>
	
						</div>
					</div>
	
				</div>
			</div>   --}}
	   <div class="copyRight">
            <p>
                Copyright © 2021 - {{ date("Y") }} Spree. All Rights Reserved.
            </p>
        </div>
    </main>
        <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="/main/js/popper.min"></script>
<script src="/assets/my.js"></script>
<script type="text/javascript" src="/main/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  
   <!-- ============================================================== -->

    
<script type="text/javascript">
	(function ($) { // Begin jQuery
		$(function () { // DOM ready
			// If a link has a dropdown, add sub menu toggle.
			$('nav ul li a:not(:only-child)').click(function (e) {
				$(this).siblings('.nav-dropdown').toggle();
				// Close one dropdown when selecting another
				$('.nav-dropdown').not($(this).siblings()).hide();
				e.stopPropagation();
			});
			// Clicking away from dropdown will remove the dropdown class
			$(').click(function () {
				$('.nav-dropdown').hide();
			});
			// Toggle open and close nav styles on click
			$('#nav-toggle').click(function () {
				$('nav ul').slideToggle();
			});
			// Hamburger to X toggle
			$('#nav-toggle').on('click', function () {
				this.classList.toggle('active');
			});
		}); // end DOM ready
	})(jQuery); // end jQuery
</script>