$(document).ready(function(){
categories();
business();
producttype();
  $(".buscadorbusis").keyup(function(event) {
    if($(".buscadorbusis").val().length>0){
      $("#contentpage").addClass('hide');
    }
    else{
      $("#contentpage").removeClass('hide');
    }
  });
});


function viewstore(id,nombre, description){
    var obj = new Object();
     obj.id = id;
     obj.name  = nombre;
     obj.des  = description;
     var jsonString= JSON.stringify(obj);
      location.href="store/";
      localStorage.setItem('Store',jsonString);
}

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
                
                html+='<div class="col l3 m6 s10 offset-s1">';
                  html+='<div class="card hoverable">';
                    html+='<div class="card-image">';
                      html+='<center><img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 135px; width: 100%;"></center>';
                    html+='</div>';
                    html+='<div class="card-content">';
                     html+='<h4 class="card-title" style="margin-top:-1rem;">'+values[i].name_bus+'</h4>';
                      html+='<p class="truncate">'+values[i].description+'</p>';
                    html+='</div>';
                    html+='<div class="card-action center-align">';
                      html+='<a href="#!"  onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+','+String("'"+values[i].description+"'")+')">ver productos</a>';
                    html+='</div>';
                  html+='</div>';
                html+='</div>';
              }                   
            

             $("#contbusi").addClass('fadeOutLeft');
            
            setTimeout(function(){
              $("#business").html(html);
              $("#contbusi").removeClass('fadeOutLeft'); 
              $("#contbusi").addClass('fadeInUp');

            }, 500);
             
            } 
        }); 
      
}




var businessbycat = (id) =>{
  var html='';
          var dataString = 'id='+id;
          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHomebycat",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
             // alert(resp);
             for (var i = 0; i < values.length; i++) {
                html+='<div class="col l3 m6 s10 offset-s1">';
                  html+='<div class="card hoverable">';
                    html+='<div class="card-image">';
                      html+='<center><img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 135px; width: 100%;"></center>';
                    html+='</div>';
                    html+='<div class="card-content">';
                     html+='<h4 class="card-title" style="margin-top:-1rem;">'+values[i].name_bus+'</h4>';
                      html+='<p class="truncate">'+values[i].description+'</p>';
                    html+='</div>';
                    html+='<div class="card-action center-align">';
                      html+='<a href="#!"  onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+','+String("'"+values[i].description+"'")+')">ver productos</a>';
                    html+='</div>';
                  html+='</div>';
                html+='</div>';       
             }
            
            $("#contbusi").addClass('fadeOutLeft');
            
            setTimeout(function(){
              $("#business").html(html);
              $("#contbusi").removeClass('fadeOutLeft'); 
              $("#contbusi").addClass('fadeInUp');
            }, 500);
             
             
            } 
        }); 
      
}

var categories = () =>{
  var html="";
  var htmlnor='';
          $.ajax({
            type: "POST",
            url: "controller/cproduct.php?btngetData=getDataCategories",
            success: function(resp) {
            var values = eval(resp);        
                html+='<a href="#!" onClick="business();" class=""> ';
                      
                              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle "><br>Todos';
                                html+='</div>';
                              html+='</div>';
                   
                    html+='</a>';
                    htmlnor+='<a href="#!" onClick="business();" class="col s2"><img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle ">Todos';
                    htmlnor+='</a>';
               for (var i = 0; i< values.length; i++) {
                  
                   html+='<a href="#!'+values[i][0]+'" onClick="businessbycat('+values[i][0]+');" class=""> ';
                      
                              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle "><br>'+values[i][1];
                                html+='</div>';
                              html+='</div>';
                   
                    html+='</a>';
                    htmlnor+='<a href="#!'+values[i][0]+'" onClick="businessbycat('+values[i][0]+');" class="col s2"><img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle ">'+values[i][1];
                    htmlnor+='</a>';

               }
               $("#categoriesm").html(html);
               $("#categories").html(htmlnor);
            } 
        }); 
      
}

var businessbyproductype= (id) =>{
  var html='';
          var dataString = 'id='+id;
          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHomebytp",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
             // alert(resp);
             for (var i = 0; i < values.length; i++) {
                html+='<div class="col l3 m6 s10 offset-s1">';
                  html+='<div class="card hoverable">';
                    html+='<div class="card-image">';
                      html+='<center><img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 135px; width: 100%;"></center>';
                    html+='</div>';
                    html+='<div class="card-content">';
                     html+='<h4 class="card-title" style="margin-top:-1rem;">'+values[i].name_bus+'</h4>';
                      html+='<p class="truncate">'+values[i].description+'</p>';
                    html+='</div>';
                    html+='<div class="card-action center-align">';
                      html+='<a href="#!"  onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+','+String("'"+values[i].description+"'")+')">ver productos</a>';
                    html+='</div>';
                  html+='</div>';
                html+='</div>';       
             }
            
            $("#contbusi").addClass('fadeOutLeft');
            
            setTimeout(function(){
              $("#business").html(html);
              $("#contbusi").removeClass('fadeOutLeft'); 
              $("#contbusi").addClass('fadeInUp');
            }, 500);
             
             
            } 
        }); 
      
}

var producttype = () =>{
    var html="";
  var htmlnor='';

          $.ajax({
            type: "POST",
            url: "controller/cproduct.php?btngetData=getDataProductType",
            success: function(resp) {
            var values = eval(resp);
             html+='<a href="#!" onClick="business();" class=""> ';      
              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle "><br>Todos';
                                html+='</div>';
                              html+='</div>';
                   
                    html+='</a>';
                    htmlnor+='<a href="#!" onClick="business();" class="col s2"><img src="https://static.vecteezy.com/system/resources/previews/000/582/138/non_2x/drink-icon-vector-illustration.jpg" style="height:35px; width:45px;" alt="" class="circle ">Todos';
                    htmlnor+='</a>';
               for (var i = 0; i< values.length; i++) {
                   html+='<a href="#!'+values[i][0]+'" onClick="businessbyproductype('+values[i][0]+');" class=""> ';
                      
                              html+='<div class="col s4 m3 l1 card-panel offset-m1 offset-l1  offset-s1"> ';
                                html+='<div class="col s12">';
                                  html+='<img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle "><br>'+values[i][1];
                                html+='</div>';
                              html+='</div>';
                   
                    html+='</a>';
                    htmlnor+='<a href="#!'+values[i][0]+'" onClick="businessbyproductype('+values[i][0]+');" class="col s2"><img src="view/imglogos/'+values[i][3]+'" style="height:35px; width:45px;" alt="" class="circle ">'+values[i][1];;
                    htmlnor+='</a>';
               }
               $("#productypem").html(html);
               $("#producttype").html(htmlnor);
            } 
        }); 
      
}