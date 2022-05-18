
<body id="perfil" class="mt-4">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="row py-5 px-4"> 
    <div class="col-xl-5 col-md-10 col-xs-6 mx-auto"> 
    <!-- Profile widget --> 
    <div class="bg-white shadow rounded overflow-hidden"> 
        <div class="px-4 pt-0 pb-4 cover"> 
        <div class="media align-items-end profile-head"> 
        <div class="profile mr-3">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="..." width="130" class="rounded mb-2 img-thumbnail"></div> 
    <div class="media-body mb-5 text-white"> 
        <h4 class="mt-0 mb-0"><?=$user->username?></h4> 
        <p class="small mb-4"><i class="fa-solid fa-envelope" style="margin-right: 5px;"></i><?=$user->email?></p> 
    </div> 
    </div> 
</div> 
    
    <div class="bg-light p-4 d-flex justify-content-center text-center"> 
        <ul class="list-inline mb-0">
            
            <div class="row">
            <div class="col-xl-7 col-lg-6 col-md-7 col-xs-6">
                <?php
                $identity = $this->request->getAttribute('authentication')->getIdentity();
                $user_id = $identity['id'];
                    $PostCont = 0;
                        foreach($todosPost as $post): 
                            if($user->id == $post->user_id){
                                $PostCont++;
                            }
                            endforeach;
                ?>
                <li class="list-inline-item">               
                    <h5 class="font-weight-bold mb-0 d-block"><?= $PostCont ?></h5>
                        <small class="text-muted"><i class="fas fa-image mr-1"></i>Posts</small>
                </li> 
            </div>

            <div class="col-xl-5 col-lg-6 col-md-5 col-xs-6">
                <?php
                $CommentCont = 0;
                    foreach($todosComment as $comment): 
                        if($user->id == $comment->user_id){
                            $CommentCont++;
                        }
                        
                        endforeach;
                ?>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><?= $CommentCont ?></h5>
                            <small class="text-muted"><i class="fas fa-user mr-1"></i>Comments</small> 
                    </li> 
            </div>
            </div>
                    <div class="px-4 py-3"> 
                        <h5 class="mb-0">Último comentario</h5>   
                        <div class="p-4 rounded shadow-sm bg-light"> 
                        <?php
                        foreach($comments as $comment): 
                        ?>
                            <p class="mb-0"><?=nl2br($comment->comment);?></p> 
                                <p class="font-italic mb-0"><?=$comment->created?></p>     
                        <?php
                            endforeach;
                        ?> 
                         
                    </div> 
        </div> 

            <div class="row"> 
                    <div class="col-lg-12 pl-lg-1">
                    <h5 class="mb-0">Última Publicación</h5>     
                    <div class="p-4 rounded shadow-sm bg-light"> 
                    <?php
                     foreach($posts as $posts): ?>
                        <p class="mb-0"><?=$posts->tittle ?></p> 
                            <p class="font-italic mb-0"><?=$posts->created?></p>        
                    <?php
                        endforeach;
                    ?>
                </div> 
            </div> 
        </div> 
        </ul> 

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</div>
</body>