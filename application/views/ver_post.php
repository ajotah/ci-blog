<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">
	<div style="padding: 5px;">

	<?php foreach($usuario as $user) : ?>

	<div class="box box2"><div class="has-text-centered">
													<figure class="avatar is-64x64">
															<img src="<?php echo base_url()?><?=$user->avatar?>">
													</figure>
													</div>
														Escrito por <strong> <?=$user->nombre?></strong><br>
															<span class="is-italic"><?=$user->descripcion?></span>
															<nav class="level">
																<div class="level-left"></div>
  <!-- Right side -->
  <div class="level-right">
    <p class="level-item"><a href="https://twitter.com/<?=$user->twitter?>" target="_blank"><span><i class="fab fa-twitter"></i>Twitter</span></a></p>
    <p class="level-item"><a href="mailto:<?=$user->email?>"><span><i class="fas fa-envelope"></i></i>Email</span></a></p>
  </div>
</nav>
											</div>
										<?php endforeach; ?>


		<?php foreach($contenido as $post) : ?>

<div class="card">
<div class="card-content">
	<div class="content">
<article>
<h2><?=$post['titulo']?></h2>

		<p><?=$post['contenido']?></p>
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
</div>
</div>
