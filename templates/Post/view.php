<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */

use App\Controller\CommentController;
use App\Model\Entity\Comment;
use App\Model\Table\CommentTable;

?>
<?php
    $this->loadHelper('Authentication.Identity');
?>
 <!-- Page Header-->
 <header class="masthead" style="background-image: url('<?php echo $this->Url->image($post->image);?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h2><?= h($post->brief) ?></h2>   
                            <span class="meta">
                            Posted by
                                <?php 
                                foreach($users as $user):
                                if($user->id == $post->user_id){
                                    echo $user->username;
                                }
                                    endforeach;?>
                            on <?= h($post->created) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
            <h2 class="section-heading mb-5"><?= h($post->tittle) ?></h2>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-12">
                        <p style="line-height: 40px"><?php echo preg_replace("/[\r\n|\n|\r]+/", "<br>", h($post->content));?></p>   
                    </div>
                    <hr>
                    <div class="col-12">
                        <?php
                        if($this->Identity->isLoggedIn()){   
                            $identity = $this->request->getAttribute('authentication')->getIdentity();
                            $email = $identity['email']; 
                            $user_id = $identity['id'];
                        ?>
                        <?= $this->Form->create($comments, ['url' => ['controller' =>'comment', 'action' => 'add', $post->id, $user_id, $email]]) ?>
                            
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comentarios</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <br>

                        <?php
                                echo $this->Form->submit(
                                    'Comentar',
                                    ['class' => 'btn btn-primary']
                                );   
                            }
                        ?>
                         <?= $this->Form->end() ?>    
                    </div>                          
                </div>  
            
            </div>

        </article>

     


<div class="container">
<div class="row">
    <?php foreach($comments as $comment):?>
    <div class="col-md-12">
        <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <?php foreach($users as $user):
                        if($comment->user_id == $user->id){
                ?>
                <h5 class="h5 g-color-gray-dark-v1 mb-0"><?=$user->username?></h5>
                <?php 
                    } 
                    endforeach;
                ?>
                <span class="g-color-gray-dark-v4 g-font-size-12"><?= $comment->created ?></span>
              </div>
        
              <p style="line-height: 40px"><?php echo preg_replace("/[\r\n|\n|\r]+/", "<br>", h($comment->comment)); ?></p>
        
              <ul class="list-inline d-sm-flex my-0">
               
                <li class="list-inline-item ml-auto">
                  
                <?php
                 if($this->Identity->isLoggedIn()){
                    $rol = $identity['rol'];
                    
                    if($rol == 'admin' || $rol == 'users'){ 
                        if($comment->user_id == $user_id || $rol == 'admin'){  
                             echo $this->Form->postLink(
                                '<span class="fa-solid fa-trash"></span><span class="sr-only">' . __('View') . '</span>',
                                ['controller' => 'comment', 'action' => 'delete', $comment->id],
                                ['confirm' => __('Seguro que quieres borrar?'),'escape' => false]
                             );
                        }
                    }
                }
                ?>
                </li>
              </ul>
            </div>
        </div>
    </div>
    
    <?php   
        endforeach; 
    ?>

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
