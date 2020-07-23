$(document).ready(function() {

    consultcar(localStorage.getItem('client'));
    
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
                	    html+='<li class="collection-item"><div class="row"><div class="col s12 m12 l1 center-align"><a href="#!" style="margin-top:2rem;" class="btn red"><i class="material-icons">remove_shopping_cart</i></a></div> <div class="col s12 m12 l2 center-align">';
					      html+='<img src="../view/imgdetails/'+respu[i].img+'" style="height:100px; width:100;" ></div>';
					      html+='<div class="col s12 m12 l3 center-align"><h5>'+respu[i].name_pro+'</h5>';
					      
					      html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_color;
                          html+='</div>';
                          html+='<div class="chip chips-initial" >';
                            html+=respu[i].name_mat;
                          html+='</div>';
					       html+='<div class="chip chips-initial" >';
                            html+=respu[i].number_size+'-'+respu[i].name_size;
                          html+='</div>';
					       
					      html+='</div><div class="col s12 m12 l5 center-align stockec"><b>Stock: </b><i>'+ respu[i].tquantity+'</i><br><a href="javascript:void(0)" title="Incrementar" class="green waves-effect waves-green btn-flat" style="color:white"><i class="tiny material-icons">exposure_plus_1</i> </a> <label id="cantidad'+i+'">1</label>   <a href="javascript:void(0)" title="Descontar" class="red waves-effect waves-red btn-flat" style="color:white"><i class="tiny material-icons">exposure_neg_1</i></a></div>';
					      html+='<div class="col s12 m12 l1 center-align">Precio <label class="price-new center-align">$'+respu[i].precio+'</label></div></div>';
					    html+='</li> ';
					    total+=parseFloat(respu[i].precio);
                }
                
                $("#cartcli").html(html);
                $(".numbercar").html(cont);
                $("#totalshop").html("Total: $"+total);
            }
        });
}