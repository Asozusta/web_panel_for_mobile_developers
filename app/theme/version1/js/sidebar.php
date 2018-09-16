
  <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->

<?php if(isset($_SESSION['id'])) { ?>

              <ul class="sidebar-menu">
<li>
  <a href="dashboard"><img src="<?php echo ASSETS; ?>img/tlg3.png" class="img-responsive"></a>
</li>
                  <li>
                      <a class="" href="dashboard">
                          <i class="icon-dashboard"></i>
                          <span>داشبورد</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="team_list" class="">
                          <i class="icon-group"></i>
                          <span>تیم ها و گروه ها</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                      <a href="project_list" class="">
                          <i class="icon-briefcase"></i>
                          <span>مدیریت پروژه ها</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="task_list" class="">
                          <i class="icon-check"></i>
                          <span>مدیریت وظیفه ها</span>
                      </a>
                  </li>
                
                 <li class="sub-menu">
                      <a href="customer_list" class="">
                          <i class="icon-credit-card"></i>
                          <span>مدیریت مشتریان</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                  <a class="" href="ticket_list">
                   <i class="icon-comments"></i>
                          <span>ارسال و مدیریت پیام ها</span>
                          </a>
                      </li>


                      <li class="sub-menu">
                  <a class="" href="ad1">
                   <i class="icon-truck"></i>
                          <span>فروشگاه ، بازاریابی</span>
                          </a>
                      </li>

<!-- 
                  <li class="sub-menu">
                      <a class="" href="javascript:;">
                          <i class="icon-globe"></i>
                          <span>بازاریابی و تبلیغات</span>
                          <span class="arrow"></span>
                      </a>

                      <ul class="sub">
                          <li><a class="" href="ad1">تبلیغات فیزیکی </a></li>
                          <li><a class="" href="ad2">تبلیغات اینترنتی</a></li>
                          <li><a class="" href="ad3">تبلیغات اس ام اسی </a></li>
                          <li><a class="" href="ad4">تبلیغات تلفنی </a></li>
                          <li><a class="" href="ad5">شبکه های اجتماعی </a></li>

                      </ul>

                  </li> -->


                      
           <!--         <li>
                     <a class="" href="members">
                         <i class="icon-trophy"></i>
                         <span>آمار کاربران و تیم ها</span>
                     </a>
                                    </li> -->       
              
                  <li>
                      <a class="" href="profile_edit">
                          <i class="icon-user"></i>
                          <span>ویرایش پروفایل</span>
                      </a>
                  </li>
              

                   <!-- sidebar menu end-->
<!--              <style>-->
<!--              .sidebarlink a:hover{color:white;}-->
<!--              .blink {-->
<!--  animation: blink-animation 0.4s steps(5, start) 5;-->
<!--  -webkit-animation: blink-animation 0.4s steps(5, start) 5;-->
<!--}-->
<!--@keyframes blink-animation {-->
<!--  to {-->
<!--    visibility: hidden;-->
<!--  }-->
<!--}-->
<!--@-webkit-keyframes blink-animation {-->
<!--  to {-->
<!--    visibility: hidden;-->
<!--  }-->
<!--}-->
<!--              </style>-->
<!--             <div style="position:fixed;bottom:2.5%; right:1.5%;" class="sidebarlink blink">-->
<!--          -->
<!--             <a class="btn btn-sm btn-block" href="javascript:void(0);" onclick="javascript:introJs().setOptions({ 'nextLabel': 'بعد', 'prevLabel': 'قبل', 'skipLabel': 'خروج', 'doneLabel': 'اتمام' }).start();"><i class="icon-bell-alt"></i>  راهنمای این صفحه </a>             -->
<!--             -->
<!--             </div>-->


              </ul>
<?php } else { ?>
             

 <ul class="sidebar-menu">
<li>
  <img src="<?php echo ASSETS; ?>img/tlg3.png" class="img-responsive">
</li>
                  <li>
                      <a class="" href="../">
                          <i class="icon-dashboard"></i>
                          <span>صفحه اصلی</span>
                      </a>
                  </li>

                  <li>
                      <a class="" href="signinup">
                          <i class="icon-user"></i>
                          <span>ورود و ثبت نام</span>
                      </a>
                  </li>

                   <li>
                      <a class="" href="../price">
                          <i class="icon-money"></i>
                          <span>قیمت گذاری</span>
                      </a>
                  </li>
                  
                    <li>
                      <a class="" href="../help">
                          <i class="icon-exclamation"></i>
                          <span>راهنما</span>
                      </a>
                  </li>

                    <li>
                      <a class="" href="../faq">
                          <i class="icon-book"></i>
                          <span>سوالات متداول</span>
                      </a>
                  </li>


                   <li>
                      <a class="" href="../about">
                          <i class="icon-male"></i>
                          <span>درباره ما</span>
                      </a>
                  </li>
                  </ul>

<?php } ?>
          </div>
      </aside>
      <!--sidebar end-->

