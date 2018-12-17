<div class="container">
<div class="columns">
  <div class="column is-3">
    <!-- MENU LATERAL -->
    <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
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
        <li><a href="<?php echo base_url('posts/addpost'); ?>">Crear post</a></li>
        <li><a>Lista de posts</a></li>
        <li><a href="<?php echo base_url('posts/crear_categoria'); ?>">Categorías</a></li>
      </ul>

  </ul>
  <p class="menu-label">
    Perfil
  </p>
  <ul class="menu-list">
    <li><a href="<?php echo base_url('usuarios/perfil'); ?>">Modificar datos</a></li>
  </ul>
</aside>
  </div>
  <div class="column is-9">
  <div style="padding: 5px; z-index:1;">

    <!-- CONTENIDO CENTRAL -->

  <?
  if($this->session->flashdata('error')) {

    echo '<div class="notification is-danger">
  <button class="delete"></button>
';
  echo $this->session->flashdata('error');
  echo '</div>';
}
  ?>
  <?
  if($this->session->flashdata('afirmacion')) {

    echo '<div class="notification is-success">
  <button class="delete"></button>
  ';
  echo $this->session->flashdata('afirmacion');
  echo '</div>';
  }

  ?>




      <?
      $formulario = array(
        'name'      => 'crear_categoria',
        'id'        => 'crear_categoria',
        'class'     => 'form',

      );
      echo form_open('posts/crear_categoria', $formulario);
      echo '<div class="field">';

      echo '<div class="control">';
      $usuario = array(
            'name'          => 'nombre',
            'id'            => 'nombre',
            'placeholder'         => 'Nombre categoría',
            'maxlength'     => '50',
            'class' => 'input',

    );
      echo form_input($usuario);
      echo '</div>';
      echo '</div>';

      echo '<div class="field">';

      echo '<div class="control">';
      $descripcion = array(
            'name'          => 'descripcion',
            'id'            => 'descripcion',
            'placeholder'         => 'Descripción de la categoria...',
            'maxlength'     => '300',
            'class' => 'textarea',

    );
      echo form_textarea($descripcion);
      echo '</div>';
      echo '</div>';

      $forma_boton = array(
        'name' => 'botonregistrar',
        'value' => 'Enviar',
        'class' => 'button is-primary',
        'type' => 'submit',

      );
      echo form_button($forma_boton, 'Crear categoría');
          echo form_close();
      ?>
      <br>

      <nav class="panel">
  <p class="panel-heading">
    Lista de categorías
  </p>

  <?php if (!empty($categorias)) : ?>
		<?php foreach($categorias as $cate) : ?>
        <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-caret-square-right" aria-hidden="true"></i>
    </span>
    <?=$cate['nombre']?>
  </a>
        <?php endforeach; ?>
    <?php else : ?>
    <a class="panel-block">
    <span class="panel-icon">
      <i class="fas fa-book" aria-hidden="true"></i>
    </span>
Sin categorías
  </a>    <?php endif; ?>
 
</nav>
            
      </div>
             </div>
            </div>
          </div>

        </div>
        </div>
<script>
  $('#summernote').summernote({
    height: ($(window).height() - 300),
    toolbar: [
    ['style',['style']],
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['codeview', ['codeview']],
    ['insert',['picture', 'link', 'emoji']]
  ],
    placeholder: '¿Qué quieres contar?',
    callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
    }
});

function uploadImage(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        url: '<?php echo base_url('index.php/posts/subir_imagen'); ?>',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(url) {
            var image = $('<img>').attr('src', '' + url);
            $('#summernote').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

  </script>