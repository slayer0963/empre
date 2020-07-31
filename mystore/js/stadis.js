function mybusii(id,name){

  var obj = new Object();

  obj.idbusi=id;
  obj.name=name;

  localStorage.setItem('Store',JSON.stringify(obj));
  location.href="./statistic";
}

$(document).ready(function() {
  var obj =JSON.parse(localStorage.getItem('Store'));
  if(obj.name!=""){
    $("#namebusi").html(obj.name);
    getDataProducts(obj.idbusi);
    getDataSales(obj.idbusi);
    
  }

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
	var chart = new ApexCharts(
  document.querySelector("#chartpro1"),
    optionsgraplinecurve()
  );

  chart.render();

  getDataApexpro1(chart,idbusi,idprices,color,material,size);
  getDataApexprofit(idbusi,idprices,color,material,size);
  getDataApexsales(idbusi,idprices,color,material,size);
  getDataApexrating(idprices,color,material,size);
  // setInterval( function(){ getDataApexpro1(chart,idbusi,idprices,color,material,size); } , 6000);
};  


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