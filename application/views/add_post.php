<div class="container">
<div class="columns">
  <div class="column is-3">
    <!-- MENU LATERAL -->
      <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a>Dashboard</a></li>
    <li><a>Configuración</a></li>
  </ul>
  <p class="menu-label">
    Usuarios
  </p>
    <ul class="menu-list">
      <li><a>Crear usuario</a></li>
      <li><a>Lista de usuarios</a></li>
      <li><a>Lista negra</a></li>
    </ul>

      <p class="menu-label">
        Blog
      </p>
      <ul class="menu-list">
        <li><a href="<?php echo base_url('index.php/posts/addpost'); ?>">Crear post</a></li>
        <li><a>Lista de posts</a></li>
        <li><a>Categorías</a></li>
      </ul>

  </ul>
  <p class="menu-label">
    Cuenta
  </p>
  <ul class="menu-list">
    <li><a>Modificar datos</a></li>
    <li><a>Mi perfil</a></li>
  </ul>
</aside>
  </div>
  <div class="column is-9">
    <!-- CONTENIDO CENTRAL -->

      <?
        if ($this->session->userdata('logged_in')) {
      $formulario = array(
        'name'      => 'addpost',
        'id'        => 'addpost',
        'class'     => 'form',

      );
      echo form_open('posts/addpost', $formulario);
      echo '<div class="field">';
      $titulo = array(
            'name'          => 'titulo',
            'id'            => 'titulo',
            'placeholder'         => 'Título del post',
            'maxlength'     => '255',
            'class' => 'input',

    );
      echo form_input($titulo);
      echo '</div>'; ?>
      <div class="field">
  <div class="control has-icons-left">
    <div class="select">
      <select name="categoria">
<?php if (!empty($categorias)) : ?>
		<?php foreach($categorias as $cate) : ?>

        <option value="<?=$cate->id?>"><?=$cate->nombre?></option>
        <?php endforeach; ?>
    <?php else : ?>
    <option value="0">Sin categorias</option>
    <?php endif; ?>
      </select>
    </div>
    <div class="icon is-small is-left">
    <i class="fas fa-caret-square-right"></i>   
     </div>
  </div>
</div>

      <?
      $contenido = array(
        'name' => 'contenido',
        'id' => 'summernote',
      );
      echo form_textarea($contenido);
  
      echo '<br><div class="field">';
      $tags = array (
        'name' => 'tags',
        'id' => 'tags',
        'maxlength' => '255',
        'placeholder' => 'tags',
        'class' => 'input',
        'type' => 'tags',
      );
      echo form_input($tags);
      echo '</div><br>';

      $forma_boton = array(
        'name' => 'botonregistrar',
        'value' => 'Enviar',
        'class' => 'button is-primary',
        'type' => 'submit',

      );
      echo form_button($forma_boton, 'Enviar');
          echo form_close();

        } else {
          
          redirect('usuarios/login', 'refresh');


        }
      ?>
            
                
             </div>
            </div>
          </div>

        </div>
        </div>
