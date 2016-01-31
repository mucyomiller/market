<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>test charts</title>
  <link rel="stylesheet" href="">
  <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}">
    <script>
    var odata =new Array();
 function addmsg(ndata){
          if(odata.toString() === ndata.toString()){
            //console.log("now array is equal");
            var count =false;
            while(count){
              console.log(odata);
              render(odata);
              count =false;
            }
          }
          else{
            console.log("array is not equal");
            render(ndata);
          }
}
    function drawCharts(){
        /* This requests the url "getdata.php"
        When it complete (or errors)*/
        $.ajax({
            dataType: "json",
            type: "GET",
            url: "prices",

            async: true, /* If set to non-async, browser shows page as "Loading.."*/
            cache: false,
            timeout:50000, /* Timeout in ms */

            success: function(data){
                 /* called when request to barge.php completes */
                addmsg(data); 
                /* Add response to a .msg div (with the "new" class)*/
                setTimeout(
                    drawCharts, /* Request next message */
                    1000 /* ..after 1 seconds */
                );
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                addmsg("error", textStatus + " (" + errorThrown + ")");
                setTimeout(
                    drawCharts, /* Try again after.. */
                    15000); /* milliseconds (15seconds) */
            }
        });
    };


   function render(data){
    odata=[];
    odata = data;
       var ctx = $("#miller").get(0).getContext("2d");
                  var lineChartData = {
                      labels : ["January","February","March","April","May","June","July","August","September","November","December"],
                      datasets : [
                        {
                          label: "My First dataset",
                          fillColor : "rgba(220,220,220,0.2)",
                          strokeColor : "skyblue",
                          pointColor : "red",
                          pointStrokeColor : "#fff",
                          pointHighlightFill : "#fff",
                          pointHighlightStroke : "rgba(220,220,220,1)",
                          data : data
                        }
                      ]
                    }
                    window.myLine = new Chart(ctx).Line(lineChartData, {
                      responsive: true,
                      bezierCurve: false,
                    });
    }

    $(document).ready(function(){
        drawCharts(); /* Start the inital request */
    });
    </script>
</head>
<body>
<canvas id="miller" width="400"></canvas>
      <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
      <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/chartjs/chart.min.js') }}"></script>
    <!-- Chart.js charts -->
    <script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
    <!--  tskills.com reporting javascript files -->
    <script src="{{ asset('admin/dist/js/pages/reports.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/getprices.js') }}"></script>
    </body>
</body>
</html>