$(document).ready(function(){
business();

});


var business = () =>{
  var html='';
  var htmlcarru='';

          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHome",
            success: function(resp) {
            var values = eval(resp);        
             // alert(resp);
             for (var i = 0; i < values.length; i++) {
                

            

                html+='<div class="col-md-3">';
                                html+='<div class="card card-profile" >';
                                 html+='<a href="#!" onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+','+String("'"+values[i].description+"'")+')">';
                                    html+='<div class="card-image">';
                                       
                                            html+='<img class="img" style="height:150px;" style=""  src="view/imgbusiness/'+values[i].pic_logo_bus+'">';
                                        
                                    html+='<div class="colored-shadow" style=" background-image: url(&quot;view/imgbusiness/'+values[i].pic_logo_bus+'&quot;); opacity: 1;"></div><div class="ripple-container"></div></div></a>';
                                    html+='<div class="card-content">';
                                        html+='<h4 class="card-title">'+values[i].name_bus+'</h4>';
                                        html+='<h6 class="category text-gray">'+values[i].description+'</h6>';
                                        html+='<div class="footer">';
                                            html+='<a href="#pablo" class="btn btn-simple btn-twitter "><i class="fa fa-instagram"></i></a>';
                                            html+='<a href="#pablo" class="btn btn-simple btn-facebook "><i class="fa fa-facebook-square"></i></a>';
                                            
                                        html+='</div>';
                                    html+='</div>';
                                html+='</div>';
                            html+='</div>';


              

                    
             }
            

             $("#business").html(html);
             $("#carru").html(htmlcarru);
             // $("#carru").set(4);
            } 
        }); 
      
}

function viewstore(id,nombre, description){
    var obj = new Object();
     obj.id = id;
     obj.name  = nombre;
     obj.des  = description;
     var jsonString= JSON.stringify(obj);
      location.href="store/";
      localStorage.setItem('Store',jsonString);
}