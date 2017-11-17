<?php $this->load->view('Template/header');?>
<?php $this->load->view('Template/sidebar');?>
<?php include 'sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <?php $this->load->view($page);?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <?php include 'footer.php';?>
