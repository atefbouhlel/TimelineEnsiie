<html >

<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <title>Timeline ENSIIE</title>
        <!-- Link shortcut icon-->
        <!--<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" /> -->
        <!-- Link css-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/zice.style.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/icon.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/ui-custom.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/timepicker.css')}}"  />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/colorpicker/css/colorpicker.css')}}"  />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/elfinder/css/elfinder.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/datatables/dataTables.css')}}"  />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/validationEngine/validationEngine.jquery.css')}}" />
         
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/jscrollpane/jscrollpane.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/fancybox/jquery.fancybox.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/tipsy/tipsy.css')}}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/editor/jquery.cleditor.css')}}"  />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/chosen/chosen.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/confirm/jquery.confirm.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/sourcerer/sourcerer.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/fullcalendar/fullcalendar.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/Jcrop/jquery.Jcrop.css')}}"  />
        {{HTML::style('font-awesome/css/font-awesome.css')}}
           
        </head>      
        <body class="dashborad">        
        <div id="alertMessage" class="error"></div> 
                       
        <div id="header" >
                <div id="account_info"> 
                    <img src="{{URL::asset('images/avatar.png')}}" alt="Online" class="avatar" />
					<div class="setting" title="Profile Setting"><b>Bonjour,</b> <b class="red">{{Session::get('user')->firstname}}++ {{Session::get('user')->name}}</b><img src="{{URL::asset('images/gear.png')}}" class="gear"  alt="Profile Setting" ></div>
					<div class="logout" title="Disconnect"><b >Déconnexion</b> </div> 
                </div>
            </div> <!--//  header {{ Request::path()}} -->

			<div id="shadowhead"></div> <!--les petits carreaux rouges -->

            <!--Left Menu -->
            <div id="left_menu">
                    <ul id="main_menu" class="main_menu">
                      <li class="limenu select" ><a href="{{URL::to('evenements')}}"><span class="ico gray shadow home" ></span><b>Evenements</b></a></li>
                      <li class="limenu" ><a href="{{URL::to('evenement')}}" ><span class="ico gray shadow pictures_folder"></span><b>Créer évenement</b></a>                      
                      <li class="limenu" ><a href="{{URL::to('upload')}}"><span class="ico gray shadow pictures_folder"></span><b>Ajouter photos</b> </a></li>                      
                      <li class="limenu" ><a href="{{URL::to('user')}}"><span class="ico gray pictures_folder" ></span><b>Mon profil</b></a>
                        <ul>
                          <li ><a href="{{URL::to('inscription')}}"> Modifier mes infos </a></li>
                          <li ><a href="{{URL::to('#')}}"> Modifier mon mot de passe</a></li>
                          <li ><a href="{{URL::to('#')}}"> Modifier ma photo de profil </a></li>
                        </ul>
                      </li>
                      <li class="limenu" ><a href="{{URL::to('search')}}"><span class="ico gray search" ></span><b>Rechercher..</b></a>
                    </ul>
              </div>
        <!--Left Menu End --> 
            
            <div id="content">
                <div class="inner">
                    <div class="topcolumn">
                        <div class="logo"></div>
                            <ul  id="shortcut">
                                <li> <a href="#" title="Back To home"> <img src="{{URL::asset('images/icon/shortcut/home.png')}}" alt="home"/><strong>Accueil</strong> </a> </li>
                                <li> <a href="#" title="Setting" > <img src="{{URL::asset('images/icon/shortcut/setting.png')}}" alt="setting" /><strong>Paramètres</strong></a> </li> 
                                <li> <a href="#" title="Messages"> <img src="{{URL::asset('images/icon/shortcut/mail.png')}}" alt="messages" /><strong>Message</strong></a><div class="notification" >10</div></li>
                            </ul>
                    </div>
                    <div class="clear"></div>
