<?php 
require("../app/config.php");
auth ('foruser',basename(__FILE__,".php"));
require "..".THEME."header.php";
$sort = 1;
$posts = get_posts();
?>

         <div class="row">
            <div class="col-md-12">
					
				<div class="portlet light ">
                                <div class="portlet-title" style="margin-bottom:0px; padding-top:0px;">
                                    <div class="caption">
                                       تغییر ترتیب محتواها <div class="btn-group btn-group-devided">
                                        </div>
                                    </div>
                                   
                                    <div class="tools"> </div>
                                     <div class="actions">
                                         <a href="posts_list" class="btn btn-xs btn-outline green-meadow">بازگشت</a>
                                    </div>

                                </div>
                                <div class="portlet-body" style="padding-top:0px;">
                                   
                                    <div class="row" style="padding-top:0px;">
                                       <div class="alert alert-info" style="margin-bottom:40px; margin-top:0px; text-align:center; color:black; font-size:11px;">
                                            <p> <i class="fa fa-mouse-pointer"></i> برای جابجایی محتواها از موس کمک بگیرید و محتوایی را درون محتوای دیگر نیندازید ( دقیقا زیر یکدیگر باشند )</p>
                                        </div>
                                   <div class="col-sm-3"></div>
                                   <div class="col-sm-6">

                                        <textarea id="nestable_list_1_output" class="form-control col-md-12 margin-bottom-10" style="display:none;"></textarea>


                                        <button class="btn btn-sm btn-success" style="width:100%; margin-bottom:10px;" onclick="event.preventDefault(); change_sort();" id="changesortbutton">ذخیره ترتیب</button>


                                    <div class="dd" id="nestable_list_1">
                                            <ol class="dd-list">

                                                <?php 
                                                foreach ($posts as $post) {
                                                    $date = date("Y-m-d H:i:s", $post['date']);
                                                    if($post['thumbnail']=='')
                                                        $th='no-avatar';
                                                    else 
                                                        $th = $post['thumbnail'];
                                                ?>


                                                <li class="dd-item tooltips" data-container="body" style="margin-bottom:8px; border:0px;" data-placement="left" data-original-title=" Database ID : <?=$post['id']?>" data-id="<?=$post['id']?>">
                                                    <div class="dd-handle"> <?php 
                                                    if($post['type']=='video') 
                                                        echo '<i style="margin-left:5px;" class="fa fa-file-video-o"></i>'; 
                                                    else 
                                                        echo '<i style="margin-left:5px;" class="fa fa-file-text-o"></i>';
                                                    ?>
                                                    <img src="../upload/thumbnails/<?=$th?>.jpg"  style="margin-right:0px; margin-left:10px; margin-top:0px;" width="15" class="img-circle">
                                                    <b><?=$post['title']?></b><span class='pull-right' style='font-weight:300;'><?=date_diff_persion($date)?></span></div>
                                                </li>

                                                <?php } ?>
                                                
                                            </ol>
                                        </div>




                                   </div>
                                   <div class="col-sm-3"></div>
</div>
                                            
							
                                   
                                </div>
                            </div>



                        </div>

                      
         </div>
            
<script src="js/change_sort.js"></script>

<?php
require "..".THEME."footer.php";
?>