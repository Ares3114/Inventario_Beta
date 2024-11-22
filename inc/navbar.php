<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=home">
        <img src="./img/logo.png" width="65" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">USUARIOS</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=user_list" class="navbar-item">ADMINISTRADOR</a>
                    <a href="index.php?vista=usuarior_list" class="navbar-item">USUARIO R</a>
                    <a href="index.php?vista=usuariod_list" class="navbar-item">USUARIO D</a>
                    <a href="index.php?vista=usuariou_list" class="navbar-item">USUARIO U</a>
                    <a href="index.php?vista=usuarion_list" class="navbar-item">USUARIO N</a>
                    <a href="index.php?vista=asesor_list" class="navbar-item">ASESORES</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Categorías</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=category_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=category_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=category_search" class="navbar-item">Buscar</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Productos</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=equipo_list" class="navbar-item">Equipos</a>                  
                    <a href="index.php?vista=celular_list" class="navbar-item">Celulares</a>
                    <a href="index.php?vista=equipo_category" class="navbar-item">Por categoría</a>
                    <a href="index.php?vista=equipo_search" class="navbar-item">Buscar</a>
                </div>
            </div>

        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="button is-primary is-rounded">
                        Mi cuenta
                    </a>

                    <a href="index.php?vista=logout" class="button is-link is-rounded">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>