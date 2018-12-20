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
</aside>s
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
  <div class="box">
      <h3 class="title is-3">AVATAR</h3>
<?php echo form_open_multipart('usuarios/actualizar_avatar');?>
<div class="field">

     <div class="control">
<input type="file" name="userfile" size="20" />
</div>
</div>


<input type="submit" value="Actualizar" />

</form>
</div>
<div class="box">
<h3 class="title is-3">DATOS PERFIL</h3>
<?
      $formulario = array(
        'name'      => 'actualizar_perfil',
        'id'        => 'actualizar_perfil',
        'class'     => 'form',

      );
      echo form_open('usuarios/actualizar_perfil', $formulario);

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

      echo '<div class="field">';

      echo '<div class="control">';
      $email = array(
            'name'          => 'email',
            'id'            => 'email',
            'placeholder'         => 'Email',
            'maxlength'     => '50',
            'class' => 'input',

    );
      echo form_input($email);
      echo '</div>';
      echo '</div>';

      echo '<div class="field">';

      echo '<div class="control">';
      $twitter = array(
            'name'          => 'twitter',
            'id'            => 'twitter',
            'placeholder'         => '@TuTwitter',
            'maxlength'     => '100',
            'class' => 'input',

    );
      echo form_input($twitter);
      echo '</div>';
      echo '</div>';

      echo '<div class="field">';

      echo '<div class="control">';
      $web = array(
            'name'          => 'web',
            'id'            => 'web',
            'placeholder'         => 'https://...',
            'maxlength'     => '100',
            'class' => 'input',

    );
      echo form_input($web);
      echo '</div>';
      echo '</div>';

      $forma_boton = array(
        'name' => 'botonregistrar',
        'value' => 'Enviar',
        'class' => 'button is-primary',
        'type' => 'submit',

      );
      echo form_button($forma_boton, 'Actualizar datos');
          echo form_close();
      ?>
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