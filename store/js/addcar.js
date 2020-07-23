$(document).ready(function() {

	consultcar(localStorage.getItem('client'));
	consultwish(localStorage.getItem('client'));
	$("#addcar").click(function () {
        
        if(localStorage.getItem('nameper')==""){
            
            $('#loginm').modal('open');
         }else{
        
	        $.ajax({
	            type: "POST",
	            url: "../controller/cuserhome.php?btnsetshcar=setshcar", 
	            data: $("#frmcarpro").serialize(),
	            success: function(resp) {
	            	if(resp==1){
	            		M.toast({html: 'Producto agregado', classes: 'rounded green'});
 						consultcar(localStorage.getItem('client'));
	            		//getDataProductD($("#pfidprod").val(),$("#pfcolor").val(),$("#pfmaterial").val(),$("#pfsize").val());
	            	}
	            	else if(resp ==3){
	            		M.toast({html: 'El producto ya esta en el carrito !', classes: 'rounded orange'});
 						
	            	}
	            	else{
	            		alert("Problemas");
	            	}

	            }
	        });
	    }
     });
	$("#addwish").click(function () {
        
        if(localStorage.getItem('nameper')==""){
            
            $('#loginm').modal('open');
         }else{
        
	        $.ajax({
	            type: "POST",
	            url: "../controller/cuserhome.php?btnsetwish=setwish", 
	            data: $("#frmcarpro").serialize(),
	            success: function(resp) {
	            	// alert(resp);
	            	if(resp==1){
	            		M.toast({html: 'Producto agregado', classes: 'rounded green'});
 						consultwish(localStorage.getItem('client'));
	            		//getDataProductD($("#pfidprod").val(),$("#pfcolor").val(),$("#pfmaterial").val(),$("#pfsize").val());
	            	}
	            	else if(resp ==3){
	            		M.toast({html: 'El producto ya esta en la lista de deseos !', classes: 'rounded orange'});
 						
	            	}
	            	else{
	            		alert("Problemas");
	            	}

	            }
	        });
	    }
     });
});


function consultcar(id){
	var dataString = 'id='+id;
   
    $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetcart=getcart", 
            data: dataString,
            success: function(resp) {
                // alert(resp);
                var respu = eval(resp);
                var html='';
                var cont=0, total=0;
                for (var i = 0; i < respu.length; i++) {
                	cont++;
                	    html+='<li class="collection-item"><div class="row"><div class="col s12 m12 l4 center-align">';
					      html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:100px; width:100;" ></div>';
					      html+='<div class="col s12 m12 l4 center-align"><h5>'+respu[i].name_pro+'</h5>';
					      html+='<p>';
					      html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_color;
                          html+='</div>';
                          html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_mat;
                          html+='</div>';
					       html+='<div class="chip chips-initial" >';
                            html+=respu[i].number_size+'-'+respu[i].name_size;
                          html+='</div><br>';
					         html+='<span class="price-new">$'+respu[i].precio+'</span>';
					      html+='</p></div>';
					      html+='<div class="col s12 m12 l4 center-align"><a href="#!" style="margin-top:2rem;" class="btn red"><i class="material-icons">delete</i></a></div></div>';
					    html+='</li> ';
					    total+=parseFloat(respu[i].precio);
                }
                
                $("#cartcli").html(html);
                $(".numbercar").html(cont);
                $("#totalshop").html("Total: $"+total);
            }
        });
}

function consultwish(id){
	var dataString = 'id='+id;
   
    $.ajax({
            type: "POST",
            url: "../controller/cuserhome.php?btngetwish=getwish", 
            data: dataString,
            success: function(resp) {
                // alert(resp);
                var respu = eval(resp);
                var html='';
                var cont=0, total=0,totdes=0, decuento=0;
                for (var i = 0; i < respu.length; i++) {
                	totdes=parseFloat(respu[i].sal_price)-(parseFloat(respu[i].sal_price)*parseFloat(respu[i].discount));
                	decuento=(parseFloat(respu[i].discount)*100);
                	cont++;
                	    html+='<li class="collection-item"><div class="row"><div class="col s12 m12 l4 center-align">';
					      html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:100px; width:100;" ></div>';
					      html+='<div class="col s12 m12 l4 center-align"><h5>'+respu[i].name_pro+'</h5>';
					      html+='<p>';
					      html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_color;
                          html+='</div>';
                          html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_mat;
                          html+='</div>';
					       html+='<div class="chip chips-initial" >';
                            html+=respu[i].number_size+'-'+respu[i].name_size;
                          html+='</div><br>';
                          	 html+='<span class="price-old">$'+respu[i].sal_price+'</span>&nbsp;&nbsp;';
					         html+='<span class="price-new">$'+totdes+'</span><br><span class="price-new">'+decuento+'%</span>';
					      html+='</p></div>';
					      html+='<div class="col s12 m12 l4 center-align"><a href="#!" style="margin-top:2rem;" class="btn green"><i class="material-icons">add_shopping_cart</i></a>&nbsp;<a href="#!" style="margin-top:2rem;" class="btn red"><i class="material-icons">delete</i></a></div></div>';
					    html+='</li> ';
					    total+=parseFloat(totdes);
                }
                
                $("#wishcli").html(html);
                //$(".numbercar").html(cont);
                $("#totalwish").html("Total: $"+total);
            }
        });
}