<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";

$logs = get_loginout();
?>



         <div class="row">
                        <div class="col-md-12">

					
				<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        ورود و خروج ها <div class="btn-group btn-group-devided">
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
                                                    <th> رخداد </th>
                                                    <th> زمان </th>
                                                    <th> توضیح </th>
                                                    <th> آی پی </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            
                                            	<?php 
                                            	foreach ($logs as $log) {

        switch ($log['happening']) {

        case 'login_success':
        $message_login = 'ورود موفق';
        $color_login = 'success';
        break;

        case 'login_error':
        $message_login = 'سعی در ورود';
        $color_login = 'danger';
        break;

        case 'logout_success':
        $message_login = 'خروج موفق';
        $color_login = 'warning';
        break;

      }

                                            	?>

							                    <tr>
                                                    <td>
                                                    <label class="label label-<?=$color_login?>"><?=$message_login?></label>
                                                    </td>
                                                    <td>  <?=date_diff_persion($log['time'])?></td>
                                                    <td>  <?=$log['comment']?></td>
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