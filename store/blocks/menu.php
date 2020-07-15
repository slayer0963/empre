 <?php session_start(); ?>

<style>

.btnarr{
    margin-top: 5rem;
}

@media only screen and (max-width: 600px) {
    li.corto{
        display: none;
    }
    .largo{
        
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    li.corto{
        display: none;
    }
    .largo{
        
    }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .largo{
        display: none;
    }
    li.corto{
        display: block;
    }
}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
    .largo{
        display: none;
    }
    li.corto{
        display: block;
    }
}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    .largo{
        display: none;
    }
    li.corto{
        display: block;
    }
}
</style>

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
                        <a  class="btn btn-white " style="" data-toggle="modal" data-target="#modallogin">
                            <i class="material-icons">shopping_cart</i> Iniciar
                        </a>

                    </li>
                    <li>
                        <a href="" class="btn btn-white " style="">
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
            <div class="navbar-header text-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " id="namebusi"></a>
                <a  class="btn btn-default btn-md  largo btnarr">
                            <i class="material-icons">shopping_cart</i>&nbsp;&nbsp;&nbsp;<sup>0</sup>
                        </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  
                    <li class="corto">
                        <a  class="btn btn-white btn-sm ">
                            <i class="material-icons">shopping_cart</i> Carrito &nbsp;&nbsp;&nbsp;<sup>0</sup>
                        </a>
                    </li>
                    <li class="dropdown">
                        
                        <div class="author dropdown-toggle btn btn-white btn-sm " data-toggle="dropdown" style="width: 100%;">
                            <a href="#!" >
                                <img src="../view/imguser/<?php echo $_SESSION['img']; ?>" alt="..." style="height: 22px; width: 20px;" class="avatar img-raised">
                            <span><?php echo $_SESSION['name']; ?></span>
                        </a>
                        </div>
                        <a href="">
                        
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

