</div>
        </div>


        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; پیاده سازی توسط 
                <a target="_blank" href="http://faridfr.ir" style="color:white;">فرید فروزان</a>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
            
            <!--[if lt IE 9]>
<script src="<?php echo ASSETS;?>global/plugins/respond.min.js"></script>
<script src="<?php echo ASSETS;?>global/plugins/excanvas.min.js"></script> 
<script src="<?php echo ASSETS;?>global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
            <!-- BEGIN CORE PLUGINS -->
            <script src="<?php echo ASSETS;?>global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<?php if(isset($sort)) { ?>
            <script src="<?php echo ASSETS;?>global/plugins/jquery-nestable/jquery.nestable-rtl.js" type="text/javascript"></script>
<?php } ?>

             <!--<script src="<?php echo ASSETS;?>global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script> -->


    
            <!-- END CORE PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?php echo ASSETS;?>global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->

            <!--  <script src="<?php echo ASSETS;?>pages/scripts/form-dropzone.min.js" type="text/javascript"></script> -->

            <script src="<?php echo ASSETS;?>js/jquery.fileuploader.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>js/custom.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>js/angular.js"></script>
            <script src="js/header.js?<?= filemtime('js/header.js') ?>"></script>

            

<?php if(isset($sort)) { ?>
            <script src="<?php echo ASSETS;?>pages/scripts/ui-nestable.min.js" type="text/javascript"></script>
<?php } ?>

            <!-- BEGIN THEME LAYOUT SCRIPTS -->
           
<!-- 
        <script src="<?php echo ASSETS;?>js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo ASSETS;?>js/bootstrap-datepicker.fa.min.js"></script>
 -->
      <!--   <script type="text/javascript" src="<?php echo ASSETS;?>assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS;?>assets/data-tables/DT_bootstrap.js"></script> -->



<script src="<?php echo ASSETS;?>global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>pages/scripts/form-repeater.min.js" type="text/javascript"></script>

<script src="<?php echo ASSETS;?>global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo ASSETS;?>global/scripts/app.min.js" type="text/javascript"></script>
 <script src="<?php echo ASSETS;?>pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>


        <script src="<?php echo ASSETS;?>js/offline.js"></script>

<script src="<?php echo ASSETS;?>js/lightbox.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/intro.js"></script>
<script src="<?php echo ASSETS;?>js/select2.full.min.js"></script>



 <script src="<?php echo ASSETS;?>layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            
            <script src="<?php echo ASSETS;?>global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/flot/jquery.flot.stack.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/flot/jquery.flot.crosshair.min.js" type="text/javascript"></script>
            <script src="<?php echo ASSETS;?>global/plugins/flot/jquery.flot.axislabels.js" type="text/javascript"></script>
            
             <script src="<?php echo ASSETS;?>pages/scripts/charts-flotcharts.js" type="text/javascript"></script>




            <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>


 <?php
  $pdo = Database::disconnect();
  ?>