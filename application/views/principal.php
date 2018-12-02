<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">
	<div style="padding: 5px; z-index:1;">

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

		<p><?=substr($post['contenido'],0, 300)?>...</p>
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
	 <span>12/12/2018</span></span></div>
</div>
  <div class="level-right">
		<div class="level-item">
	<div class="buttons has-addons card-footer-item">
<?     if ($this->session->userdata('logged_in')) {
	if ($this->session->userdata('rango') == "admin") {?>
		<a href="#">
<span class="button is-small is-light">
	<span class="icon is-small">
	 <i class="fas fa-edit"></i>
 </span>
	 <span>Editar</span>
</span>
</a>
<? }} ?>
<a href="#">
<span class="button is-small is-light">
<span class="icon is-small">
<i class="fas fa-comments"></i>
</span>
<span>Comentarios</span>
</span>
</a>
<a href="<?php echo base_url('index.php/posts/ver/'.$post['id'].''); ?>">
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
<br>
<?php endforeach; ?>



<?php echo $this->paginator->get_links('posts', 'bulma'); ?>

<?php else : ?>
NO HAY POSTS
<?php endif; ?>
</div>
</div>
</div>
</div>
