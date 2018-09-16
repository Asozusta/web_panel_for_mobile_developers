<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";

?>



         <div class="row">
                        <div class="col-md-12">

					
				<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        مدیران آنلاین <div class="btn-group btn-group-devided">
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
                                            	foreach ($q_online_users as $log) {
                                                    $date = date("Y-m-d H:i:s", $log['time']);
                                            	?>

							                    <tr>
                                                    <td>
                                                    <?=$log['username']?>
                                                    </td>
                                                    <td>  <?=date_diff_persion($date)?></td>
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