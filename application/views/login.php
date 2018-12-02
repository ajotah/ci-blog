<div class="container">
<div class="columns">

<!-- Columna Izquierda -->
<div class="column is-8 is-offset-2 is-offset-one-quarter">
  <div class="box">
  <!-- Centro, donde va la información principal -->
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
        'class' => 'button is-primary',
        'type' => 'submit',

      );

      echo'<div class="action-buttons">';
      echo form_button($forma_boton, 'Enviar');
          echo form_close();

echo '<a class="button is-danger" href="'.base_url("index.php/usuarios/registrar").'">
<span class="icon">
<i class="fas fa-beer"></i>
</span>
<span>Registrarse</span>
</a>
</div></div>';
      ?>


</div>



</div>
</div>
