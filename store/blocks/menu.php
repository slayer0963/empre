 <?php session_start(); ?>



<?php if(!isset($_SESSION["name"])){?>
     <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" " id="sectionsNav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="namebusi">Tienda Local </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   <li>
                        <a  class="btn btn-white btn-simple" data-toggle="modal" data-target="#modallogin">
                            <i class="material-icons">shopping_cart</i> Iniciar
                        </a>

                    </li>
                    <li>
                        <a href="" class="btn btn-white btn-simple">
                            <i class="material-icons">shopping_cart</i> Registrarse
                        </a>
                        
                    </li>

                
                 
                </ul>
            </div>
        </div>
    </nav>

<?php }else{ ?>
 <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll=" " id="sectionsNav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="namebusi"></a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  
                    <li class="">
                        <a  class="btn btn-info btn-simple">
                            <i class="material-icons">shopping_cart</i> Carrito
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-white" data-toggle="dropdown">
                            <?php echo $_SESSION['name']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-with-icons">
                            <li>
                                <a href="#!" class="btn btn-white">
                                    <i class="material-icons">dns</i> Perfil
                                </a>
                            </li>
                            
                            <li>
                                <a href="#!" class="btn btn-white">
                                    <i class="material-icons">list</i> Compras
                                </a>
                            </li>
                       
                            <li>
                                <a href="#!" class="btn btn-white">
                                    <i class="material-icons">input</i> lista de deseos
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a  onclick="salir();" class="btn btn-danger">
                                    <i class="material-icons">close</i> Salir
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                   
                   

                 
                </ul>
            </div>
        </div>
    </nav>



<?php } ?>

