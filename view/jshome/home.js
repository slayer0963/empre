$(document).ready(function(){
business(2);

});


var business = (val) =>{
  var html='';

          $.ajax({
            type: "POST",
            url: "controller/cbusiness.php?btngetData=getHome",
            success: function(resp) {
            var values = eval(resp);        
             // alert(resp);
             for (var i = 0; i < values.length; i++) {
                
             	 html+='<div class="col-md-3" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">';
                           html+=' <div class="store-item">';
                                html+='<div class="store-item-image">';
                                    html+='<a href="store/'+values[i].id_bus+'">';
                                        html+='<img src="view/imgbusiness/'+values[i].pic_logo_bus+'" alt="" class="img-responsive">';
                                    html+='</a>';
                                html+='</div>';
                                html+='<div class="store-item-info clearfix">';
                                    html+='<b class=" themed-color-dark pull-right">'+values[i].name_bus+'</b>';
                                    html+='<a href="store/'+values[i].id_bus+'"><strong>Ver</strong></a><br>';
                                    // html+='<small><i class="fa fa-shopping-cart text-muted"></i> <a href="javascript:void(0)" class="text-muted">Add to cart</a></small>';
                                html+='</div>';
                            html+='</div>';
                        html+='</div>';
                    
             }
            

             $("#business").html(html);
            } 
        }); 
      
}