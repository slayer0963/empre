     <div class="" id="contenidomenu">
      <?php if(!isset($_SESSION["name"])){?>
        <div class="navbar-fixed">
          <nav class="cyan darken-3">
    
    <div class="nav-wrapper">
      
      <a href="#!" class="brand-logo hide-on-med-and-down" style="margin-left: 1rem;">Tienda Local</a>
      <a href="#!" class="brand-logo hide-on-large-only" style="width: 50%; margin-top: .5px; ">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
      <a href="#!" class="brand-logo show-on-large-only hide-on-med-and-down" style=" margin-left: 15rem; width: 45%; margin-top: .5px;">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
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
      
      <a href="#!" class="brand-logo hide-on-med-and-down" style="margin-left: 1rem;" id="namebusi"></a>
      <a href="#!" class="brand-logo hide-on-large-only" style="width: 50%; margin-top: .5px; ">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
      <a href="#!" class="brand-logo show-on-large-only hide-on-med-and-down" style=" margin-left: 15rem; width: 45%; margin-top: .5px;">
        
        <form>
        <div class="">
          <input id="search" type="search" placeholder="Buscar" required>
        </div>
      </form>
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
        <a href="#!" class="hide-on-large-only right brand-logo"><i class="material-icons">shopping_cart </i></a>
        <span class="new badge hide-on-large-only">4</span>
      

      
      <ul class="right hide-on-med-and-down">
        <li>
          <a href="#!" class=" brand-logo"><i class="material-icons">shopping_cart </i></a>
        <span class="new badge ">4</span>
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
            <li><a href="#!" class="">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!" onclick="salir();" class="">Salir</a></li>
          </ul>
          
        </div>
      </nav>
          </div>
    

    <ul class="sidenav" id="mobile-demo" style="">
        <li>
          <div class="chip" style="width: 100%;">
            <img src="../view/imguser/<?php echo $_SESSION['img']; ?>" alt="Contact Person">
            <?php echo $_SESSION['name']; ?>
          </div>
        </li>
        <li class="divider"></li>
            <li><a href="#!" class="">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!" onclick="salir();" class="">Salir</a></li>
      </ul>
      
         <?php }?>
    