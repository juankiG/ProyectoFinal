<p>
	Sesión iniciada por <?= $_SESSION["nombreUsuario"] ?> [<?= $_SESSION["email"] ?>]
    <form action="../user/usuarioPerfil.php" method="post">
    <input type="submit" value="Ver mi perfil">
    <input type="hidden" name="nombreUsuario" value="<?= $_SESSION["nombreUsuario"] ?>">
    </form>
    <button><a href="../user/sesion-cerrar.php">¿Cerrar sesión?</a></button>
</p>