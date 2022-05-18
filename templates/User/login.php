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
      <div class="form-group">
        <input type="email" class="form-control fadeIn second" id="email" name="email" placeholder="Email">
      </div>
      <div class="form-group mt-3">
        <input type="password" class="form-control fadeIn third" id="password" name="password" placeholder="Contraseña">
      </div>

      <div class="row">
        <div class="col-xl-7 col-xs-12">
          <input type="submit" class="fadeIn fourth mt-3" value="Log in">
        </div>

        <div class="col-xl-5 col-xs-12 mb-3" style="margin-top: 12px;">
          <?php     
                echo $this->Html->link(
                  'Salir',
                  ['controller' => 'pages', 'action' => 'index', '_full' => true], ['class' => 'btn btn-danger fadeIn fourth ']
                );         
          ?>
        </div>
      </div>

       
    </form>
    <?= $this->Form->end() ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</div>