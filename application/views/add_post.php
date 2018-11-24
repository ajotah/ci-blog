<div class="ui container">
<div class="ui grid">

<div class="three wide column">
<!-- Columna Izquierda -->



</div>
<div class="ten wide column">

  <!-- Centro, donde va la información principal -->
  <?
  if($this->session->flashdata('error')) {

    echo '<div class="ui attached warning message">
  <div class="header">
¡Error!  </div>
  <p>';
  echo $this->session->flashdata('error');
  echo '</p></div>';
  }

  ?>
  <?
  if($this->session->flashdata('afirmacion')) {

    echo '<div class="ui attached positive message">
  <div class="header">
OK!  </div>
  <p>';
  echo $this->session->flashdata('afirmacion');
  echo '</p></div>';
  }

  ?>
  <div class="ui attached fluid segment">



      <?
        if ($this->session->userdata('logged_in')) {
      $formulario = array(
        'name'      => 'addpost',
        'id'        => 'addpost',
        'class'     => 'ui form',

      );
      echo form_open('posts/addpost', $formulario);
      echo '<div class="field">';
      echo form_label('Titulo', 'titulo');
      $titulo = array(
            'name'          => 'titulo',
            'id'            => 'titulo',
            'placeholder'         => 'Título del post',
            'maxlength'     => '255',

    );
      echo form_input($titulo);
      echo '</div>';
      echo '<div class="field">';
      $contenido = array(
        'name' => 'contenido',
        'id' => 'contenido',
        'placeholder' => 'Contenido del post..',

      );
      echo form_textarea($contenido);
      echo '</div>';
      echo '<div class="field">';
      echo form_label('Tags', 'tags');
      $tags = array (
        'name' => 'tags',
        'id' => 'tags',
        'maxlength' => '255',
        'placeholder' => 'tags',
      );
      echo form_input($tags);
      echo '</div>';

      $forma_boton = array(
        'name' => 'botonregistrar',
        'value' => 'Enviar',
        'class' => 'ui button',
        'type' => 'submit',

      );
      echo form_button($forma_boton, 'Enviar');
          echo form_close();

        } else {
          
          redirect('usuarios/login', 'refresh');


        }
      ?>
  </div>

</div>

<div class="three wide column">
  <!-- Columna derecha -->
</div>

</div>
</div>
