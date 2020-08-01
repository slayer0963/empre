<!doctype html>

<?php include 'blocks/header.php'; ?>

<?php include 'blocks/menu.php'; ?>
<body class="product-page">
	
	<div class="page-header header-filter" data-parallax="true" filter-color="black" style="background-image: url('assets/img/bg6.jpg');">

	</div>

	

	<div class="section section-gray" style="margin-top: -5rem;">
	    <div class="container">
            <div class="main main-raised main-product">
          
                <div class="row">
                    <div class="col-md-6 col-sm-6">

                       <div class="tab-content" id="carru">
                           
                        </div>
                        <ul class="nav flexi-nav" role="tablist" id="flexiselDemo1">
							
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6">
						<h2 class="title" id="producttittle"> </h2>
						<div class="row">
							<div class="col-md-2 col-sm-6"><h3 class="main-price"  id="priceprosindes" style="text-decoration:line-through; color: gray;"></h3></div>
							<div class="col-md-2 col-sm-6"><h3 class="main-price" style="color: green;" id="pricepro"></h3></div>
						</div>
						
					<div class="row">
						<div class="col-md-12">
							<label>Selecionar materiales</label>
							<div id="contmat">
								<!-- <a href="#"><span class="badge badge-pill badge-secondary">Default</span></a>	 -->
							</div>
						</div>
						<div class="col-md-12">
							<label>Selecionar tamaño</label>
							<div id="contsize">
								<!-- <a href="#"><span class="badge badge-pill badge-secondary">Default</span></a>	 -->
							</div>
						</div>
						<div class="col-md-12">
							<div id="acordeon">
                            <div class="panel-group" id="accordion">
                          <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                    Descripci&oacute;n
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="panel-body">
                                <p>Cantidad: <span id="quantity"></span></p>
                                <p>Detalles: <span id="pdet"></span></p>
                              </div>
                            </div>
                          </div>
						</div>
					</div>
					<form method="POST" id="frmcarpro" name="frmcarpro" class="hide">
						<input type="text" id="idcliet" name="idcliet" value="<?php echo $valor = isset($_SESSION["idus"])?$_SESSION["idus"]:'';?>">
						<input type="text" id="pfidprod" name="pfidprod">
						<input type="text" id="pfidprices" name="pfidprices">
						<input type="text" id="pfcolor" name="pfcolor">
						<input type="text" id="pfmaterial" name="pfmaterial">
						<input type="text" id="pfsize" name="pfsize">
						<input type="text" id="pfprices" name="pfprices">
						<input type="text" id="discount" name="discount">
					</form>
                        <div class="row text-center">
                            <button class="btn btn-rose btn-round" id="addcar">Agregar a Carrito &nbsp;<i class="material-icons">shopping_cart</i></button>
                        </div>
						
					
                              
                    </div>
                  
                </div>
            </div>

              <div class="col-md-12">
                    	  

		        				<div class="media media-post" id="">
		                              <a class="pull-left author"  data-toggle="tooltip" data-placement="top" title="" data-container="body" data-original-title="<?php  echo (isset($_SESSION['name'])) ? $_SESSION['name'] : 'Inicar sesion'; ?>" aria-describedby="tooltip3467" href="#pablo">
		                                  <div class="avatar">
		                                  	<input type="hidden" id="idclient" value=" <?php echo $_SESSION["idus"]; ?> ">
		                                  	<?php  echo (isset($_SESSION['name'])) ? '<img alt="Circle Image" class="img-circle img-responsive"  src="../view/imguser/'.$_SESSION['img'].'" style="height:100%;">' : '<img class="media-object" alt="64x64" src="assets/img/placeholder.jpg">'; ?>
		                                        
		                                  </div>
		                              </a>
		                              <div class="media-body">
		                                    <div class="form-group is-empty"><textarea class="form-control" id="comentproduc" placeholder="Comentar" rows="6"></textarea><span class="material-input">VALORACIÓN<div class="rating" id="rate"></div></span>
		                                    	
		                                    </div>
		                                    <div class="media-footer">
		                                         <a id="publish" class="btn btn-primary btn-wd pull-right">Publicar</a>
		                                    </div>
		                              </div>
		                          </div>
		                          <!-- <div class="comentper" id="comentinput">
		                          	
		                          </div> -->
		                          <ul class="collection">
    <li class="collection-item avatar">
      <img src="images/yuna.jpg" alt="" class="circle">
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle">folder</i>
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle green">insert_chart</i>
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle red">play_arrow</i>
      <span class="title">Title</span>
      <p>First Line <br>
         Second Line
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
  </ul>
            
                    </div>
			<div class="section">
				
			</div>


 

			<div class="related-products">
				<h3 class="title text-center">You may also be interested in:</h3>

				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="card card-product">
							<div class="card-image">
								<a href="#pablo">
									<img class="img" src="assets/img/examples/card-product1.jpg" />
								</a>
							</div>

							<div class="card-content">
								<h6 class="category text-rose">Trending</h6>
								<h4 class="card-title">
									<a href="#pablo">Dolce & Gabbana</a>
								</h4>
								<div class="card-description">
									Dolce & Gabbana's 'Greta' tote has been crafted in Italy from hard-wearing red textured-leather.
								</div>
								<div class="footer">
	                                <div class="price">
										<h4>$1,459</h4>
									</div>
	                            	<div class="stats">
										<button type="button" rel="tooltip" title="Saved to Wishlist" class="btn btn-just-icon btn-simple btn-rose">
											<i class="material-icons">favorite</i>
										</button>
	                            	</div>
	                            </div>

							</div>

						</div>
					</div>

					<div class="col-sm-6 col-md-3">
						<div class="card card-product">
							<div class="card-image">
								<a href="#pablo">
									<img class="img" src="assets/img/examples/card-product3.jpg" />
								</a>
							</div>

							<div class="card-content">
								<h6 class="category text-muted">Popular</h6>
								<h4 class="card-title">
									<a href="#pablo">Balmain</a>
								</h4>
								<div class="card-description">
									Balmain's mid-rise skinny jeans are cut with stretch to ensure they retain their second-skin fit but move comfortably.
								</div>
								<div class="footer">
	                                <div class="price">
										<h4>$459</h4>
									</div>
	                            	<div class="stats">
										<button type="button" rel="tooltip" title="Save to Wishlist" class="btn btn-just-icon btn-simple btn-default">
											<i class="material-icons">favorite</i>
										</button>
	                            	</div>
	                            </div>

							</div>

						</div>
					</div>

					<div class="col-sm-6 col-md-3">
						<div class="card card-product">
							<div class="card-image">
								<a href="#pablo">
									<img class="img" src="assets/img/examples/card-product4.jpg" />
								</a>
							</div>

							<div class="card-content">
								<h6 class="category text-muted">Popular</h6>
								<h4 class="card-title">
									<a href="#pablo">Balenciaga</a>
								</h4>
								<div class="card-description">
									Balenciaga's black textured-leather wallet is finished with the label's iconic 'Giant' studs. This is where you can...
								</div>
								<div class="footer">
	                                <div class="price">
										<h4>$590</h4>
									</div>
	                            	<div class="stats">
										<button type="button" rel="tooltip" title="Saved to Wishlist" class="btn btn-just-icon btn-simple btn-rose">
											<i class="material-icons">favorite</i>
										</button>
	                            	</div>
	                            </div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3">
						<div class="card card-product">
							<div class="card-image">
								<a href="#pablo">
									<img class="img" src="assets/img/examples/card-product2.jpg" />
								</a>
							</div>

							<div class="card-content">
								<h6 class="category text-rose">Trending</h6>
								<h4 class="card-title">
									<a href="#pablo">Dolce & Gabbana</a>
								</h4>
								<div class="card-description">
									Dolce & Gabbana's 'Greta' tote has been crafted in Italy from hard-wearing red textured-leather.
								</div>
								<div class="footer">
	                                <div class="price">
										<h4>$1,459</h4>
									</div>
	                            	<div class="stats">
										<button type="button" rel="tooltip" title="Save to Wishlist" class="btn btn-just-icon btn-simple btn-default">
											<i class="material-icons">favorite</i>
										</button>
	                            	</div>
	                            </div>

							</div>

						</div>
					</div>

				</div>
			</div>
	    </div>
	</div>


<footer class="footer footer-black footer-big">
	<div class="container">

		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<h5>About Us</h5>
					<p>Creative Tim is a startup that creates design tools that make the web development process faster and easier. </p> <p>We love the web and care deeply for how users interact with a digital product. We power businesses and individuals to create better looking web projects around the world. </p>
				</div>

				<div class="col-md-4">
					<h5>Social Feed</h5>
					<div class="social-feed">
						<div class="feed-line">
							<i class="fa fa-twitter"></i>
							<p>How to handle ethical disagreements with your clients.</p>
						</div>
						<div class="feed-line">
							<i class="fa fa-twitter"></i>
							<p>The tangible benefits of designing at 1x pixel density.</p>
						</div>
						<div class="feed-line">
							<i class="fa fa-facebook-square"></i>
							<p>A collection of 25 stunning sites that you can use for inspiration.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<h5>Instagram Feed</h5>
					<div class="gallery-feed">
						<img src="../assets/img/faces/card-profile6-square.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/christian.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile4-square.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile1-square.jpg" class="img img-raised img-rounded" alt="" />

						<img src="../assets/img/faces/marc.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/kendall.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile5-square.jpg" class="img img-raised img-rounded" alt="" />
						<img src="../assets/img/faces/card-profile2-square.jpg" class="img img-raised img-rounded" alt="" />
					</div>

				</div>
			</div>
		</div>


		<hr />

		<ul class="pull-left">
			<li>
				<a href="#pablo">
				   Blog
				</a>
			</li>
			<li>
				<a href="#pablo">
					Presentation
				</a>
			</li>
			<li>
				<a href="#pablo">
				   Discover
				</a>
			</li>
			<li>
				<a href="#pablo">
					Payment
				</a>
			</li>
			<li>
				<a href="#pablo">
					Contact Us
				</a>
			</li>
		</ul>

		<div class="copyright pull-right">
			Copyright &copy; <script>document.write(new Date().getFullYear())</script> Creative Tim All Rights Reserved.
		</div>
	</div>
</footer>



<style>
    #container1 {
        margin-bottom: 120px;
        padding:20px;
        background-color:#f5f5f5;
    }

    .rating {
        margin-left: 30px;
    }

    div.skill {
        background: #5cb85c;
        border-radius: 3px;
        color: white;
        font-weight: bold;
        padding: 3px 4px;
        width: 100px;
    }

    .skillLine {
        display: inline-block;
        width: 100%;
        min-height: 90px;
        padding: 3px 4px;
    }

    .skillLineDefault {
        padding: 3px 4px;
    }
</style>

<?php include 'blocks/footer.php'; ?>

<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
	<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
	<script type="text/javascript" src="./js/details.js"></script>
	<script type="text/javascript" src="./js/addcar.js"></script>
	<script type="text/javascript" src="./js/local.js"></script>
	 





    <script type="text/javascript">


    $(document).ready(function() {
    	initializeRatings();
		$("#flexiselDemo1").flexisel({
			visibleItems: 4,
    		itemsToScroll: 1,
    		animationSpeed: 400,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 3
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

        var obj = JSON.parse(localStorage.getItem('Store'));
			 //alert(obj.name);
			 $("#namebusi").html("<strong>"+obj.name+"</strong>");
			 $("#title").html(obj.name);
    });



    

    function initializeRatings() {
        $('#rate').shieldRating({
            max: 5,
            step: 0.1,
            value: 0,
            markPreset: false
        });
       

    }
   </script>


</html>
