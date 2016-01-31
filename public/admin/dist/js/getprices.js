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
            url: "admin/prices",

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