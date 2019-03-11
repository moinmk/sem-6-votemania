<!DOCTYPE HTML>
<html>
<head>
<script src="canvasjs/canvasjs.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		
		
		animationEnabled: true,
         
        theme:"dark2",
        backgroundColor:"rgba(0,0,0,.5)",
		title:{
			text: "My First Chart in CanvasJS"              
		},
		//dataPointMaxWidth: 40,
		data: [              
		{
			// Change type to "pie","column","doughnut", "line", "splineArea", etc.
			type: "column",
            // showInLegend:"true",
            color:"rgba(0,0,0,0.7)",
            legendText: "{label}",
		indexLabelFontSize: 16,
		// indexLabel: "{label} - #percent%",
			dataPoints: [
				{ label: "the dark knight",  y: 15  },
				{ label: "blackpanther", y: 8  },
				{ label: "logan", y: 9 },
				{ label: "mango",  y: 10  },
				{ label: "grape",  y: 2  }
			]
		}
		]
	});
	chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 50%;"></div>
</body>
</html> 


