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