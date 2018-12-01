<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">

	<?php if (!empty($posts)) : ?>
		<?php foreach($posts as $post) : ?>

<div class="card">
<div class="card-content">
	<div class="content">
	<h2><?=$post['titulo']?></h2>
		<p><?=$post['contenido']?></p>
		<br>
		<time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
	</div>
</div>
<footer class="card-footer">
<?     if ($this->session->userdata('logged_in')) {
	if ($this->session->userdata('rango') == "admin") {?>

	<a href="#" class="card-footer-item">Editar</a>
<? }} ?>
	<a href="#" class="card-footer-item">Comentarios (0)</a>
</footer>
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
