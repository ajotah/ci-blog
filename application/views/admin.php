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
        <li><a>Crear post</a></li>
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
<section class="hero is-primary is-bold is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Bienvenido, <?=$this->session->userdata('rango')?>.
                            </h1>
                            <h2 class="subtitle">
                                <span>Encantado de volver a verte </span><i class="em em-smile"></i>

                            </h2>
                        </div>
                    </div>
                </section>
                <br>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">
                                  <?=$cantidad_usuarios?>
                                </p>
                                <p class="subtitle">Usuarios</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title"><?=$cantidad_posts?></p>
                                <p class="subtitle">Posts</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title"><?=$cantidad_comentarios?></p>
                                <p class="subtitle">Comentarios</p>
                            </article>
                        </div>
                    </div>
                </section>
                <div class="columns">
                    <div class="column is-6">
                        <div class="card events-card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Últimos comentarios
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                </a>
                            </header>
                            <div class="card-table">
                                <div class="content">
                                    <table class="table is-fullwidth is-striped">
                                        <tbody>
                                        <?php if (!empty($ultimos_comentarios)) : ?>
		<?php foreach($ultimos_comentarios as $resucomentarios) : ?>
    <tr>
                                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                <td><?=$resucomentarios->contenido?></td>
                                                <td><a class="button is-small is-primary" href="<?php echo base_url('index.php/posts/ver/'.$resucomentarios->articulo.''); ?>" target="_blank">Action</a></td>
                                            </tr>
    <?php endforeach; ?>
    <?php else : ?>
    <tr>
                                                <td width="5%"><i class="fas fa-comment"></i></td>
                                                <td>No hay comentarios.</td>
                                                <td></td>
                                            </tr>
<?php endif; ?>

                                            
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a href="#" class="card-footer-item">Ver todos</a>
                            </footer>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Buscar usuario
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input is-large" type="text" placeholder="">
                                        <span class="icon is-medium is-left">
                      <i class="fa fa-search"></i>
                    </span>
                                        <span class="icon is-medium is-right">
                      <i class="fa fa-check"></i>
                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
              </div>
              </div>
              </div>
            </div>
          </div>

        </div>
