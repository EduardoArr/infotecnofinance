<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 * @var string[]|\Cake\Collection\CollectionInterface $category
 */
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body id="CrearPost">
    <div class="container contact-form"  style="margin-top: 200px;">
        <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
        </div>
            <?= $this->Form->create($post, ['type' => 'file']) ?>
                <h3>Editar Noticia</h3>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="tittle" name="tittle" value="<?= h($post->tittle) ?>" type="text"/> 
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="brief" name="brief" value="<?= h($post->brief) ?>" type="text"/> 
                        </div>
                        <div class="form-group">
                            
                            <input class="form-control" type="file" id="image_file" name="image_file">
                           
                        </div> 
                        <div class="form-group mt-3">
                            <button  type="submit" class="btn btn-primary text-uppercase">Enviar</button> 
                        </div>                  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">                      
                            <textarea class="form-control" id="content" name="content" style="width: 100%; height: 175px;"><?= h($post->content)?></textarea>
                        </div>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body> 
<!-- 
