<html >

<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <title>Timeline ENSIIE</title>
        <!-- Link shortcut icon-->
        <!--<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" /> -->
        <!-- Link css-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/icon.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/ui-custom.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/validationEngine/validationEngine.jquery.css')}}" />
         
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/jscrollpane/jscrollpane.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/fancybox/jquery.fancybox.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/tipsy/tipsy.css')}}" media="all" />
        
        
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/confirm/jquery.confirm.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/sourcerer/sourcerer.css')}}"/>
        
        <link rel="stylesheet" type="text/css" href="{{URL::asset('components/Jcrop/jquery.Jcrop.css')}}"  />
        {{HTML::style('font-awesome/css/font-awesome.css')}}
        {{HTML::style('css/bootstrap-responsive.css')}}
        {{HTML::style('css/bootstrap.min.css')}}
        </head>  
<body>
         
<div id="alertMessage" class="error"></div>
<div id="successLogin"></div>
<div class="text_success"><img src="images/loadder/loader_green.gif"  alt="TimeLine" /><span>Please wait</span></div>

<div id="login" >
  <div class="inner">
  <div  class="logo" >
    <img src="images/little-logo.png" alt="TimeLine" />
  </div>
  <div class="userbox"></div>

  <div class="formLogin">
    @if (isset($msg) &&  ($msg=="faux"))
    <div class='alert alert2 alert-danger' role='alert' style='margin-top:32px;'>Vous n'êtes pas insrit !</div>
    @elseif (isset($msg) && ($msg=="pwd"))
    <div class='alert alert2 alert-danger' role='alert' style='margin-top:32px;'>Veuillez vérifier votre mot de passe  !</div>
  @else
  <div class='alert alert2 alert-danger' role='alert' style='margin-top:32px;display:none;'></div>
  @endif
   <form name="formLogin"  id="formLogin" method="POST">
          <div class="tip">
          <input name="email" type="text"  id="username_id"  title="Username"  class="top20" />
          </div>
          <div class="tip">
          <input name="password" type="password" id="password"   title="Password"  />
          </div>
          
            <div style="float:left; padding:0px 0px 2px 0px ;">
           
          <div style="float:right;padding:2px 0px ;">
              <div> 
                
                <div class="row-fluid">
                    <div class="span6 offset6">
      
                          <input id="bouton_connexion" type="submit" value="Se connecter">
      
                    </div>
                </div>
				   <div class="row-fluid">
                    <div class="span6 offset6" id="lien" >
      
                          <a href="{{URL::to('inscription')}}" class="green_color" >
                            S'inscrire
                          </a>
      
                    </div>
                </div>
               
              </div>
            </div>
            </div>

    </form>
  </div>
</div>
  <div class="clear"></div>
  <div class="shadow"></div>
</div>

<!--Login div-->
<div class="clear"></div>

<!-- Link JScript-->

<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/jquery.ui.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('components/ui/jquery.autotab.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/timepicker.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/datatables/dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/filestyle/jquery.filestyle.js')}}" ></script>
        
        
        
        <script type="text/javascript" src="{{URL::asset('components/fancybox/jquery.fancybox.js')}}"></script>
        
        
        
        <!--<script type="text/javascript" src="components/flot/flot.resize.min.js"></script>-->
         
        <script type="text/javascript" src="{{URL::asset('components/tipsy/jquery.tipsy.js')}}"></script>
        <!--Effet alert-->
        <script type="text/javascript" src="{{URL::asset('components/effect/jquery-jrumble.js')}}"></script>
    
        <script type="text/javascript" src="{{URL::asset('components/imgTransform/jquery.transform.js')}}" ></script>
    
         
        <script type="text/javascript" src="{{URL::asset('js/login.js')}}"></script>
        
</body>
</html>

