     <div class="" id="contenidomenu">
      <?php if(!isset($_SESSION["name"])){?>
        <div class="navbar-fixed">
          <nav class="cyan darken-3">
    
    <div class="nav-wrapper">
      
      <a href="#!" class="brand-logo hide-on-med-and-down" style="margin-left: 1rem;">Tienda Local</a>

      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
        
      

      
      <ul class="right hide-on-med-and-down">
         
        <li>
          <a class=" modal-trigger" href="#loginm">Iniciar</a>
        </li>

        <li style="">
          <a href="">Registrase</a>
        </li>
      </ul>
    </div>


          
 
      </nav>
        </div>
        

    <ul class="sidenav center-align" id="mobile-demo" style="">
        <li id="namebusi">
          
        </li>
        <li class="divider"></li>
            <li><a  class=" modal-trigger" href="#loginm">Iniciar</a></li>
            <li class="divider"></li>
            <li><a href="#!" class="">Registarse</a></li>
      </ul>






         <?php }else{?>
          <div class="navbar-fixed">
            <nav class="cyan darken-3 ">
    
    <div class="nav-wrapper">
      
      <a href="./" class="brand-logo hide-on-med-and-down" style="margin-left: 1rem;" id="namebusi"></a>

      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
        <a  class="hide-on-large-only right brand-logo modal-trigger" href="#modalcarshop"><i class="material-icons">shopping_cart </i></a>
        <span class="new badge hide-on-large-only numbercar"></span>
      

      
      <ul class="right hide-on-med-and-down">
        <li>
          <a  class=" brand-logo modal-trigger" href="#modalcarshop"><i class="material-icons" >shopping_cart </i></a>
        <span class="new badge numbercar"></span>
        </li>

        <li style="width: 180px;">
          <a class="dropdown-trigger brand-logo right valign-wrapper left hide-on-med-and-down" href="#!" data-target="dropdown1">
        
            <div class="chip" id="profile" style="color:black;">
          <img src="../view/imguser/<?php echo $_SESSION['img']; ?>" alt="Contact Person">
            <?php echo $_SESSION['name']; ?>
          </div>
  

            </a>
        </li>
      </ul>
    </div>

          <ul id="dropdown1" class="dropdown-content  center-align" style="overflow:visible" >
            
            <li class="divider"></li>
            <li><a  class="modal-trigger" href="#modalwis">Lista de deseos</a></li>
            <li class="divider"></li>
            <li><a  class="modal-trigger" onclick="fillboxprofile(<?php echo $_SESSION['idus']; ?>);" href="#profiled">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!" onclick="salir();" class="">Salir</a></li>
          </ul>
          
        </div>
      </nav>
          </div>
    

    <ul class="sidenav" id="mobile-demo" style="">
        <li>
          <div class="user-view">
          <div class="background">
            <img src="https://www.pintoresmadridprofesionales.com/wp-content/uploads/2016/02/Pintores-Madrid-profesionales-20.jpg">
          </div>
          <a href="#user"><img class="circle" src="<?php echo SERVERURL.'imguser/'.$_SESSION["img"]; ?>"></a>
          <a href="#name"><span class="white-text name"><?php echo $_SESSION["name"]; ?></span></a>
          <a href="#email"><span class="white-text email"><?php echo $_SESSION["email"]; ?></span></a>
          <a href="./" ><span class="namebusi white-text"><?php echo $_SESSION["email"]; ?></span></a>
        </div>
        </li>
        <li class="divider"></li>
            <li><a  class="modal-trigger" href="#modalwis">Lista de deseos</a></li>
        <li class="divider"></li>
            <li><a  class="modal-trigger" onclick="fillboxprofile(<?php echo $_SESSION['idus']; ?>);" href="#profiled">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!" onclick="salir();" class="">Salir</a></li>
      </ul>
      
         <?php }?>
    