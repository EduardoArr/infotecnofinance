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

$cakeDescription = 'Infotecnofinance';
?>
<?php
    $this->loadHelper('Authentication.Identity');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->

    <?= $this->Html->css(['styles']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <?php
                    echo $this->Html->link(
                        'Infotecnofinance',
                    ['controller' => 'pages', 'action' => 'index'], ['class'=> 'navbar-brand']);
                 ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <?php

                    use Authentication\Identity; ?> 
                    <li class="nav-item">
                         <?php
                         echo $this->Html->link(
                            'Inicio',
                            ['controller' => 'pages', 'action' => 'index'], ['class'=> 'nav-link active']);
                        ?>
                    </li>
                    <li class="nav-item">
                    <?php
                        echo $this->Html->link(
                        'Noticias',
                        ['controller' => 'news', 'action' => 'index'], ['class'=> 'nav-link active']);
                        ?>
                    </li>
                    <li class="nav-item">
                    <?php
                    if($this->Identity->isLoggedIn()){
                        $identity = $this->request->getAttribute('authentication')->getIdentity();
                        $user_id = $identity['id'];

                        echo $this->Html->link(
                        'Perfil',
                        ['controller' => 'user', 'action' => 'view', '_full' => true, $user_id], ['class'=> 'nav-link']);
                    }
                    ?>
                    </li>
                    <li class="nav-item">
                    <?php
                         if(!$this->Identity->isLoggedIn()){
                            echo $this->Html->link(
                            'Iniciar Sesión',
                            ['controller' => 'user', 'action' => 'login'], ['class'=> 'nav-link']);
                         }else{
                           echo $this->Html->link(
                            'Cerrar Sesión',
                             ['controller' => 'user', 'action' => 'logout'], ['class'=> 'nav-link']);
                         }
                    
                    ?>
                    </li>
                    <li class="nav-item">
                    <?php
                    if(!$this->Identity->isLoggedIn()){
                        echo $this->Html->link(
                        'Registrarse',
                        ['controller' => 'user', 'action' => 'register', '_full' => true], ['class'=> 'nav-link']);
                    }
                    ?>
                    </li>

                    
                    </ul>
                </div>
            </div>
        </nav>
        
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
</body>
</html>

    