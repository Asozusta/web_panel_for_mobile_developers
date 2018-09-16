<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";
?>

<style>
  .no-padding {

    padding-left: 0 !important;
    padding-right: 0 !important;
}

.dash {
	color:#33348e; text-decoration: none; 
	padding:35px;
	padding-bottom: 15px;
}

@-webkit-keyframes fadeIn {
  0% {opacity: 0.2;}
  100% {opacity: 1;}
}

@keyframes fadeIn {
  0% {opacity: 0.2;}
  100% {opacity: 1;}
}


.dash:hover { 
	text-align: center;
	color: red;
	  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  	  -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
	 -webkit-animation-name: fadeIn;
          animation-name: fadeIn;
}

a:hover{
	font-style: bold;
	color: red;
	text-decoration: none;
}

</style>



<div class="row">
    <div class="col-md-12">


        <div class="portlet light ">
           
         <div class="portlet-body" style="min-height:510px;">
			

<div class="row">


  <div class="col-sm-12">
             <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                       
                                        <span class="caption-subject font-dark sbold uppercase">خوش آمدید <?=$_SESSION['name']?> <small>( <?=$_SESSION['username']?> )</small>
</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="chart_2" class="chart"> </div>
                                </div>
                            </div>
    </div>
         </div>




            <script>
                        
function chart2() {
                if ($('#chart_2').size() != 1) {
                    return;
                }

                var factor_price = [
                     <?php   
                  $js = '';
                  for($i=30;$i>=0;$i--)
                  {
                     $date =  date('Y-m-d',strtotime(-($i)." days"));
                     $price = calculate_post_number($date);
                     if($price == '') $price = 0;
                     $js .= '['.$i.','.$price.']';
                     if($i!=0) $js .= ',';
                  }
                  echo $js;
                ?>];

                var plot = $.plot($("#chart_2"), [ {
                    data: factor_price,
                    label: "تعداد پست ها",
                    lines: {
                        lineWidth: 2,
                    },
                    shadowSize: 3
                }], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: 0.05
                                }, {
                                    opacity: 0.01
                                }]
                            }
                        },
                        points: {
                            show: true,
                            radius: 3,
                            lineWidth: 1
                        },
                        shadowSize: 0
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderColor: "#eee",
                        borderWidth: 1
                    },
                    colors: ["#196530", "#196530", "#196530"],
                    xaxis: {
                        ticks: 11,
                        tickDecimals: 0,
                        tickColor: "#eee",
                    },
                    yaxis: {
                        ticks: 11,
                        tickDecimals: 0,
                        tickColor: "#eee",
                    }
                });

                function persiandate(x) {
                    switch(x) {
                        case '0':
                            return "ی امروز = ";
                            break;
                        case '1':
                            return "ی دیروز = ";
                            break;
                        case '2':
                            return "ی پریروز = ";
                            break;
                        default:
                            return "ی "+x+" روز قبل = ";
                    }
                }

                function showTooltip(x, y, contents) {
                    $('<div id="tooltip">' + contents + '</div>').css({
                        position: 'absolute',
                        display: 'none',
                        top: y + 5,
                        left: x + 15,
                        border: '1px solid #333',
                        padding: '4px',
                        color: '#fff',
                        'border-radius': '3px',
                        'background-color': '#333',
                        opacity: 0.80
                    }).appendTo("body").fadeIn(200);
                }

                

                var previousPoint = null;
                $("#chart_2").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(0),
                                y = item.datapoint[1].toFixed(0);

                            showTooltip(item.pageX, item.pageY, item.series.label + persiandate( x) + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }

chart2();

               </script>


         </div>
         </div>
         </div>

            

<?php
require "..".THEME."footer.php";
?>