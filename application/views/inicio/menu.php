
<div class="menu-wrap">
        	<div class="main-menu-wrap"> 
            	<div class="main-menu">
                	<ul>
                       <li><a href="#" >INICIO</a>
                        <ul>
                            <li><?=anchor("inicio",'Inicio')?></li>
                            
                            <li><?=anchor("usuarios/salir",'Cerrar session')?></li>
                            
                        </ul>
                        </li>
                         <li><a href="#" >PERSONAL</a>
                            <ul>
                                <?$id_per = $this->session->userdata('id_per')?>
                                <li><?=anchor("personal/nueva_personal",'Registrar personal')?></li>
                                <li><?=anchor("personal/lis_personal",'Lista de personal')?></li>
                                <li><?=anchor("usuarios/nuevo_user/",'Nuevo user')?></li>
                                <li><?=anchor("usuarios/lis_user",'Lista de usuarios')?></li>
                            </ul>
                        </li>
                        <li><a href="about-us.html">SERVICIOS</a>
                            <ul>
                                <li><?=anchor('servicio', 'Sercivios');?></li>

                            </ul>
                        </li>
                        <li><?=anchor('', 'HABITACIONES')?>
                            <ul>
                                <li><?=anchor('tipo', 'Tipos Habitacion');?></li>
                                <li><?=anchor('habitacion', 'Habitaciones')?></li>
                                <li><?=anchor("reserva/index/0", 'Reservacion de habitaciones')?></li>

                                
                            </ul>
                        </li>
                        <li><a href="#" >ASIGNACION DE HABITACIONES</a>
                            <ul>
                                 <li><?=anchor('asignacion/lista_habitaciones/0', 'Lista de habitaciones');?></li>
                                 
                                 <li><?=anchor('asignacion/lista_hab_asignaciones', 'Habitaciones Ocupadas');?></li>
                                <li><?=anchor("reserva/lista_reservaciones", 'Lista de Reservaciones')?></li>
                            </ul>
                        </li>

                        <li><?=anchor("cliente/lis_cliente/0",'CLIENTES')?></li>
                                       
                	</ul>
                </div><!-- end main menu -->
                
                <!-- start logo -->
                <div class="logo">
                	<img src="<?=base_url()?>images/logo.png" alt="">
                </div><!-- end logo -->
            </div><!-- end main menu wrap -->
        </div><!-- end menu wrap -->

<div id="search-wrap">
            <!-- start searchBar -->
            
            <!-- start call information -->
            <div class="call">
                Más información: <br>
                <h2>0800-888-888</h2>
            </div><!-- end call information -->
        </div>
      </div><!-- end header section -->
    
    <div class="clear"></div>

    <div id="main">
        <div class="main-wrap">
        <div class="promo-box ">