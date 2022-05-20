<div class="wrapper fadeInDown mt-5">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h1>Iniciar Sesión</h1>
    </div>

    <!-- Login Form -->
    <?= $this->Form->create() ?>
    <form>
      <div class="form-group ">
        <input type="email" class="form-control fadeIn second" id="email" name="email" placeholder="Email">
      </div>
      <div class="form-group mt-3">
        <input type="password" class="form-control fadeIn third" id="password" name="password" placeholder="Contraseña">
      </div>

      <button type="submit" class="btn btn-primary mt-4 mb-4 fadeIn fourth">Login</button>
          <?php     
                echo $this->Html->link(
                  'Salir',
                  ['controller' => 'pages', 'action' => 'index', '_full' => true], ['class' => 'btn btn-danger fadeIn fourth ']
                );         
          ?>

       
    </form>
    <?= $this->Form->end() ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</div>