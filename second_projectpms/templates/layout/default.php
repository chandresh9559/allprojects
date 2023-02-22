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
<?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css([
       
        //    'cake',
        //    'home',
           'user/bootstrap',
           'user/font-awesome.min',
           'user/responsive',
           'user/style',
           
        
       ]);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <nav class="top-nav">
    <?php 
    echo $this->element('flash/user_navbar')
    ?>
    </nav>
    
    
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
    
    <footer>
        <?php 
        echo $this->element('flash/user_footer')
        ?>
    </footer>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <?= $this->Html->script([
       'user/jquery_plugin',
       'user/validate_plugin',
       'user/script',
    //    'user/custom',
      //   'user/query',
      'user/bootstrap',
      'user/popper.min',
    
      ]);
    ?>
    <script>
     var csrfToken = $('meta[name="csrfToken"]').attr('content');
    </script>
    <?= $this->fetch('script') ?>
</body>
</html>
