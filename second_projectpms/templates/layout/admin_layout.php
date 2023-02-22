<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <?= $this->Html->css([
        'admin/plugins/ekko-lightbox/ekko-lightbox.css',
        'admin/plugins/fontawesome-free/css/all.min',
        'admin/css/adminlte.min',
        'admin/css/custom',
        'admin/plugins/icheck-bootstrap/icheck-bootstrap.min',
        'admin/plugins/summernote/summernote-bs4.min',
        'admin/plugins/daterangepicker/daterangepicker',
        'admin/plugins/overlayScrollbars/css/OverlayScrollbars.min',
        'admin/plugins/jqvmap/jqvmap.min',
        'admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min',
        'admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min',
        'admin/plugins/datatables-responsive/css/responsive.bootstrap4.min',
        'admin/plugins/datatables-buttons/css/buttons.bootstrap4.min',
        
        ]) 
    ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
   
    <main class="main">
        <div class="container-fluid px-0">
            <?= $this->Flash->render() ?>
              <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
       <!-- ==========footer content============ -->
        <?php echo $this->element('admin/admin_footer') ?>
      <!-- ==========footer content============ -->
    </footer>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <?= $this->Html->script([
      
        'admin/plugins/jquery/jquery.min',
        'admin/plugins/datatables/jquery.dataTables.min',
        'admin/plugins/jquery-ui/jquery-ui.min',
        'admin/plugins/bootstrap/js/bootstrap.bundle.min',
        'admin/plugins/chart.js/Chart.min.min',
        'admin/plugins/sparklines/sparkline',
        'admin/plugins/jqvmap/jquery.vmap.min',
        'admin/plugins/jqvmap/maps/jquery.vmap.usa',
        'admin/plugins/jquery-knob/jquery.knob.min',
        'admin/plugins/moment/moment.min',
        'admin/plugins/daterangepicker/daterangepicker',
        'admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min',
        'admin/plugins/summernote/summernote-bs4.min',
        'admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min',
        'admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min',
        'admin/plugins/datatables-responsive/js/dataTables.responsive.min',
        'admin/plugins/datatables-responsive/js/responsive.bootstrap4.min',
        'admin/plugins/datatables-buttons/js/dataTables.buttons.min',
        'admin/plugins/datatables-buttons/js/buttons.bootstrap4.min',
        'admin/plugins/jszip/jszip.min',
        'admin/plugins/pdfmake/pdfmake.min',
        'admin/plugins/pdfmake/vfs_fonts',
        'admin/plugins/datatables-buttons/js/buttons.html5.min',
        'admin/plugins/datatables-buttons/js/buttons.print.min',
        'admin/plugins/datatables-buttons/js/buttons.colVis.min',
        'admin/js/adminlte.js',
        // 'admin/js/demo.js',
        'admin/js/pages/dashboard',
       ]);
    ?>
    
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });

    // function for gallery
    $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })

  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
    </script>
    <?= $this->fetch('script') ?>
</body>
</html>
