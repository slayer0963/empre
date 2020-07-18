<!doctype html>
<?php include 'blocks/header.php'; ?>


<?php include 'blocks/menu.php'; ?>
<body class="landing-page">
    
    

		<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../store/assets/img/examples/ecommerce-tips2.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-1">
					<div class="brand">
						<h1 class="title" id="titlebusi"></h1>
						<h4 id="description"></h4>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="main main-raised" style="margin-top: -35rem;">
  

        <div class="section">
            <div class="container " id="productsge">
				<h2 class="section-title">Find what you need</h2>
				<div class="row">
					<div class="col-md-3 ">
						
					</div>

					<div class="col-md-9 ">
	   					<div class="row" id="productstore">
	   						 

	   						
	   						
	   						 
	   						  </div>
	   						  <div class="col-md-3 col-md-offset-4">
	   							   <button rel="tooltip" class="btn btn-rose btn-round">Load more...</button>
	   						  </div>
	   					</div>


	   				</div>
				</div>



				
			</div>
        </div><!-- section -->

	</div> <!-- end-main-raised -->

    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="http://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                           About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                           Blog
                        </a>
                    </li>
                    <li>
                        <a href="http://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
            </div>
        </div>
    </footer>

</body>
  
<?php include 'blocks/footer.php'; ?>

   <script type="text/javascript" src="./js/busi.js"></script>
      <!-- <script type="text/javascript" src="view/jsproject/facebook.js"></script>
        <script type="text/javascript" src="view/jsproject/google.js"></script> -->
        <script type="text/javascript" src="./js/local.js"></script>

    <script>
        $(document).ready(function(){

            //$('.collapse').collapse();


             var obj = JSON.parse(localStorage.getItem('Store'));
             //alert(obj.name);
             $("#namebusi").html("<strong>"+obj.name+"</strong>");
             $("#title").html(obj.name);
             $("#titlebusi").html(obj.name);
             $("#description").html(obj.des);
          });
      </script>