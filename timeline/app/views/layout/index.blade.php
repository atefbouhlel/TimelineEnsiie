 
 <!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>
   Connexion
  </title>
</head> 
<body>
 <div class="container " style="margin-top:100px;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Connexion</h3>
                    </div>
                    <div class="panel-body">
@if(isset($message))
    <div class="row-fluid">
        <div class="span10 offset1">
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>          
        </div>
    </div>
@endif
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>                               
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Se connecter">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>