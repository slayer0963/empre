      <!-- NAVBAR -->
<header>
  <nav class="grey darken-3">
    <div class="nav-wrapper">
      <div class="row">
        <div class="col s11 ">
          <a href="#" data-target="sidenav-1" class="left sidenav-trigger hide-on-medium-and-up"><i class="material-icons">menu</i></a>
           <a href="<?php echo SERVERURL; ?>" class="brand-logo">Empren</a>

        </div>

      </div> 
    </div>
  </nav>
</header>

  


<!-- LEFT SIDEBAR  -->
<ul id="sidenav-1" class="sidenav sidenav-fixed indigo lighten-5 ">
    <li>
      <div class="user-view">
      <div class="background">
        <img src="https://www.pintoresmadridprofesionales.com/wp-content/uploads/2016/02/Pintores-Madrid-profesionales-20.jpg">
      </div>
      <a href="#user"><img class="circle" src="<?php echo SERVERURL.'imguser/'.$_SESSION["img"]; ?>"></a>
      <a href="#name"><span class="white-text name"><?php echo $_SESSION["name"]; ?></span></a>
      <a href="#email"><span class="white-text email"><?php echo $_SESSION["email"]; ?></span></a>
    </div>
    </li>
    
    <li><a class="dropdown-trigger" href="" data-target="dropdown1">Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
    <li><a href="<?php echo SERVERURL; ?>business/"  class="">Negocio</a></li>
    <li><a class="dropdown-trigger" href="" data-target="dropdown2">Producto<i class="material-icons right">arrow_drop_down</i></a></li>
    <!-- <li><a href="mystore/"  class="">Ver mi negocio</a></li> -->
    <li><a href=""  class="">Salir</a></li>
</ul>
<ul id="dropdown1" class="dropdown-content indigo lighten-5">
  <li><a href="<?php echo SERVERURL; ?>usertypes/" class="">Tipo de usuario</a></li>
  <li><a href="<?php echo SERVERURL; ?>users/" class="">Usuario</a></li>
</ul>

<ul id="dropdown2" class="dropdown-content indigo lighten-5">
    <li><a href="<?php echo SERVERURL; ?>producttype/" class="">Tipo de producto</a></li>
    <li><a href="<?php echo SERVERURL; ?>colors/"  class="">Colores</a></li>
    <li><a href="<?php echo SERVERURL; ?>size/" class="">Tamaño</a></li>
    <li><a href="<?php echo SERVERURL; ?>material/" class="">Materiales</a></li>
  <li><a href="<?php echo SERVERURL; ?>categories/" class="">Categoria</a></li>
  <li><a href="<?php echo SERVERURL; ?>product/" class="">Producto</a></li>
  <li><a href="<?php echo SERVERURL; ?>productassigment/" class="">Asiganci&oacute;n de producto</a></li>
  <li><a href="<?php echo SERVERURL; ?>aproduct/" class="">Asiganci&oacute;n de precios</a></li>   

</ul>