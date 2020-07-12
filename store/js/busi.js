
$(document).ready(function($) {
      var obj = JSON.parse(localStorage.getItem('Store'));
      mybusii(obj.id);
      //alert(obj.id);
});







function mybusii(id) {
		var dataString = 'id='+id;
		
	     $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetpro=getDatac", 
            data: dataString,
            success: function(resp) {
            	var respu = eval(resp);
            	var html='';
            	 
            	for (var i = 0; i < respu.length; i++) {
            		

                  // html+='<div class="col-md-4">';
                  //       html+='<div class="card card-product card-plain" data-colored-shadow="false">';
                  //            html+='<a href="#!" data-toggle="modal" data-target="#details"  onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')">';
                  //            html+='<div class="card-image">';
                              
                  //             html+='<img src="../view/imgdetails/'+respu[i].img+'" />';
                             
                  //             html+='</div>';
                  //              html+='</a>';
                  //             html+='<div class="card-content">';
                  //             html+='<a href="#!" data-toggle="modal" data-target="#details" onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')">';
                  //             html+='<h4 class="card-title">'+respu[i].name_pro+'</h4>';
                  //             html+='</a>';
                  //             html+='<div class="footer">';
                  //             if(respu[i].discount!="" || parseFloat(respu[i].sal_price)!=0){
                  //                   html+='<div class="price-container">';
                  //                   html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                  //                   html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                  //                   html+='</div>';  
                  //             }
                  //             else{
                  //                   html+='<div class="price-container">';
                  //                   html+='<span class="price"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                  //                   html+='</div>'; 
                  //             }
                              
                              
                  //             html+='<button class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="Añadir a mi lista de deseos" data-placement="left">';
                  //             html+='<i class="material-icons">favorite_border</i>';
                  //             html+='</button>';
                  //             html+='</div>';
                  //             html+='</div>';
                  //             html+='</div>';
                  //             html+='</div>';





                              html+='<div class="col-md-4">';
                              html+='<div class="card card-product">';
                              html+='<a href="#!" data-toggle="modal" data-target="#details"  onclick="viewproduct('+respu[i].id_pro+','+String("'"+respu[i].name_pro+"'")+','+String("'"+respu[i].img+"'")+','+String("'"+respu[i].descr_pro+"'")+')">';
                              html+='<div class="card-image">';
                  
                              html+='<img class="img" src="../view/imgdetails/'+respu[i].img+'" style="height:175px;" />';
                      
                              html+='</div>';
                              html+='</a>';
                              html+='<div class="card-content">';
                              html+='<h6 class="category text-rose">Trending</h6>';
                              html+=' <h4 class="card-title">';
                              html+='<a href="#pablo">'+respu[i].name_pro+'</a>';
                              html+='</h4>';
                           
                              html+='<div class="footer">';
                              
                               if(respu[i].discount!="" || parseFloat(respu[i].sal_price)!=0){
                                    html+='<div class="price">';
                                    html+='<span class="price price-old"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                    html+='<span class="price price-new"> &#36;'+((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))-((parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice))*parseFloat(respu[i].discount))).toFixed(2)+'</span>';
                                    html+='</div>';  
                              }
                              else{
                                    html+='<div class="price">';
                                    html+='<span class="price"> &#36;'+(parseFloat(respu[i].sal_price)+parseFloat(respu[i].extraprice)).toFixed(2)+'</span>';
                                    html+='</div>'; 
                              }
                              html+='</div>';
                              html+='<div class="stats text-right">';
                              html+='<button type="button" rel="tooltip" title="Agregar a mi lista" class="btn btn-just-icon btn-simple btn-default">';
                              html+='<i class="material-icons">favorite</i>';
                              html+='</button>';
                              html+='<button type="button" rel="tooltip" title="Comprar" class="btn btn-just-icon btn-simple btn-default">';
                              html+='<i class="material-icons">shopping_cart</i>';
                              html+='</button>';
                              html+='</div>';
                              html+='</div>';
                              html+='</div>';
                              html+='</div>';
                              html+='</div>';
            	}
            	if(respu.length==0){
            		alert("nada");
            	}
            	//alert(html);
            	$("#productstore").html(html);
                  // alert(html);
            	//$("#idbusinp").val(id);
            	
            	
            }
            });
}


function viewproduct(id,name,img,desc){
      //$("#namepromo").html(name);
     
      var obj = new Object();
           obj.id = id;
           obj.name  = name;
           obj.img  = img;
           obj.desc  = desc;
           var jsonString= JSON.stringify(obj);
            location.href="store/";
            localStorage.setItem('ProductC',jsonString);
      
      location.href="./productdetails";
}