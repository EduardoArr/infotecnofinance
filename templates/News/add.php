<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 * @var \Cake\Collection\CollectionInterface|string[] $category
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
            <?= $this->Form->create($news, ['type' => 'file']) ?>
                <h3>Crear Noticia</h3>  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="title" name="title" type="text" placeholder="Título"/>    
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" id="image_file" name="image_file">
                        </div>
                        <div class="form-group">
                            <select id="category_id" name="category_id" class="form-control">
                                    <?php  
                                    $i = 1;
                                    foreach($category as $categorys):
                                    ?>
                                    <option value='<?=$i?>'><?= h($categorys)?></option>
                                    <?php 
                                    $i++;
                                    endforeach; 
                                    ?>
                            </select>    
                        </div> 
                        <div class="form-group mt-3">
                            <button  type="submit" class="btn btn-primary text-uppercase">Enviar</button> 
                        </div>                  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">                      
                            <textarea class="form-control" id="content" name="content" style="width: 100%; height: 175px;" placeholder="Contenido"></textarea>
                        </div>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body> 
<!-- 
