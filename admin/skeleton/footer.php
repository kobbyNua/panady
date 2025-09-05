<!-- Footer -->
<footer class="footer text-center">
    © <?php echo date('Y'); ?> Admin Lite by YourCompany
</footer>

<!-- Base JS Files for Admin Lite -->


        <!-- AdminLTE JS, Bootstrap JS, and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
<script src="/panady/assets/dist/js/app.min.js"></script>

 <script src="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/dist/js/adminlte.js"></script>
 <script type="module" src="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/data/categoryData.js"></script>
 <script type="module" src="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/data/articlesData.js"></script>
 <script type="module" src="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/data/contentData.js"></script>
 <script type="module" src="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/data/teamData.js"></script>
 <script type="module" src="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/data/mediaData.js"></script>
  <script>
       $(document).ready(function(){
           $('.skip-links').hide()
              
       })              

  </script>

<!--<script src="/panady/admin/assets/plugins/jquery/jquery.min.js"></script>
<script src="/panady/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>

