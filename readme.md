
<h1>CI-bulma_config</h1>

Sistema de bloggin programado en CODEIGNITER 3 y Bulma CSS. Cuenta con gestión de usuarios, sesiones, posts, categorias, tags, panel administración, sistemas de likes, comentarios...

En el BACK-END: CodeIgniter 3
En el Front-END: Bulma 0.7.2

<h1> Instalación </h1>

<ul>
<li> Importa el archivo ci-blog.sql ubicado en la carpeta "base_de_datos".</li>
<li> Modifica el archivo /config/database.php con los datos de tu base de datos </li>
<li> Modifica "base_url" en /config/config.php <pre>
$config['base_url'] = 'http://localhost/blog/ci-blog';
</pre> to <pre>$config['base_url'] = 'YOU URL'; </pre></li>
<li> Registra tu usuario y desde phpmyadmin modifica el campo "rango" por "admin" </li>
<li> Login y accede al panel de administración </li>
</ul>

<h1>Screenshot INICIO</h1>

<img src="imagenes_repositorio/captura1.png">

<h1>
Screenshot Post y Comentarios
</h1>

<img src="imagenes_repositorio/captura2.png">
