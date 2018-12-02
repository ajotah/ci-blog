<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">
  <div style="padding: 5px;">
<?if(!empty($comentarios)) :?>
<?php foreach($comentarios as $contenido) : ?>
  <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <img src="https://bulma.io/images/placeholders/128x128.png">
      </p>
    </figure>
    <div class="media-content">
      <div class="content">
        <p>
          <strong><?=$contenido->usuario?></strong>
          <br>
        <?=$contenido->contenido?>
          <br>
          <small><a>Estrellas (<?=$contenido->estrellas?>)</a> · <a>Responder</a> · <?=$contenido->fecha?></small>
        </p>
      </div>
    </div>
</article>
<?php endforeach; ?>
<?php else : ?>
  <article class="message is-warning">
    <div class="message-body">
      <div class="level">
        <div class="level-item">
  Aun no hay comentarios. ¿Quieres ser el primero? &nbsp;<span class="txt-rotate" data-period="200" data-rotate='[ " ¡Animate!", " ¿A que esperas?" ]'></span>&nbsp;
<i class="em em-pencil2"></i>  </div> </div> </div>
  </article><?php endif; ?>
</div>
</div>
</div>
</div>
