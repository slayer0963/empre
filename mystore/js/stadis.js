

var chart5 = "";
var chart6= "";

function mybusii(id,name){

  var obj = new Object();

  obj.idbusi=id;
  obj.name=name;

  localStorage.setItem('Store',JSON.stringify(obj));
  location.href="./statistic";
}

$(document).ready(function() {

  $('#tbcoment').DataTable( {
    "responsive": true,
    "order": [[ 1, "asc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,
      "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
      "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
    "oLanguage": {
            "sProcessing":     "Procesando...",

        "sLengthMenu": 'Mostrar <select>'+
            '<option value="5">5</option>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Selecciona un producto primero",
        "sInfo":           "Mostrando del (_START_ al _END_) de  _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     ">",
            "sPrevious": "<"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
  });
  var obj =JSON.parse(localStorage.getItem('Store'));
  if(obj.name!=""){
    $("#namebusi").html(obj.name);
    getDataProducts(obj.idbusi);
    getDataSales(obj.idbusi);
    setCombopro(obj.idbusi);
  }



  $('#frmconst').submit(function() {
    if(Validate(1)==idinput.length){
    $.ajax({
              type: "POST",
              url: "../controller/cmonitoringbybus.php?btnsetData=setDataComent", 
              data: $("#frmconst").serialize(),
              success: function(resp) {

                     if(resp==1){

                      
                      M.toast({html: "¡Se ha respondido exitosamente!", classes: 'rounded  green'});
                      $('.modal').modal('close');
                      cleanform();
                      cleanbox();
                      
                     }
                     else{
                      M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste ingresar!", classes: 'rounded deep-orange'});
                      
                     }
                       
              }   
                  
          });
  }
    return false;
  });

var idinput = ['coment'];
var idinputerror= ['txtcoment'];



var cleanform = () =>{
    idinput.forEach(names => {
        $("#"+names).val("");
        
    });

}



var Validate = (type) =>{
  var validate=0, html="", count=0, counte=0;
  if(type==1){
        idinput.forEach(names => {
          
       if($("#"+names).val().length > 0){
         validate+=1;
         html="Listo";
         $("#"+idinputerror[count]).html($("#"+names).attr('title'));
         $("#"+idinputerror[count]).removeClass('red-text');
         $("#"+idinputerror[count]).addClass('green-text');
         
       }
       else{
        //html="Verificar el campo "+ $("#"+names).attr('title')+"<br>";
        $("#"+idinputerror[count]).html($("#"+names).attr('title')); 
        $("#"+idinputerror[count]).removeClass('green-text');      
         $("#"+idinputerror[count]).addClass('red-text'); 
       }
       count++;
    });
  }

    return validate;
}

var cleanbox=()=>{
idinputerror.forEach(names => {
  $("#"+names).removeClass('green-text');      
});
}

  $("#pro").select2({
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

  $("#pro").change(function(event) {
    getComents( $("#pro").val());
  });

var chart = new ApexCharts(
  document.querySelector("#chart1"),
  optionsgrapbar('bar','')
);

chart.render();

getDataApex(chart,obj.idbusi);
setInterval( function(){ getDataApex(chart,obj.idbusi); } , 6000);


var chart2 = new ApexCharts(
  document.querySelector("#chart2"),
  optionsgrapbar('bar','')
);

chart2.render();

getDataApextwo(chart2,obj.idbusi);
setInterval( function(){ getDataApextwo(chart2,obj.idbusi); } , 6000);



var chart3 = new ApexCharts(
  document.querySelector("#chart3"),
  optionsgrapdonut()
);

chart3.render();
getDataApexthree(chart3,obj.idbusi);
setInterval( function(){ getDataApexthree(chart3,obj.idbusi); } , 6000);

var chart4 = new ApexCharts(
  document.querySelector("#chart4"),
  optionsgrapdonut()
);

chart4.render();
getDataApexfour(chart4,obj.idbusi);
setInterval( function(){ getDataApexfour(chart4,obj.idbusi); } , 6000);

 chart5 = new ApexCharts(
  document.querySelector("#chartpro1"),
    optionsgraplinecurve()
  );

  chart5.render();

  chart6 = new ApexCharts(
  document.querySelector("#chartpro2"),
    optionsgraplinecurve()
  );

  chart6.render();

});

var optionsgrapbar =(tipo,titulo) =>{
	var options= {
    chart: {
        height: 350,
        type: tipo,
        events: {
              dataPointSelection: function (e, chart, opts) {
                console.log(opts.dataPointIndex);
          
              }
            }
    },

    dataLabels: {
        enabled: true,

    },
    style: {
      colors: ['#F44336', '#E91E63', '#9C27B0']
    },
    plotOptions: {
            bar: {
              horizontal: false,
             columnWidth: '50%',
              endingShape: 'flat'
            }
          },
    series: [],
    title: {
        text: titulo,
    },
    noData: {
      text: 'Esperando tener información...'
    }
  }
  return options;
}



var optionsgrapbaragroup= () =>{
  var options = {
            series: [],

            chart: {
            type: 'bar',
            height: 430
          },
          plotOptions: {
            bar: {
              horizontal: false,
              dataLabels: {
                position: 'top',
              },
              columnWidth: '50%',
              endingShape: 'flat',
            }
          },
          dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
              fontSize: '12px',
              colors: ['#fff']
            }
          },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        }
        };
    return options;
}

var optionsgrapdonut=()=>{

  var options = {
            series: [],
            chart: {
            type: 'donut',
          },
              legend: {
                position: 'top',
                horizontalAlign: 'center',
                show: false,
              },

          responsive: [{
            
            options: {
              chart: {
                width: 200
              }
            }
          }],
          title: {
            text: ""
          },
            noData: {
              text: 'Esperando tener información...'
            },
           plotOptions: {
            pie: {
              donut: {
                labels: {
                  show: true,
                  total: {
                    showAlways: true,
                    show: true
                  }
                }
              }
            }
          },
          };
          return options;
}

var optionsgrapline =() =>{
   var options = {
          series: [{
          data: []
        }],
          chart: {
          type: 'line',
          height: 350
        },
        noData: {
          text: 'Esperando tener información...'
        },
        stroke: {
          curve: 'stepline',
        },
        dataLabels: {
          enabled: true
        },
        title: {
          text: '',
          align: 'center'
        }
        };
  return options;
}

var optionsgraplinecurve =() =>{
   var options = {
          series: [{
          data: []
        }],
          chart: {
          type: 'line',
          height: 350
        },
        noData: {
          text: 'Esperando tener información...'
        },
        stroke: {
          curve: 'straight',
        },
        dataLabels: {
          enabled: true
        },
        title: {
          text: '',
          align: 'center'
        }
        };
  return options;
}

var setCombopro = (id) =>{
  var html="";
  var dataString = 'id='+id;
          $.ajax({
            type: "POST",
            url: "../controller/cmonitoringbybus.php?btngetData=getProducts",
            data: dataString,
            success: function(resp) {
            var values = eval(resp);        
              html+='<option value="0" selected>Seleccione un producto</option>';
               for (var i = 0; i< values.length; i++) {
                   html+="<option value='"+values[i][0]+"'>"+values[i][1]+"</option>"
               }
               $("#pro").html(html);
            } 
        }); 
      
}

var getDataApex= (chart,id) =>{
var dataString = 'id='+id;
  $.ajax({
    type: "POST",
    url: '../controller/cmonitoringbybus.php?btngetData=getDatachartone',
    data: dataString,
    success: function(datas) {
    	var lbl = eval(datas);

				chart.updateSeries([{
			    name: 'Ganancias $',
			    data: lbl
			  }]);
     
    }
  });
};

var getDataApextwo= (chart,id) =>{
var dataString = 'id='+id;
  $.ajax({
    type: "POST",
    url: '../controller/cmonitoringbybus.php?btngetData=getDatacharttwo',
    data: dataString,
    success: function(datas) {
      var lbl = eval(datas);

        chart.updateSeries([{
          name: 'Ventas',
          data: lbl
        }]);
     
    }
  });
};

var getDataApexthree= (chart,id) =>{
  var dataString = 'id='+id;
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDatachartthree',
      data: dataString,
      success: function(datas) {
        var lbl = eval(datas);
          var arr = [];
          var arrname=[];
          for (var i = 0; i < lbl.length; i++) {
            arr.push(parseFloat(lbl[i].y));
            arrname.push(lbl[i].x);
          }

          chart.updateSeries(arr);
          chart.updateOptions({labels: arrname});

          
          
      }
    });        
};

var getDataApexfour= (chart,id) =>{
  var dataString = 'id='+id;
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDatachartfour',
      data: dataString,
      success: function(datas) {
        var lbl = eval(datas);
          var arr = [];
          var arrname=[];
          for (var i = 0; i < lbl.length; i++) {
            arr.push(parseFloat(lbl[i].y));
            arrname.push(lbl[i].x);
          }

          chart.updateSeries(arr);
          chart.updateOptions({labels: arrname});

          
          
      }
    });        
};

var getDataApexpro1= (chart,idbusi,idprices,color,material,size) =>{
  var dataString = 'id='+idbusi+'&idprice='+idprices+'&color='+color+'&material='+material+'&size='+size;
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDatachartproone',
      data: dataString,
      success: function(datas) {
        var lbl = eval(datas);
          chart.updateSeries([{
          name: 'Ventas $',
          data: lbl
        }]);
       
      }
    });        
};

var getDataApexpro2= (chart,idbusi,idprices,color,material,size) =>{
  var dataString = 'id='+idbusi+'&idprice='+idprices+'&color='+color+'&material='+material+'&size='+size;
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDatachartprotwo',
      data: dataString,
      success: function(datas) {

        var lbl = eval(datas);
          chart.updateSeries([{
          name: 'Ventas $',
          data: lbl
        }]);
       
      }
    });        
};

var getDataApexprofit= (idbusi,idprices,color,material,size) =>{
  var dataString = 'id='+idbusi+'&idprice='+idprices+'&color='+color+'&material='+material+'&size='+size;
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDatachartproprofit',
      data: dataString,
      success: function(datas) {
        var lbl = eval(datas);
        $("#profitpro").html("$"+lbl[0].ganancia);
      }
    });        
};

var getDataApexsales= (idbusi,idprices,color,material,size) =>{
  var dataString = 'id='+idbusi+'&idprice='+idprices+'&color='+color+'&material='+material+'&size='+size;
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDatachartprosales',
      data: dataString,
      success: function(datas) {
        // alert(datas);
        var lbl = eval(datas);
        $("#salespro").html("$"+lbl[0].ganancia);
      }
    });        
};

var getDataApexrating= (idprices,color,material,size) =>{
  var dataString = 'idprice='+idprices+'&color='+color+'&material='+material+'&size='+size;
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDatachartprorating',
      data: dataString,
      success: function(datas) {
        //alert(datas);
        var lbl = eval(datas);
        if(lbl[0].media==null){
          $("#rating").html("<i class='material-icons'>stars</i>"+parseFloat(0).toFixed(2));
        }
        else{
          $("#rating").html("<i class='material-icons'>stars</i>"+parseFloat(lbl[0].media).toFixed(2));
        }
        
      }
    });        
};

var FillStadist= (idbusi,idprices,color,material,size) =>{

  getDataApexpro1(chart5,idbusi,idprices,color,material,size);
  getDataApexpro2(chart6,idbusi,idprices,color,material,size);
  getDataApexprofit(idbusi,idprices,color,material,size);
  getDataApexsales(idbusi,idprices,color,material,size);
  getDataApexrating(idprices,color,material,size);
  // setInterval( function(){ getDataApexpro1(chart,idbusi,idprices,color,material,size); } , 3000);
};

var Fillsalesdate =(idcart)=>{
  getDataDetailsSales(idcart);
  $("#salesdatesdetails").modal('open');
}

var getDataDetailsSales = (cart)=> {
  var dataString = 'id='+cart;
  var html='', htmltf='', name='',fecha='';
  $.ajax({
      type: "POST",
      url: '../controller/cmonitoringbybus.php?btngetData=getDataDetailsSales',
      data: dataString,
      success: function(datas) {
        let totoalf=0, totalf=0;
        var lbl = eval(datas);
         for (var i = 0; i < lbl.length; i++) {
          name=lbl[i].fullname_cl;
          fecha=lbl[i].fecha;
          totoalf=parseFloat(lbl[i].total);
          totalf+=parseFloat(lbl[i].total);
          html+='<tr><td>'+lbl[i].name_pro+'</td><td>'+lbl[i].name_color+'<br>'+lbl[i].name_mat+'<br>'+lbl[i].name_size+'-'+lbl[i].number_size+'</td><td>'+lbl[i].quantity+'</td><td>$'+lbl[i].precio+'</td><td>'+parseFloat(lbl[i].descuento)*100+'%</td><td>$'+totoalf.toFixed(2)+'</td></tr>';
        }
        $("#bodysales").html(html);
         htmltf+='<tr><td colspan="5"></td><td>$'+totalf.toFixed(2)+'</td></tr>';
        $("#bodysalesfoot").html(htmltf);
        $("#nameclide").html("Detalle de ventas de "+name+" en la fecha "+fecha);
        
      }
    });
   

}

var Replycoment =(idprev, idus, cli,coment,imagen)=>{
  var html='';
  html+='<div class="chip">';
    html+='<img src="../view/imguser/'+imagen+'" alt="Contact Person">';
    html+=cli;
  html+='</div>';
  $("#nameclient").html(html);
  $("#coment").html(coment);
  $("#idprev").val(idprev);
  $("#idus").val(idus);


}


var getDataProducts = (bussi)=> {
    $('#tbproduct').DataTable( {
    "responsive": true,
    "order": [[ 3, "asc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,
    "ajax": {
          url:"../controller/cmonitoringbybus.php?btngetData=getDataproduc&id="+bussi,
          "type": "GET",
    },
    "columns": [
      { "data": "img" },
      { "data": "data" },
      { "data": "quantity" },
      { "data": "quantity2" },
      { "data": "actions" }
      ],
      "columnDefs": [
        {"className": "dt-center", "targets": "_all"},
        {
                "targets": [ 3 ],
                "visible": false,
                "searchable": true
        }
      ],
      "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
    "oLanguage": {
            "sProcessing":     "Procesando...",

        "sLengthMenu": 'Mostrar <select>'+
            '<option value="5">5</option>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del (_START_ al _END_) de  _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     ">",
            "sPrevious": "<"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
  });

}


var getComents = (pro)=> {
    $('#tbcoment').DataTable( {
    "responsive": true,
    "order": [[ 1, "asc" ]],
    "stateSave": true,
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,
    "ajax": {
          url:"../controller/cmonitoringbybus.php?btngetData=getDataComent&id="+pro,
          "type": "GET",
    },
    "columns": [
      { "data": "usuario" },
      { "data": "valoracion" },
      { "data": "comentario" },
      { "data": "actions" }
      ],
      "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
      "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
    "oLanguage": {
            "sProcessing":     "Procesando...",

        "sLengthMenu": 'Mostrar <select>'+
            '<option value="5">5</option>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del (_START_ al _END_) de  _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     ">",
            "sPrevious": "<"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
  });

}

var StateChange = (id,estado,idpro) =>{

          var dataString = 'id='+id+"&state="+estado;
           $.ajax({
            type: "POST",
            url: "../controller/cmonitoringbybus.php?updateData=statechange",
            data: dataString,
            success: function(resp) {
        
                    if (resp=="1") {
                               M.toast({html: "¡El comentario ya no aparecera!", classes: 'rounded  green'});
                    }else{
                              M.toast({html: "¡Algo ha ido mal, revisa la información que deseaste modificar!", classes: 'rounded deep-orange'});  
                   } 
            getComents(idpro);
            }
        }); 
     return false;
}

var getDataSales = (bussi)=> {
    $('#tbsalesdate').DataTable( {
    "responsive": true,
    "order": [[ 2, "asc" ]],
    "stateSave": true,
   
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "bDestroy": true,
    "paging": true,
    "responsive": true,


    "ajax": {
          url:"../controller/cmonitoringbybus.php?btngetData=getSalesdate&id="+bussi,
          "type": "GET",
    },
    "columns": [
      { "data": "fullname_cl" },
      { "data": "total" },
      { "data": "dates" },
      { "data": "actions" }
      ],
      "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
      "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
    "oLanguage": {
            "sProcessing":     "Procesando...",

        "sLengthMenu": 'Mostrar <select>'+
            '<option value="5">5</option>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del (_START_ al _END_) de  _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     ">",
            "sPrevious": "<"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
  });

}