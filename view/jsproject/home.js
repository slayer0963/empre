

$(document).ready(function() {





var chart = new ApexCharts(
  document.querySelector("#chart1"),
  optionsgrapbar('bar','')
);

chart.render();

getDataApex(chart);
setInterval( function(){ getDataApex(chart); } , 6000);

var chart2 = new ApexCharts(
  document.querySelector("#chart2"),
  optionsgrapdonut()
);

chart2.render();
getDataApex2(chart2);
setInterval( function(){ getDataApex2(chart2); } , 6000);

var chart3 = new ApexCharts(
  document.querySelector("#chart3"), 
  optionsgrapline()
  );
chart3.render();
getDataApex3(chart3);
setInterval( function(){ getDataApex3(chart3); } , 6000);

var chart4 = new ApexCharts(
  document.querySelector("#chart4"), 
  optionsgrapbaragroup()
  );
chart4.render();
getDataApex4(chart4);
setInterval( function(){ getDataApex4(chart4); } , 6000);


var chart5 = new ApexCharts(
  document.querySelector("#chart5"), 
  optionsgrapdonut()
  );
chart5.render();
getDataApex5(chart5);
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



var getDataApex= (chart) =>{

  $.ajax({
    url: '../controller/cmonitoring.php?btngetData=getDatachartone',
    success: function(datas) {
    	var lbl = eval(datas);

				chart.updateSeries([{
			    name: 'Ganancias',
			    data: lbl
			  }]);
     
    }
  });
};

var getDataApex2= (chart2) =>{
	
  $.ajax({
      url: '../controller/cmonitoring.php?btngetData=getDatacharttwo',
      success: function(datas) {
      	var lbl = eval(datas);
      		var arr = [];
      		var arrname=[];
      		for (var i = 0; i < lbl.length; i++) {
      			arr.push(parseInt(lbl[i].y));
      			arrname.push(lbl[i].x);
      		}

       		chart2.updateSeries(arr);
       		chart2.updateOptions({labels: arrname});

       		
       		
      }
    });        
};  

var getDataApex3= (chart3) =>{
  
  $.ajax({
      url: '../controller/cmonitoring.php?btngetData=getDatachartthree',
      success: function(datas) {
        var lbl = eval(datas);
         chart3.updateSeries([{
          name: 'Ganancias',
          data: lbl
        }]);
      }
    });     
};

var getDataApex4= (chart4) =>{
  
  $.ajax({
      url: '../controller/cmonitoring.php?btngetData=getDatachartfour',
      success: function(datas) {
        var lbl = eval(datas);
         chart4.updateSeries([{
          name: 'Ganado',
          data: lbl
        }]);
        var arrname=[];
          for (var i = 0; i < lbl.length; i++) {
            arrname.push(lbl[i].x);
          }
         //chart4.updateOptions({labels: arrname});
         chart4.addXaxisAnnotation({categories: arrname});
      }
    });     
};

var getDataApex5= (chart5) =>{
  
 $.ajax({
      url: '../controller/cmonitoring.php?btngetData=getDatachartfive',
      success: function(datas) {
        var lbl = eval(datas);
          var arr = [];
          var arrname=[];
          for (var i = 0; i < lbl.length; i++) {
            arr.push(parseInt(lbl[i].y));
            arrname.push(lbl[i].x);
          }

          chart5.updateSeries(arr);
          chart5.updateOptions({labels: arrname});

          
          
      }
    });     
};



