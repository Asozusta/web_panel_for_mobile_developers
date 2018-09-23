<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";

$logs = get_logs();
?>



         <div class="row">
                        <div class="col-md-12">

					
				<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        1000 لاگ آخر سیستم <div class="btn-group btn-group-devided">
                                        </div>
                                    </div>
                                   
                                    <div class="tools"> </div>
                                     <div class="actions">
                                        

                                    </div>

                                </div>
                                <div class="portlet-body">
                                   
                                        <table class="table table-striped table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> نام کاربری </th>
                                                    <th> زمان </th>
                                                    <th> صفحه </th>
                                                    <th> آی پی </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            
                                            	<?php 
                                            	foreach ($logs as $log) {
                                                    $date = date("Y-m-d H:i:s", $log['time']);
                                            	?>

							                    <tr>
                                                    <td>
                                                    <?=$log['username']?>
                                                    </td>
                                                    <td>  <?=date_diff_persian($date)?></td>
                                                    <td>  <?=$log['page']?></td>
                                                    <td>  <?=$log['ip']?></td>
                                                </tr>

                                            	 <?php } ?>
                                              
                                            </tbody>
                                        </table>
                                   
                                </div>
                            </div>



                        </div>

                      
         </div>
            

<?php
require "..".THEME."footer.php";
?>