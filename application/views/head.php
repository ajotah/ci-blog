<!DOCTYPE html>
<html lang="es" dir="ltr" class="has-navbar-fixed-top">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
     <!--   Archivos CSS     -->
<script defer src="<?php echo base_url('bulma/index.js'); ?>"></script>
<script defer src="<?php echo base_url('bulma/summernote-ext-emoji-ajax.js'); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bulma/bulma.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bulma/summernote-ext-emoji-ajax.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bulma/tagscss/bulma-tagsinput.min.css'); ?>">
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">


<style>
html {}
.box2 {
  margin-top: 5rem;
}
.avatar {
  margin-top: -70px;
}
.avatar img {
  padding: 5px;
  background: #fff;
  border-radius: 50%;
  -webkit-box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
  box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);
}
</style>

<!-- Fin de archivos CSS   -->

  </head>
  <body>
    <header>
      <div class="container">
      <div class="columns">

      <!-- Columna Izquierda -->
      <div class="column is-8 is-offset-2 is-offset-one-quarter">
        <nav class="navbar is-light is-fixed-top">
          <div class="navbar-brand">

            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>

          <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item" href="<?php echo base_url('index.php/'); ?>">
                Inicio
              </a>
              <a class="navbar-item" href="https://bulma.io/">
                Proyectos
              </a>

              </div>
            </div>

            <div class="navbar-end">
              <div class="navbar-item">
                <div class="field is-grouped">
                  <?     if ($this->session->userdata('logged_in')) {
                    ?>
                      <p class="control">
                      <a class="button" href="<?php echo base_url('index.php/usuarios/logout'); ?>">
                        <span class="icon">
                          <i class="fas fa-times-circle"></i>
                        </span>
                        <span>
                          Salir
                        </span>
                      </a>
                      </p>

                      <?if ($this->session->userdata('rango') == "admin") { ?>
              
              <p class="control">
              <a class="button" href="<?php echo base_url('index.php/admin'); ?>">
                <span class="icon">
                  <i class="fas fa-cog"></i>
                </span>
                <span>
                  Panel
                </span>
              </a>
            </p> <? } ?>
                <? } else {?>
                  <p class="control">
                <a class="button" href="<?php echo base_url('index.php/usuarios'); ?>">
                  <span class="icon">
                    <i class="fas fa-user"></i>
                  </span>
                  <span>
                    Login
                  </span>
                </a>
              </p>
              <? } ?>
                  
                  <p class="control">
                    <a class="button is-primary" href="https://github.com/ajotah?tab=repositories" target="_blank">
                      <span class="icon">
                        <i class="fab fa-github"></i>
                      </span>
                      <span>Perfil Github</span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
      </div>
      </div>
</header>

<br>
<br>
<br>
<script>
$(document).ready(function() {

  // Check for click events on the navbar burger icon
  $(".navbar-burger").click(function() {

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");

  });
 
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


});
</script>


