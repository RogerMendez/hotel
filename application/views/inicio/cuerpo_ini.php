<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?=$title?></title>

    <!-- Style -->
    <link href="<?=base_url()?>css/style1.css" rel="stylesheet" type="text/css">  <!--principal -->
    <link href="<?=base_url()?>font/stylesheet.css" rel="stylesheet" type="text/css">  <!-- font -->
    <link href="<?=base_url()?>css/bromoPanel.css" rel="stylesheet" type="text/css">
      
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/blueBoxed.css" title="blueBoxed" media="screen">

    <script type="text/javascript" src="<?=base_url()?>js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.cycle.all.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.tipsy.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/custom.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/animatedcollapse.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/input.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/nivoslider.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/slide.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/slides.min.jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.jtweetsanywhere-1.3.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.preloader.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.eislideshow.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/swfobject.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.ui.totop.js"></script>

    <script type="text/javascript" src="<?=base_url()?>js/styleswitch.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/cookies.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/cssLoader.js"></script>

</head>

<body>

<div class="wrap">
    
        <div id="headerSlider">

<div class="menu-wrap">
        	<div class="main-menu-wrap">
            	<div class="main-menu">
                	<ul>
                        
                        <li><?=anchor('usuarios','Iniciar session')?></li> 
                        <li><a href="http://127.0.0.1/hotel/index.php/reserva/index/0">Reserva</a></li>                   
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

            <!-- start slider -->
            <div id="slider">      
                <!-- start nivo slider -->
                <div class="slider-wrapper theme-default">
                    <div id="sliderv" class="nivoSlider">
                        <img src="<?=base_url()?>images/big-image11.jpg" alt="" title="<p><span><b>CERRO DE PLATA</b> <i>HOTEL en la ciudad más alta del MUNDO</b></span></p>">
                        <img src="<?=base_url()?>images/big-image10.jpg" alt="">
                        <img src="<?=base_url()?>images/big-image2.jpg" alt="" title="#htmlcaption">
                        <img src="<?=base_url()?>images/big-image3.jpg" alt="">
                    </div>
                    <span class="shadowHolderflat"><img src="images/big-shadow.png" alt=""></span>
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <h4>Cerro de Plata</h4>
                    <p><span>Bienvenidos al Hotel Más Alto del Mundo.</span></p>
                </div><!-- end nivo slider -->
            </div><!-- end slider -->

            <div class="sep_lines"></div><!-- separator line -->
            
            <!-- start promo box -->
            
                <div class="promo-box">
	<p>Bienvenidos <span>Al Hotel "CERRO DE PLATA" Potosí</span>.
	Comparte con nosotros haciendo realidad tus sueños en la ciudad más alta del mundo.</p>      
</div>
<!-- end promo box -->
            </div>
            <div class="clear20"></div>

        
    </div>
            

                        <!-- start footer -->
    <div id="footer" class="boxed">
            <div class="footer-wrap">
                <div class="outerOneFourth last">
                    <div class="title"><h4>Contact</h4></div>
                    <div class="clear"></div>
                    <div id="contactWrap">
                        <form class="contactForm">
                            <label>Nombre: </label>
                            <input class="nameInput" title="Name" type="text">
                            <label>Email: </label>
                            <input class="emailInput" title="Email Address" type="text">
                            <label>Mensage: </label>
                            <textarea class="messageInput" title="Message"></textarea>
                            <input class="buttonPro submitBtn" value="Enviar Mensaje" type="submit">
                        </form>
                    </div>
                    <div class="clear"></div>
                </div><!-- end contact -->
                
            </div>
            <div class="clear"></div>
            
            <!-- start post footer -->
            <div class="post-footer">
                <div class="post-footer-wrap">
                <p class="fl">UATF 2013</p>
                <p class="fr">
                    <a href="<?base_url()?>">Inicio </a>
                    <a href="#">About Us </a> 
                    <a href="#">Sitemap </a> 
                    <a href="#">FAQ's </a> 
                    <a href="#">Contact Us</a></p>
                </div>
            </div><!-- end post footer -->
    </div><!-- end footer -->
    
    <div class="clear"></div>
    <div id="footerShadow" class="boxed boxed"><div class="shadowHolderflat"><img src="images/big-shadow.png" alt=""></div>
    </div>
   

</div>

</body>
</html>
