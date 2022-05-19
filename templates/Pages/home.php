<?php
    $this->loadHelper('Authentication.Identity');
?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo $this->Url->image('Home.jpg');?>')"> 
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Publicaciones</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container">
            <div class="row">
                
                <?php 
                     echo $this->Html->link(
                         '¿Qué estás pensando?',
                         ['controller' => 'post', 'action' => 'add', '_full' => true], ['class' => 'btn btn-primary btn-lg ']
                     );
                ?>
   
                <div class="row">       
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12 mt-5">
                        <!-- Post preview-->                       
                            <?php 
                            foreach ($post as $post): ?>
                            <div class="post-preview mt-4">
                                <div class="row">
                                    <div class=" col-xs-12 col-md-6">
                                        <h2>
                                        <?= $this->Html->link(
                                            nl2br($post->tittle),
                                            ['controller'=>'post', 'action' => 'view', 'class' => 'post-title', $post->id]
                                        ) ?>
                                        </h2>
                                        <h3 class="post-subtitle"> <?=h($post->brief)?></h3>
                                        <p class="post-meta">
                                            Creado por
                                                <?php 
                                                foreach($users as $user):
                                                if($user->id == $post->user_id){
                                                    echo $user->username;
                                                }
                                                    endforeach;?>
                                            el <?= h($post->created) ?>
                                        </p>
                                    </div>
                                    <div class=" col-xs-12 col-md-6">
                                        <?php if(!$post->isEmpty('image')){?>
                                            <?= $this->Html->image($post->image, array('width' => 395, 'height' => 265, 'class' => 'imagenHome')) ?>
                                        <?php
                                        }
                                        ?>
                                    </div>   

                                    <div class="col-xs-12">
                                    <?php 
                                        if($this->Identity->isLoggedIn()){          
                                            $identity = $this->request->getAttribute('authentication')->getIdentity();
                                            $user_id = $identity['id'];
                                            $admin = $identity['rol'];
                                            if($user_id == $post->user_id || $admin == 'admin'){
                                                 echo $this->Form->postLink(
                                                    '<span class="fa-solid fa-trash" style="margin-left: 20px; margin-right: 20px; margin-top: 10px"></span><span class="sr-only">' . __('View') . '</span>',
                                                    ['controller' => 'post', 'action' => 'delete', $post->id],
                                                    ['confirm' => __('Seguro que quieres borrar?', $post->tittle),'escape' => false]
                                                 );

                                                 echo $this->Form->postLink(
                                                    '<span class="fa-solid fa-pen" style="margin-right: 20px;"></span><span class="sr-only">' . __('View') . '</span>',
                                                    ['controller' => 'post', 'action' => 'edit', $post->id],
                                                    ['escape' => false]
                                                );
                                            }                 
                                                
                                                $cont = 0;
                                                $boolean = false;

                                                foreach($likes as $like){
                                                   
                                                    if($post->id == $like->idPost && $user_id == $like->idUser){
                                                       $boolean = true;
                                                       break;
                                                    }  
                                                    
                                                      
                                                }  
                                                foreach($likes as $valor){
                                                    if($post->id == $valor->idPost){
                                                        $cont++;
                                                    }  
                                                } 

                                                if($boolean){
                                                    echo $this->Form->postLink(
                                                        '<span class="fa-solid fa-heart"></span><span class="sr-only">' . __('View') . '</span>',
                                                        ['controller' => 'likes', 'action' => 'delete', $like->idLike],
                                                        ['escape' => false]    
                                                    );
                                                  
                                                }else{
                                                    echo $this->Form->postLink(
                                                        '<span class="fa-regular fa-heart like"></span><span class="sr-only">' . __('View') . '</span>',
                                                        ['controller' => 'likes', 'action' => 'add', $post->id, $user_id],
                                                        ['escape' => false]
                                                    );
                                                }

                                                echo ' ' .$cont;
                                                
                                                
                                              
                                        }
                                    ?>  
                                    </div>
                                </div> 
                            </div>
                            <hr>
                            <?php endforeach; ?>
                    </div>
                  
                      
            </div>
        </div>

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
</html>
