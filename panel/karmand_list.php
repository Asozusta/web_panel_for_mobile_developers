<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";

$karmands = get_admins();
?>



         <div class="row">
                        <div class="col-md-12">

					
				<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        لیست مدیر ها <div class="btn-group btn-group-devided">
                                           
                                               <a href="karmand_create" class="btn btn-xs btn-outline green-meadow">ایجاد مدیر جدید</a>
                                       
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
                                                    <th> نام </th>
                                                    <th> نام خانوادگی </th>
                                                    <th> وضعیت </th>
                                                    <th> مدیریت </th>

                                                </tr>
                                            </thead>

                                            <tbody>
<!-- 
                                            <tr>
                                                    <th> # </th>
                                                    <th> محتوا </th>
                                                    <th> از تاریخ </th>
                                                    <th> تا تاریخ </th>
                                                    <th> مدیریت </th>
                                                </tr>
 -->
                                            
                                            	<?php 
                                            	foreach ($karmands as $karmand) {

                           // $fdate = to_jalali($row['from_date']);
                           // $t = explode(" ",$fdate);
                           // $from_date_saat = $t[1];
                           // $from_date_tarikh = $t[0];

                           // $fdate = to_jalali($row['to_date']);
                           // $t = explode(" ",$fdate);
                           // $to_date_saat = $t[1];
                           // $to_date_tarikh = $t[0];


                                            	 	?>

							  <tr>
                                                    <td>
                                                    <img src="../upload/avatars/<?=$karmand['profilepicurl']?>.jpg" class="img-circle img-responsive" style="display:inline; margin-left:5px; width:30px; " >
                                                    <p class="popovers" data-container="body" data-html="true" data-trigger="hover" data-placement="top" data-content="موبایل : <?=$karmand['mobile']?><br>تلفن ثابت : <?=$karmand['phone']?><br>ایمیل : <?=$karmand['email']?>" data-original-title="اطلاعات مدیر : <?=$karmand['username']?>" style="display:inline;">

                                                    <?=$karmand['username']?>
                                                    </p>
                                                    </td>
                                                    <td> <?=$karmand['fname']?></td>
                                                    <td> <?=$karmand['lname']?></td>
                                                    <td><?php
                                                    if ($karmand['active'] == 'yes') {
                                                        echo 'فعال';
                                                    }else{
                                                        echo 'غیرفعال';
                                                    }
                                                    ?></td>
                                                    <td>
                                                        <a href='karmand_edit?id=<?=$karmand['id']?>' class="label label-sm label-success"> ویرایش </a>
                                                        <a onclick="return confirm('آیا مطمین هستید?')" href='karmand_delete?id=<?=$karmand['id']?>' class="label label-sm label-danger"> حذف </a>
                                                    </td>
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