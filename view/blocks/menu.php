      <!-- NAVBAR -->
<header>
  <nav class="blue darken-4">
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
<ul id="sidenav-1" class="sidenav sidenav-fixed blue lighten-5 ">
    <li>
      <div class="user-view">
      <div class="background">
        <img src="https://www.pintoresmadridprofesionales.com/wp-content/uploads/2016/02/Pintores-Madrid-profesionales-20.jpg">
      </div>
      <a href="#user"><img class="circle" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div>
    </li>
    <li><a href="<?php echo SERVERURL; ?>colors/"  class="">Colores</a></li>
    <li class="divider"></li>
    <li><a class="dropdown-trigger" href="" data-target="dropdown1">Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
    <li class="divider"></li>
    <li><a href="<?php echo SERVERURL; ?>business/"  class="">Negocio</a></li>
    <li><a href=""  class="">Salir</a></li>
</ul>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="<?php echo SERVERURL; ?>usertypes/" class="">Tipo de usuario</a></li>
  <li class="divider"></li>
  <li><a href="<?php echo SERVERURL; ?>users/" class="">Usuario</a></li>
</ul>