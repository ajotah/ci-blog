<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">

		<?php foreach($contenido as $post) : ?>

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

</div>
</div>
</div>
</div>
<br>
<?php endforeach; ?>
</div>
</div>
</div>
