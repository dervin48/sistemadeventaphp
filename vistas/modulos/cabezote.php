<header class="main-header">

    <!--=====================================
    =            Logotipo		           =
    ======================================-->

    <a href="incio" class="logo">

        <!-- logo mini -->

        <span class="logo-mini">
            <img src="vistas/img/plantilla/icono-blanco.png" class="img-responsive" style="padding: 10px">
        </span>

        <!-- logo normal -->

        <span class="logo-nlg">
            <img src="vistas/img/plantilla/icono-blanco-lineal.png" class="img-responsive" style="padding: 10px 0px">
        </span>
    </a>

    <!--=====================================
    BARRA DE NAVEGACION
    ======================================-->

    <nav class="navbar navbar-static-top" role="navigation">

        <!-- Boton de Navegacion -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- perfil de suario	 -->

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php
					if (isset($_SESSION["foto"]) && is_array($_SESSION["foto"]) && $_SESSION["foto"] != "") {
					    echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';
					} else {
					    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';
					}
					?>
                        <span class="hidden-xs"><?php
						if (isset($_SESSION["nombre"])) {
						    echo $_SESSION["nombre"];
						} else {
						    echo "Undefined";
						}
						?></span>
                    </a>

                    <!-- dropdown toggle-->

                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>

</header>