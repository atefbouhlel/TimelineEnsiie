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

<div class="container">

<div class="row-fluid">
<div class="login"  >
  <div class="inner">
  <div  class="logo" >
   <a href="{{URL::to('/')}}"> <img src="images/logo.png" alt="TimeLine" /></a>
  </div>
  <div class="userbox"></div>

  <div class="formLogin" >
    <?php if (isset($msg) && ($msg=="faux")){
    echo "<div class='alert alert2 alert-danger' role='alert' style='margin-top:32px;'>Vous n'êtes pas insrit !</div>";
  } 
  else echo "<div class='alert alert2 alert-danger' role='alert' style='margin-top:32px; display:none;'>  !</div>";
  ?>
  {{Form::open(array('method'=>'post','id'=>'validation_demo','files'=>true))}}
                          <div  class="grid3 offset3 top50">
                  <div class="section">
                      <label> Email  </label>
                      <div>
                          <input type="email"  placeholder="email" name="email" id="email"  class=" medium" required />        
                      </div>
                  </div>
                  <div class="section">
                                    <label> Password  </label>
                                    <div>
                                    <input type="password" minlength="8" placeholder="Mot de passe" class="medium" onkeyup="onBlurShow();" name="password" id="password"  required/>                                    
                                    <div id="longueur" style="display:none;color:red;">Le mot de passe doit contenir au moins 8 caractères.</div>
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Confirmation  </label>
                                    <div>
                                    <input type="password" placeholder="confirmation mot de passe" class="medium" onkeyup="confirmPassword();"  name="passwordConfirm" id="passwordConfirm" required />
                                    <div id="verif_msg"></div>
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Nom  </label>
                                    <div>
                                    <input type="text" placeholder="Dupont" class=" medium"  name="name" id="name"  required/>
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Prénom  </label>
                                    <div>
                                    <input type="text" placeholder="John" class=" medium"  name="firstname" id="firstname"  required/>
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Téléphone  </label>
                                    <div>
                                    <input type="text" pattern="[0-9]{10}" placeholder="06 23 56 48 93" class=" medium"  name="phone" id="phone"  />
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Adresse  </label>
                                    <div>
                                    <input type="text" placeholder="5 Clos de La Cathédrale" class=" medium"  name="adress" id="adress"  />
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Ville  </label>
                                    <div>
                                    <input type="text"  placeholder="Evry" class=" medium"  name="city" id="city"  />
                                    </div>
                  </div>
                  <div class="section">
                                    <label> Promotion  </label>
                                    <div>
                    <select class="small" id="select" name="promotion">
                            <option value=""  ></option>
                            <option value=""  ></option>
                            <option value=""  ></option>
                            <option value=""  ></option>
                            <option value=""  ></option>
                    </select>                            
                    </div>
                  </div>

                  <div class="section">
                      <label> Photo de profil  </label>
                      <div>
                            <div class="avartar">
                                <input type="file" name="photo" class="fileupload" id="file_input" required />
                            </div>
                      </div>
                  </div>
                  <div class="section ">
                                    <label>genre</label>   
                                    <div> 
                                      <div>
                                          <input type="radio" name="gender" id="radio-1" value="1"  class="ck" checked="checked"/>
                                          <label for="radio-1">Homme</label>
                                      </div>
                                      <div>
                                          <input type="radio" name="gender" id="radio-2" value="2"  class="ck"  />
                                          <label for="radio-2" >Femme</label>
                                      </div>
                                    </div>
                   </div>
                   <div class="section">
                    <label>Date de naissance</label>   
                    <div><input type="text"  id="datepick" class="datepicker" readonly="readonly" name="datepicker" required /></div>
                </div>
                    <div class="section last">
                        <div>
                          <input type="submit" class="uibutton large" value="valider"/>
                        </div>
                    </div>

                            </div>
                          {{Form::close()}}
          
   </div>
</div>
  <div class="clear"></div>
  <div class="shadow"></div>
</div>

</div>

</div>
<!--  -->
<!--Login div-->
<div class="clear"></div>

<!-- Link JScript-->

<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/jquery.ui.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('components/ui/jquery.autotab.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/ui/timepicker.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/datatables/dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/filestyle/jquery.filestyle.js')}}" ></script>
        <script type="text/javascript">
                   //inscription
       function confirmPassword(){
      var pwd= $('#password').val();
      var pwd2=$('#passwordConfirm').val();

    if( pwd == pwd2)
    {
      $('#verif_msg').html('Identiques');
      $('#verif_msg').css('color','green');
      $('#verif_msg').show();
    }
    else if( ($('#passwordConfirm').val()=='') && ($('#password').val()=='')){
        $('#verif_msg').hide();
        $('#longueur').hide();
    }
    else
    {
      $('#verif_msg').html('Non identiques');
      $('#verif_msg').css('color','red');
      $('#verif_msg').show();
    }

      
  }

  function onBlurShow(){
        
      if($('#passwordConfirm').val()==''){
        if(($('#password').val()).length <8){
          $('#longueur').show();
        }
        else
          $('#longueur').hide();
      }       
      else if($('#passwordConfirm').val() !=''){
        confirmPassword();
      }
      else if( ($('#passwordConfirm').val()=='') && ($('#password').val()=='')){
        $('#verif_msg').hide();
        $('#longueur').hide();
      }
  }
            $(document).ready(function() {
  
    $('#validation_demo').submit(function(){
            var pwd= $('#password').val();
            var pwd2=$('#passwordConfirm').val();
            var birthdate=$( "#datepick" ).val();
            
            var filename = $("#file_input").val();

            var extension = filename.replace(/^.*\./, '');
            if (extension == filename) {
                extension = '';
            } else {
                extension = extension.toLowerCase();
            }
            //Un test sur les mots de passes
            if( pwd != pwd2)
            {
              alert('Les mots de passe ne sont pas identiques.');       
                return false;
            }

            //Un test sur l'extension de l'image
            if (extension!='jpg' && extension!='jpeg' && extension!='png'){
              alert("Le format de la photo n'est pas valide.(jpg,jpeg,png)");
              return false;
            }

            //Un test sur la date de naissance
            if (birthdate==''){
              alert('Veuillez préciser la date de naissance');
              return false;
            }




            
    });





              //initialisation
              var date = new Date();
var y = date.getFullYear();
              $("#select").children("option:nth-child(1)").text(y);
              $("#select").children("option:nth-child(1)").attr('value',y);
              $("#select").children("option:nth-child(2)").text(y+1);
              $("#select").children("option:nth-child(2)").attr('value',y+1);
              $("#select").children("option:nth-child(3)").text(y+2);
              $("#select").children("option:nth-child(3)").attr('value',y+2);
              $("#select").children("option:nth-child(4)").text(y+3);
              $("#select").children("option:nth-child(4)").attr('value',y+3);
              $("#select").children("option:nth-child(5)").text(y+4);
              $("#select").children("option:nth-child(5)").attr('value',y+4);
              $( "#datepick" ).datepicker({
                    dateFormat: "yy-mm-dd",
                    monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
                    dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ]
                });                
            });
            var getRubrics="{{URL::to('rubric/getRubrics')}}";
            var chargement="{{URL::to('rubriques')}}";
            var addComment="{{URL::to('addComment')}}";
            var addJaime="{{URL::to('addJaime')}}";
            var deleteJaime="{{URL::to('deleteJaime')}}";
            var searchPath="{{URL::to('search')}}";
        </script>
        <script type="text/javascript" src="{{URL::asset('js/search.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/fancybox/jquery.fancybox.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/chosen/chosen.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/confirm/jquery.confirm.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('components/vticker/jquery.vticker-min.js')}}"></script>
        <!--<script type="text/javascript" src="components/flot/flot.resize.min.js"></script>-->
        <script type="text/javascript" src="{{URL::asset('components/uploadify/uploadify.js')}}"></script>  
        <!--Effet alert-->
        <script type="text/javascript" src="{{URL::asset('components/effect/jquery-jrumble.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('components/Jcrop/jquery.Jcrop.js')}}" ></script>
        <script type="text/javascript" src="{{URL::asset('components/imgTransform/jquery.transform.js')}}" ></script>
    <script type="text/javascript" src="{{URL::asset('components/dualListBox/dualListBox.js')}}"  ></script>
  
        <script type="text/javascript" src="{{URL::asset('components/tipsy/jquery.tipsy.js')}}"></script> 
        
        <script type="text/javascript" src="{{URL::asset('js/login.js')}}"></script>

@include('layout.footer2')
</body>
</html>


