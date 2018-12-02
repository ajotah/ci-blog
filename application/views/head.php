<!DOCTYPE html>
<html lang="es" dir="ltr">
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

<link rel="stylesheet" type="text/css" href="<?php echo base_url('bulma/bulma.css'); ?>">


<!-- Fin de archivos CSS   -->

  </head>
  <body>
    <section>
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
          <a class="navbar-item" href="https://bulma.io/">
            Inicio
          </a>
          <a class="navbar-item" href="https://bulma.io/">
            Proyectos
          </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="https://bulma.io/documentation/overview/start/">
              Categorías
            </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="https://bulma.io/documentation/overview/start/">
                Overview
              </a>
              <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                Modifiers
              </a>
              <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                Columns
              </a>
              <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                Layout
              </a>
              <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
                Form
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                Elements
              </a>
              <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
                Components
              </a>
            </div>
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
  </section>
  <br>
<br>
<br>
