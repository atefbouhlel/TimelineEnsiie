@include('layout.header')

<div class="onecolumn" >
    <div class="header"><span><span class="ico gray window"></span>  évenements  </span></div>
    <div class="clear"></div>
    <div class="content" >

<?php
$message="{{$message}}";
if ($message=="succes"){
?>


<div class="alert alert2 alert-success" role="alert">Bienvenue !! votre demande d'inscription a été effectué avec succés.</div>

<?php
}
else if ($message=="inscrit"){
?>

hellooooooooooo
<div class="alert alert2 alert-danger" role="alert">Vous êtes déjà inscrit ! </div>

<?php
}
?>

 <div class=" clear"></div>
    </div>
</div>
<!-- // End onecolumn -->

<div class="clear"></div>
@include('layout.footer')