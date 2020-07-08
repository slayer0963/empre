$(document).ready(function(){
business(2);

});


var business = (val) =>{
  var html='';
  var htmlcarru='';

          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHome",
            success: function(resp) {
            var values = eval(resp);        
             // alert(resp);
             for (var i = 0; i < values.length; i++) {
                

                // html+='<div class="col s12 m6 l3 ">';
                //   html+='<div class="card hoverable">';
                //     html+='<div class="card-image">';
                //       html+='<img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 100px;" class="img-responsive">';
                //       // html+='<span class="card-title flow-text"></span>';
                //       html+='<a href="store/'+values[i].id_bus+'" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>';
                //    html+=' </div>';
                //     html+='<div class="card-content">';
                //       html+=values[i].name_bus+'<br><h6>'+values[i].description+'</h6>';
                //     html+='</div>';
                //   html+='</div>';
                // html+='</div>';
                html+='<div class="col s12 m6 l3">';
                html+='<div class="card animated flipInY">';
                  html+='<div class="card-image waves-effect waves-block waves-light">';
                    html+='<img  src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 125px;" class="img-responsive activator">';
                  html+='</div>';
                  html+='<div class="card-content center-align">';
                    html+='<span class="card-title activator grey-text text-darken-4" style="font-size:15px; text-transform: uppercase;">'+values[i].name_bus+'<i class="material-icons right">more_vert</i></span>';
                    html+='<p><a class="btn-small" onclick="viewstore('+values[i].id_bus+','+String("'"+values[i].name_bus+"'")+')"><i class="material-icons">local_mall</i></a></p>';
                  html+='</div>';
                  html+='<div class="card-reveal">';
                    html+='<span class="card-title grey-text text-darken-4">'+values[i].name_bus+'<i class="material-icons right">close</i></span>';
                    html+='<p>'+values[i].description+'</p>';
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

function viewstore(id,nombre){
    var obj = new Object();
     obj.id = id;
     obj.name  = nombre;
     var jsonString= JSON.stringify(obj);
      location.href="store/";
      localStorage.setItem('Store',jsonString);
}