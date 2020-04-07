$(document).ready(function(){

$("#tbaprice").DataTable({"responsive": true});


$("#tbapricelist").DataTable({"responsive": true});
setComboBusi();
$("#bus").select2({
    dropdownAutoWidth: true,
    width: '100%',
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#bus").select2({
  	templateResult: formatStateB,
    templateSelection: formatStateB
});

setComboUser();
$("#user").select2({
    dropdownAutoWidth: true,
    width: '100%',
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#user").select2({
  	templateResult: formatStateU,
    templateSelection: formatStateU
});

$("#user").change(function(argument) {
  setComboBusi($(this).val());
});

$("#pro").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modaladd"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

setComboColor();

$("#color").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modaladd"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#color").select2({
  	templateResult: formatStateC,
    templateSelection: formatStateC
});

setComboMaterial();

$("#material").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modaladd"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

setComboSize();

$("#size").select2({
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $("#modaladd"),
    language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});

$("#bus").change(function(argument) {
  setComboProduct($(this).val());
});



	$("#addprice").click(function(event) {
		Validatebtn();
	});


});

var idinputi = ['user','bus'];
var idinputerrori= ['txtuser','txtbus'];
var Validatebtn=()=>{
  var count=0,validate=0;
    idinputi.forEach(names => {
	    if($("#"+names).val()> 0){
	    validate+=1;
         $("#"+idinputerrori[count]).html($("#"+names).attr('title'));
         $("#"+idinputerrori[count]).removeClass('errorinputs');
         $("#"+idinputerrori[count]).addClass('successinputs');
         
       }
       else{
        $("#"+idinputerrori[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerrori[count]).removeClass('successinputs');      
         $("#"+idinputerrori[count]).addClass('errorinputs'); 
       }
       count++;
   	});

   	if(validate==idinputi.length){
   		$("#modaladd").modal();
   		$("#modaladd").modal('open');
   	}
}



var setComboUser = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataU",
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un usuario</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"' data-image='"+values[i][2]+"'><span>"+values[i][1]+"</span></option>";
               }
               $("#user").html(html);
            } 
        }); 
      
}

var setComboBusi = (val) =>{
          var html="";
          var dataString = 'id='+val;
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataB",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un negocio</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"' data-image='"+values[i][2]+"'>"+values[i][1]+"</option>"
               }
               $("#bus").html(html);
            } 
        }); 
      
}



var setComboProduct = (val) =>{
 			var html="";
          var dataString = 'id='+val;
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataP",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un producto</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'><span>"+values[i][1]+"</span></option>";
               }
               $("#pro").html(html);
            } 
        }); 
      
}

var setComboColor = () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataC",
            success: function(resp) {
            var values = eval(resp);       
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"' data-color='"+values[i][2]+"'><span>"+values[i][1]+"</span></option>";
               }
               $("#color").html(html);
            } 
        }); 
      
}

var setComboMaterial= () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataM",
            success: function(resp) {
            var values = eval(resp);       
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'><span>"+values[i][1]+"</span></option>";
               }
               $("#material").html(html);
            } 
        }); 
      
}

var setComboSize= () =>{
var html="";
          $.ajax({
            type: "POST",
            url: "../../controller/caproduct.php?btngetData=getDataS",
            success: function(resp) {
            var values = eval(resp);       
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'><span>"+values[i][1]+"-"+values[i][2]+"</span></option>";
               }
               $("#size").html(html);
            } 
        }); 
      
}

function formatStateB (opt) {
    if (!opt.id) {
        return opt.text;
    } 

    var imagen = $(opt.element).attr('data-image'); 
    console.log(imagen)
    if(!imagen){
       return opt.text;
    } else {                    
        var $opt = $(
           '<span><img class="" src="../imgbusiness/' + imagen + '" width="25px" height="25px" /> ' + opt.text + '</span>'
        );
        return $opt;
    }
};

function formatStateU (opt) {
    if (!opt.id) {
        return opt.text;
    } 

    var imagen = $(opt.element).attr('data-image'); 
    console.log(imagen)
    if(!imagen){
       return opt.text;
    } else {                    
        var $opt = $(
           '<span><img src="../imguser/' + imagen + '" width="25px" height="25px"  /> ' + opt.text + '</span>'
        );
        return $opt;
    }
};

function formatStateC (opt) {
    if (!opt.id) {
        return opt.text;
    } 

    var color = $(opt.element).attr('data-color'); 
    console.log(color)
    if(!color){
       return opt.text;
    } else {

        var $opt = $(
           '<span><input type="color" value="'+color+'" disabled>&nbsp;' + opt.text + '</span>'
        );
        return $opt;
    }
};



