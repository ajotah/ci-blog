<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">
	<div style="padding: 5px; z-index:1;">
<article>
	<div class="level">
		<div class="level-item">
	<h1 class="subtitle is-2 has-text-weight-light">
	                            <strong><span class="txt-rotate" data-period="200" data-rotate='[ "Bienvenido !", "Welcome !" ]'></span></strong>
	                            <i class="em em-smile"></i>
	                        </h1>
												</div></div>
	<?php if (!empty($posts)) : ?>
		<?php foreach($posts as $post) : ?>

<div class="card">
<div class="card-content">
	<div class="content">
<article>
<h2><?=$post['titulo']?></h2>

		<p><?
		$contenido = $post['contenido'];
		$contenido = preg_replace("/<img[^>]+\>/i", "", $contenido);
		$contenido = preg_replace("/<span[^>]+\>/i", "", $contenido);
		$contenido = preg_replace("/<p[^>]+\>/i", "", $contenido);
		$contenido = preg_replace("/<br[^>]+\>/i", "", $contenido);
		$contenido = strip_tags($contenido);
		$contenido = substr($contenido,0, 300);
		

		echo $contenido;
		?>...</p>
</article>
	</div>
</div>
<nav class="level">
<div class="level-left">
<div class="level-item card-footer-item">
	<span class="button is-small is-text">

	<span class="icon is-small">
	 <i class="far fa-calendar-alt"></i>
	</span>
	 <span><?=$post['fecha']?></span></span></div>
</div>
  <div class="level-right">
		<div class="level-item">
	<div class="buttons has-addons card-footer-item">
<?     if ($this->session->userdata('logged_in')) {
	if ($this->session->userdata('rango') == "admin") {?>
		<a href="<?php echo base_url('posts/editar/'.$post['id'].''); ?>">
<span class="button is-small is-light">
	<span class="icon is-small">
	 <i class="fas fa-edit"></i>
 </span>
	 <span>Editar</span>
</span>
</a>
<a href="<?php echo base_url('posts/borrar/'.$post['id'].''); ?>">
<span class="button is-small is-light">
	<span class="icon is-small">
	 <i class="fas fa-edit"></i>
 </span>
	 <span>Borrar</span>
</span>
</a>
<? }} ?>
<a href="<?php echo base_url('posts/ver/'.$post['id'].'/'.$post['tituloseo'].''); ?>">
<span class="button is-small is-light">
<span class="icon is-small">
<i class="fas fa-glasses"></i>
</span>
<span>Leer más</span>
</span>
</a>

</div>
</div>
</div>
</div>
	</nav>
<br>
<?php endforeach; ?>



<?php echo $this->paginator->get_links('posts', 'bulma'); ?>

<?php else : ?>
<div class="notification is-primary">
  No hay posts aun... <i class="em em-anguished"></i>
	</div> 
  <?php endif; ?>
	</article>
</div>
</div>
</div>
</div>
