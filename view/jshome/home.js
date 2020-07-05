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
                
             	 // html+='<div class="col-md-3" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">';
               //             html+=' <div class="store-item">';
               //                  html+='<div class="store-item-image">';
               //                      html+='<a href="store/'+values[i].id_bus+'">';
               //                          html+='<img src="view/imgbusiness/'+values[i].pic_logo_bus+'" alt="" class="img-responsive">';
               //                      html+='</a>';
               //                  html+='</div>';
               //                  html+='<div class="store-item-info clearfix">';
               //                      html+='<b class=" themed-color-dark pull-right">'+values[i].name_bus+'</b>';
               //                      html+='<a href="store/'+values[i].id_bus+'"><strong>Ver</strong></a><br>';
               //                      // html+='<small><i class="fa fa-shopping-cart text-muted"></i> <a href="javascript:void(0)" class="text-muted">Add to cart</a></small>';
               //                  html+='</div>';
               //              html+='</div>';
               //          html+='</div>';


                html+='<div class="col s12 m6 l3">';
                  html+='<div class="card">';
                    html+='<div class="card-image">';
                      html+='<img src="view/imgbusiness/'+values[i].pic_logo_bus+'" style="height: 150px;" class="img-responsive">';
                      // html+='<span class="card-title flow-text"></span>';
                      html+='<a href="store/'+values[i].id_bus+'" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>';
                   html+=' </div>';
                    html+='<div class="card-content">';
                      html+=values[i].name_bus+'<br><p>QUE HACEN</p>';
                    html+='</div>';
                  html+='</div>';
                html+='</div>';


                htmlcarru+='<div class="carousel-item blue white-text" href="#two!"><a class="carousel-item" href="#one!"><img src="https://lorempixel.com/250/250/nature/1"><p>HOLA</p></a><h2>First Panel</h2>';
              

                    
             }
            

             $("#business").html(html);
             $("#carru").html(htmlcarru);
             // $("#carru").set(4);
            } 
        }); 
      
}