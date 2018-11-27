<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">

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
  <div class="box">




      <?


      $formulario = array(
        'name'      => 'login',
        'id'        => 'login',
        'class'     => 'form',

      );
      echo form_open('usuarios/login', $formulario);
      echo '<div class="field">';

      echo '<div class="control">';
      $usuario = array(
            'name'          => 'usuario',
            'id'            => 'usuario',
            'placeholder'         => 'Nombre usuario',
            'maxlength'     => '50',
            'class' => 'input',

    );
      echo form_input($usuario);
      echo '</div>';
      echo '</div>';

      echo '<div class="field">';

      echo '  <p class="control has-icons-left">
';
      $password = array(
        'name' => 'password',
        'id' => 'password',
        'maxlength' => '50',
        'placeholder' => 'Password',
        'class' => 'input',

      );
      echo form_password($password);
echo'<span class="icon is-small is-left">
      <i class="fas fa-lock"></i>';
      echo '</span>';
      echo '</div>';

      $forma_boton = array(
        'name' => 'botonregistrar',
        'value' => 'Enviar',
        'class' => 'button',
        'type' => 'submit',

      );
      echo form_button($forma_boton, 'Enviar');
          echo form_close();


      ?>
  </div>

</div>



</div>
</div>
