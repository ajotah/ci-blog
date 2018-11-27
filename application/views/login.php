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


      $formulario = array(
        'name'      => 'login',
        'id'        => 'login',
        'class'     => 'ui form',

      );
      echo form_open('usuarios/login', $formulario);
      echo '<div class="field">';
      echo form_label('Usuario', 'usuario');
      $usuario = array(
            'name'          => 'usuario',
            'id'            => 'usuario',
            'placeholder'         => 'Nombre usuario',
            'maxlength'     => '50',

    );
      echo form_input($usuario);
      echo '</div>';
      echo '<div class="field">';
      $password = array(
        'name' => 'password',
        'id' => 'password',
        'maxlength' => '50',
        'placeholder' => 'Password',

      );
      echo form_password($password);
      echo '</div>';

      $forma_boton = array(
        'name' => 'botonregistrar',
        'value' => 'Enviar',
        'class' => 'ui button',
        'type' => 'submit',

      );
      echo form_button($forma_boton, 'Enviar');
          echo form_close();

    
      ?>
  </div>

</div>

<div class="three wide column">
  <!-- Columna derecha -->
</div>

</div>
</div>
