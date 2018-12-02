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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bulma/bulma.css'); ?>">
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

<style>
header {
  position: relative;
}

#flow span {
  display: block;
  width: 200vw;
  height: 200vw;
  position: absolute;
  top: -180vw;
  left: -50vw;
  border-radius: 90vw;
  opacity: .6;
}

.flow-1 {
  background: #7eeaca;
  -webkit-animation: rotating 20s linear infinite;
  -moz-animation: rotating 20s linear infinite;
  -ms-animation: rotating 20s linear infinite;
  -o-animation: rotating 20s linear infinite;
  animation: rotating 20s linear infinite;
}

.flow-2 {
  background: #6bd6b6;
  position: absolute;
  -webkit-animation: rotating 15s linear infinite;
  -moz-animation: rotating 15s linear infinite;
  -ms-animation: rotating 15s linear infinite;
  -o-animation: rotating 15s linear infinite;
  animation: rotating 15s linear infinite;
}

.flow-3 {
  background: #5FC4A7;
  position: absolute;
  -webkit-animation: rotating 7s linear infinite;
  -moz-animation: rotating 7s linear infinite;
  -ms-animation: rotating 7s linear infinite;
  -o-animation: rotating 7s linear infinite;
  animation: rotating 7s linear infinite;
}





@-webkit-keyframes rotating /* Safari and Chrome */ {
  from {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -ms-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes rotating {
  from {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -ms-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.rotating {
  -webkit-animation: rotating 2s linear infinite;
  -moz-animation: rotating 2s linear infinite;
  -ms-animation: rotating 2s linear infinite;
  -o-animation: rotating 2s linear infinite;
  animation: rotating 2s linear infinite;
}
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
      <nav class="navbar is-space is-fixed-top">
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
                  if ($this->session->userdata('rango') == "admin") { ?>
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
              <? } } else { ?>
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
            <?  } ?>
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
      <div id="flow">
    <span class="flow-1"></span>
    <span class="flow-2"></span>
    <span class="flow-3"></span>
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
});
</script>
