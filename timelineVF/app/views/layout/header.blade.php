<html >

<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <title>Timeline ENSIIE</title>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/icon.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/ui-custom.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/timepicker.css')}}"  />
        <!--page de recherche, on utilise dataTables.css-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/datatables/dataTables.css')}}"  />         
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/fancybox/jquery.fancybox.css')}}" media="screen" />
        <!--page de newRubric, on utilise chosen.css-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/chosen/chosen.css')}}" />
        {{HTML::style('font-awesome/css/font-awesome.css')}}
           
        </head>      
        <body class="dashborad">        
        <div id="alertMessage" class="error"></div> 
                       
        <div id="header" >
                <div id="account_info"> 
                    <img src="{{URL::asset(Session::get('user')->url_photo)}}" alt="Online" id="photo" class="avatar" width="36" height="36"/>
					<div class="setting" title="Profile Setting">
                        <b>Bonjour,</b> <b class="green_color">{{Session::get('user')->firstname}}  {{Session::get('user')->name}}</b><img src="{{URL::asset('images/gear.png')}}" class="gear"  alt="Profile Setting" ></div>
					<div class="logout" title="Disconnect">
                        <a href="{{URL::to('logout')}}">
                            <b >Déconnexion</b> 
                        </a>
                    </div> 
                </div>
        </div> <!--//  header {{ Request::path()}} -->

			<div id="shadowhead"></div> <!--les petits carreaux rouges -->

            <!--Left Menu -->
            <div id="left_menu">
                    <ul id="main_menu" class="main_menu">
                      <li class="limenu select" ><a href="{{URL::to('evenements')}}"><span class="ico gray shadow home" ></span><b>Evenements</b></a></li>
                      @if(Session::get('user')->isAdmin==1)
                      <li class="limenu" ><a href="{{URL::to('evenement')}}" ><span class="ico gray shadow add"></span><b>Créer évenement</b></a>                        
                      <li class="limenu" ><a href="{{URL::to('newRubric')}}" ><span class="ico gray shadow pictures_folder"></span><b>Ajouter rubrique </b></a>                      
                        @endif
                      <li class="limenu" ><a href="{{URL::to('upload')}}"><span class="ico gray shadow upload2"></span><b>Ajouter photos</b> </a></li>                      
                      <li class="limenu" ><a href="{{URL::to('user/'.Session::get('user')->id)}}"><span class="ico gray administrator" ></span><b>Mon profil</b></a>
                        <ul>
                          <li ><a href="{{URL::to('modifier')}}"> Modifier mes infos </a></li>
                          <!--<li ><a href="{{URL::to('#')}}"> Modifier mon mot de passe</a></li>
                          <li ><a href="{{URL::to('#')}}"> Modifier ma photo de profil </a></li>-->
                        </ul>
                      </li>
                      <li class="limenu" ><a href="{{URL::to('search')}}"><span class="ico gray zoom" ></span><b>Rechercher..</b></a>
                    </ul>
              </div>
        <!--Left Menu End --> 
            
            <div id="content">
                <div class="inner">
                    <div class="topcolumn">
                        <div class="logo"></div>

                    </div>
                    <div class="clear"></div>
