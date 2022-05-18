


<div class="wrapper fadeInDown mt-5">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h1>Registrarse</h1>
    </div>
    <?= $this->Form->create($user) ?>
    <div class="form-row">
  <div class="form-group">
    <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
  </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-4 mb-4">Registrar</button>

  <?php     
      echo $this->Html->link(
        'Salir',
          ['controller' => 'pages', 'action' => 'index', '_full' => true], ['class' => 'btn btn-danger ']
          );         
  ?>

  </div>
    <?= $this->Form->end() ?>
  </div>
</div>  
    <p class="text-center">Tienes una cuenta?  <?php
      echo $this->Html->link(
          'Login in',
      ['controller' => 'user', 'action' => 'login'], ['class'=> 'nav-link']);      
      ?></p>  
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</div> 