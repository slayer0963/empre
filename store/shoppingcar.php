<!doctype html>

<?php include 'blocks/header.php'; ?>

<?php include 'blocks/menu.php'; ?>
<style>
	#namebusi{
		color:black;
	}
</style>
<body class="">

	<div class="container" style="margin-top: 150px;">
		<div class="row">
		                    <div class="col-md-12">
		               
		                        <table id="tbdetails" class="table table-striped table-bordered table-hover text-center"  cellspacing="0" width="100%">
		                            <thead>
		                                <tr>
		                                    <th class="text-center"></th>
		                                    <th>Product</th>
		                                    <th class="th-description">Color</th>
		                                    <th class="th-description">Size</th>
		                                    <th class="text-right">Price</th>
		                                    <th class="text-right">Cantidad</th>
		                                    <th class="text-right">Amount</th>
		                                    <th></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr>
		                                    <td>
		                                        <div class="img-container">
		                                            <img src="assets/img/product1.jpg" alt="...">
		                                        </div>
		                                    </td>
		                                    <td class="td-name">
		                                        <a href="#jacket">Spring Jacket</a>
		                                        <br><small>by Dolce&amp;Gabbana</small>
		                                    </td>
		                                    <td>
		                                        Red
		                                    </td>
		                                    <td>
		                                        M
		                                    </td>
		                                    <td class="td-number">
		                                        <small>€</small>549
		                                    </td>
		                                    <td class="td-number">
		                                        1
		                                        <div class="btn-group">
		                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </button>
		                                            <button class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </button>
		                                        </div>
		                                    </td>
		                                    <td class="td-number">
		                                        <small>€</small>549
		                                    </td>
		                                    <td class="td-actions">
		                                        <button type="button" rel="tooltip" data-placement="left" title="" class="btn btn-simple" data-original-title="Remove item">
		                                            <i class="material-icons">close</i>
		                                        </button>
		                                    </td>
		                                </tr>

		                            </tbody>
		                            <tfoot>
                            <tr>
                             <th class="text-center"></th>
		                                    <th>Product</th>
		                                    <th class="th-description">Color</th>
		                                    <th class="th-description">Size</th>
		                                    <th class="text-right">Price</th>
		                                    <th class="text-right">Cantidad</th>
		                                    <th class="text-right">Amount</th>
		                                    <th></th>
                            </tr>

                            </tfoot>
		                        </table>

		                            
		                    </div>
		                </div>
	</div>

	</div>





<?php include 'blocks/footer.php'; ?>

<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
	<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
	<script type="text/javascript" src="./js/details.js"></script>
	<script type="text/javascript" src="./js/local.js"></script>
	 





    <script type="text/javascript">


    $(document).ready(function() {
    	
		$('#tbdetails').DataTable({"responsive":true});

        var obj = JSON.parse(localStorage.getItem('Store'));
			 //alert(obj.name);
			 $("#namebusi").html("<strong>"+obj.name+"</strong>");
			 $("#title").html(obj.name);
    });



    

 
   </script>


</html>