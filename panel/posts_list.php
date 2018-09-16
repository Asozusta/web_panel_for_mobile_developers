<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";

$posts = get_posts_with_authors();
?>



         <div class="row">
                        <div class="col-md-12">

					
				<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        لیست پست ها 

                                        <div class="btn-group btn-group-devided">
                                           

                                               <div class="btn-group btn-xs btn-outline green-meadow ">
                                            <a class="btn btn-xs green dropdown-toggle" href="javascript:;" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-plus"></i> ایجاد محتوای جدید
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="posts_create?type=text">
                                                        <i class="fa fa-file-text-o"></i> متن و عکس </a>
                                                </li>
                                                <li>
                                                    <a href="posts_create?type=video">
                                                        <i class="fa fa-file-video-o"></i> ویدئو </a>
                                                </li>
                                            </ul>
                                        </div>


                                                <a href="posts_sort" class="btn btn-xs btn-outline green-meadow"> <i class="fa fa-sort"></i> جابجایی ترتیب</a>
                                       
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
                                                    <th class="col-sm-1"> </th>
                                                    <th class="col-sm-2"> عنوان </th>
                                                    <th class="col-sm-3"> متن </th>
                                                    <th class="col-sm-2"> نویسنده </th>
                                                    <th class="col-sm-2"> تاریخ </th>
                                                    <th class="col-sm-2"> مدیریت </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            
                                            	<?php 
                                            	foreach ($posts as $post) {
                                                    $date = date("Y-m-d H:i:s", $post['date']);
                                                    if($post['thumbnail']=='')
                                                        $th='no-avatar';
                                                    else 
                                                        $th = $post['thumbnail'];
                                                ?>

							  <tr>
                                                    <td>
                                                    
                                                    <p class="popovers" data-container="body" data-html="true" data-trigger="hover" data-placement="top" data-content="آی دی : <?=$post['id']?><br>زمان دقیق ارسال : <?=to_jalali($date)?>" data-original-title="اطلاعات دقیق تر" style="display:inline;">
                                                    <?php 
                                                    if($post['type']=='video') 
                                                        echo '<i class="fa fa-file-video-o"></i>'; 
                                                    else 
                                                        echo '<i class="fa fa-file-text-o"></i>';
                                                    ?>
                                                    </p>
                                                    <img src="../upload/thumbnails/<?=$th?>.jpg"  style="margin-right:10px; margin-top:0px;" width="15" class="img-circle">
                                                    </td>
                                                    <td style="font-weight:bold;"><?=$post['title']?></td>
                                                    <td> <?=substr($post['text'],0,50)?> ...</td>
                                                    <td><?=$post['fname']?> <?=$post['lname']?></td>
                                                    <td><?=date_diff_persion($date)?></td>
                                                    <td>
                                                        <a href='posts_edit?id=<?=$post['id']?>' class="label label-sm label-success"> ویرایش </a>
                                                        <a onclick="return confirm('آیا مطمین هستید?')" href='posts_delete?id=<?=$post['id']?>' class="label label-sm label-danger"> حذف </a>
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