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

$cakeDescription = 'Famms: Buy From the Best Seller in India';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css([
       
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
    <?php echo $this->element('flash/hero_area')?>
    </nav>
    
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    
    <footer>
        <?php echo $this->element('flash/index_footer')?>
    </footer>

    <?= $this->Html->script([
       
        'user/jquery-3.4.1.min',
        'user/bootstrap',
        'user/custom',
        'user/popper.min',
    
      ]);
    ?>
    <?= $this->fetch('script') ?>
</body>
</html>
