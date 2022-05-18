<!-- Page Header-->

<?php
    $this->loadHelper('Authentication.Identity');
?>

<header class="masthead" style="background-image: url('<?php echo $this->Url->image('news.jpg');?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>NOTICIAS</h1>
                            <h2 class="subheading"></h2>    
                            <span class="meta">
                            
                            </span>
                        </div>
                    </div>
                </div>
            </div>
</header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <!-- ROW -->
                <div class="row gx-4 gx-lg-5 justify-content-center">
                        <?= $this->Form->create() ?>
                        <select name = "categorias" class="btn btn-outline-secondary dropdown-toggle mb-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                            $cont = 1;
                                            foreach($category as $categorys):   
                                        ?> 
                                            <option value ="<?=$cont?>" name ="<?=$cont?>"><?=h($categorys)?></option>
                                        <?php 
                                            $cont++;
                                            endforeach;
                                        ?>
                                        <option selected="true" value ="4" name ="4">Categorías</option>
                            
                        </select>
                        
                                <button class="btn btn-primary mb-4" name="submit" type="submit" value ="submit">
                                    <i class="fa fa-search"></i>
                                </button> 
                            <?= $this->Form->end() ?>

                        <?php 
                            if($this->Identity->isLoggedIn()){
                                $identity = $this->request->getAttribute('authentication')->getIdentity();
                                $admin = $identity['rol'];
                                if($admin == 'admin'){
                                    echo $this->Html->link(
                                        'Crear Noticia',
                                        ['controller' => 'news', 'action' => 'add', '_full' => true], ['class' => 'btn btn-primary btn-lg']
                                    );
                                }
                            }
                        ?>
                        
                        
                    <!-- if categorias -->
                    
                    <?php  foreach ($news as $new): ?>

                        <?php if(empty($_POST['categorias'])){ ?>
                            <div class=" col-sm-6 col-lg-4 col-xl-3 col-xs-12 mx-4 mt-3">               
                                <div class="card" style="width: 20rem;">
                                        <?= $this->Html->image($new->image, array('width' => 320, 'height' => 160), ['class' => 'card-img-top']);?>
                                        <div class="card-body">
                                            <h5>
                                            <?= $this->Html->link(
                                                h($new->title),
                                                ['controller'=>'news', 'action' => 'view', 'class' => 'card-title', $new->id]
                                            ) ?>
                                            </h5>
                                        </div>
                                        
                                    <div class="row">
                                        <div class="col-1">
                                            <?php
                                                if($this->Identity->isLoggedIn()){
                                                    if($admin == 'admin'){ 
                                                        echo $this->Form->postLink(
                                                            '<span class="fa-solid fa-trash"></span><span class="sr-only">' . __('View') . '</span>',
                                                            ['controller' => 'news', 'action' => 'delete', $new->id],
                                                            ['confirm' => __('Seguro que quieres borrar?',  $new->title),'escape' => false]
                                                        );
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="col-1">
                                            <?php
                                                if($this->Identity->isLoggedIn()){
                                                    if($admin == 'admin'){ 
                                                        echo $this->Form->postLink(
                                                            '<span class="fa-solid fa-pen"></span><span class="sr-only">' . __('View') . '</span>',
                                                            ['controller' => 'news', 'action' => 'edit', $new->id],
                                                            ['escape' => false]
                                                        );
                                                    }
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>   
                            </div>   

                        <?php }?>

                         <?php if($_POST['categorias'] == $new->category_id){?>  
                            <div class=" col-sm-6 col-lg-4 col-xl-3 col-xs-12 mx-4 mt-3">               
                                <div class="card" style="width: 20rem;">
                                        <?= $this->Html->image($new->image, array('width' => 320, 'height' => 160),['class' => 'card-img-top']);?>
                                        <div class="card-body">
                                            <h5>
                                            <?= $this->Html->link(
                                                h($new->title),
                                                ['controller'=>'news', 'action' => 'view', 'class' => 'card-title', $new->id]
                                            ) ?>
                                            </h5>
                                        </div>
                                        
                                    <div class="row">
                                        <div class="col-1">
                                            <?php
                                                if($this->Identity->isLoggedIn()){
                                                    if($admin == 'admin'){ 
                                                        echo $this->Form->postLink(
                                                            '<span class="fa-solid fa-trash"></span><span class="sr-only">' . __('View') . '</span>',
                                                            ['controller' => 'news', 'action' => 'delete', $new->id],
                                                            ['confirm' => __('Seguro que quieres borrar?',  $new->title),'escape' => false]
                                                        );
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="col-1">
                                            <?php
                                                if($this->Identity->isLoggedIn()){
                                                    if($admin == 'admin'){ 
                                                        echo $this->Form->postLink(
                                                            '<span class="fa-solid fa-pen"></span><span class="sr-only">' . __('View') . '</span>',
                                                            ['controller' => 'news', 'action' => 'edit', $new->id],
                                                            ['escape' => false]
                                                        );
                                                    }
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>   
                            </div>   
                         <?php }elseif($_POST['categorias'] == '4'){ ?>
                            <div class=" col-sm-6 col-lg-4 col-xl-3 col-xs-12 mx-4 mt-3">               
                                <div class="card" style="width: 20rem;">
                                        <?= $this->Html->image($new->image, array('width' => 320, 'height' => 160), ['class' => 'card-img-top']);?>
                                        <div class="card-body">
                                            <h5>
                                            <?= $this->Html->link(
                                                h($new->title),
                                                ['controller'=>'news', 'action' => 'view', 'class' => 'card-title', $new->id]
                                            ) ?>
                                            </h5>
                                        </div>
                                        
                                    <div class="row">
                                        <div class="col-1">
                                            <?php
                                                if($this->Identity->isLoggedIn()){
                                                    if($admin == 'admin'){ 
                                                        echo $this->Form->postLink(
                                                            '<span class="fa-solid fa-trash"></span><span class="sr-only">' . __('View') . '</span>',
                                                            ['controller' => 'news', 'action' => 'delete', $new->id],
                                                            ['confirm' => __('Seguro que quieres borrar?',  $new->title),'escape' => false]
                                                        );
                                                    }
                                                }
                                            ?>
                        
                                        </div>
                                        <div class="col-1">
                                            <?php
                                                if($this->Identity->isLoggedIn()){
                                                    if($admin == 'admin'){ 
                                                        echo $this->Form->postLink(
                                                            '<span class="fa-solid fa-pen"></span><span class="sr-only">' . __('View') . '</span>',
                                                            ['controller' => 'news', 'action' => 'edit', $new->id],
                                                            ['escape' => false]
                                                        );
                                                    }
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>   
                            </div>   
                        <?php }?>
                    <?php endforeach; ?>
                </div>     
            </div>
        </article>
                   
        <!-- Footer-->
     <footer class="border-top mt-3">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Infotecnofinance 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
