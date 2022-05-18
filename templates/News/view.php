<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<!-- Page Header-->
    <?php  
        $i = 1;
        foreach($category as $categorys):   
        if($news->category_id == $i){
            if($categorys == "Mercado"){    
    ?> 
            <header class="masthead" style="background-image: url('<?php echo $this->Url->image('Mercado.jpg');?>')">
                        <div class="container position-relative px-4 px-lg-5">
                            <div class="row gx-4 gx-lg-5 justify-content-center">
                                <div class="col-md-10 col-lg-8 col-xl-7">
                                    <div class="post-heading">        
                                        <h1>Mercado Financiero</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
            </header>
    <?php
        }
        if($categorys == "Criptomonedas"){
    ?>
            <header class="masthead" style="background-image: url('<?php echo $this->Url->image('criptomonedas.jpg');?>')">
                        <div class="container position-relative px-4 px-lg-5">
                            <div class="row gx-4 gx-lg-5 justify-content-center">
                                <div class="col-md-10 col-lg-8 col-xl-7">
                                    <div class="post-heading">        
                                        <h1><?= h($categorys)?> </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
            </header>

    <?php
        }
        if($categorys == "Blockchain"){
    ?>
                <header class="masthead" style="background-image: url('<?php echo $this->Url->image('blockchain.jpg');?>')">
                        <div class="container position-relative px-4 px-lg-5">
                            <div class="row gx-4 gx-lg-5 justify-content-center">
                                <div class="col-md-10 col-lg-8 col-xl-7">
                                    <div class="post-heading">        
                                        <h1><?= h($categorys)?> </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
            </header>
    <?php
        }
    }
            $i++;
            endforeach;
    ?>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12" style="overflow: hidden;">
                                <h2 class="section-heading mb-5"><?= h($news->title) ?></h2>
                                <?= $this->Html->image($news->image, ['width' => '100%']);?>
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-8">
                        <p><?= nl2br($news->content) ?></p> 
                        <p>Creado <?= h($news->created)?></p>   
                    </div>
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
