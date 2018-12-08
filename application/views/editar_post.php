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
  <div style="padding: 5px; z-index:1;">
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
    <!-- CONTENIDO CENTRAL -->
    <?php foreach($datos as $dato) : ?>
      <form action="<?php echo base_url('index.php/posts/editar/'.$dato['id'].''); ?>" class="form" method="post">
      <div class="field">
<input class="input" name="titulo" value="<?=$dato['titulo']?>">
</div>
<div class="field">
  <div class="control has-icons-left">
    <div class="select">
      <select name="categoria">
      <option value="<?=$dato['categoria']?>">No modificable</option>
      </select>
    </div>
    <div class="icon is-small is-left">
    <i class="fas fa-caret-square-right"></i>   
     </div>
  </div>
</div>

<div class="filed">
    <textarea id="summernote" class="summernote" name="contenido" value="<?=$dato['contenido']?>"></textarea>
</div><br>
<div class="field">
    <input type="tags" name="tags" placeholder="Nuevo tag" value="<?=$dato['tags']?>">
</div>
<br>
<div class="field">
<button type="submit" class="button is-primary">Guardar</button>
</div>
      </form>
     <script>
         
         $('#summernote').summernote({
    height: ($(window).height() - 300),
    code: '<b>Hola</b>',
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
    callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
    }
});
$('.summernote').summernote('code', '<?=$dato['contenido']?>');

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
      <?php endforeach; ?>    
      </div>
             </div>
            </div>
          </div>

        </div>
        </div>

