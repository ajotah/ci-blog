<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">
  <div style="padding: 5px;">

  <?
  if($this->session->flashdata('error')) {

    echo '<div class="notification is-danger">
  <button class="delete"></button>
';
  echo $this->session->flashdata('error');
  echo '</div>';
  }

  ?>
  <?
  if($this->session->flashdata('afirmacion')) {

    echo '<div class="notification is-success">
  <button class="delete"></button>
  ';
  echo $this->session->flashdata('afirmacion');
  echo '</div>';
  }

  ?>
  <?php foreach($contenido as $post) : ?>
  <form action="<?php echo base_url('index.php/comentarios/add/'.$post['id'].''); ?>" name="add_comentario" id="add_comentario" class="form" method="post" accept-charset="utf-8">
<?php endforeach; ?>
  <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <img src="https://bulma.io/images/placeholders/128x128.png">
      </p>
    </figure>
    <div class="media-content">
      <div class="field">
        <p class="control">
          <textarea class="textarea is-primary" name="contenido" id="contenido" placeholder="Escribe un comentario..."></textarea>
        </p>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-primary" type="submit">Comentar</button>
        </p>
      </div>
    </div>
  </article>
  </form>
</div>
</div>
</div>
</div>
