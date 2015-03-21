<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <link href="/UserApplication/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <?php if($this != NULL && $this->signedIn() != NULL){ ?>
      <div><div>signed in as: <?php echo admin?></div><div><a href= "index.php?action=RequestOverview" data-dismiss="modal" aria-hidden="true"> Overview</a> </div></div>
            <?php  }?>
      <div class="modal-header">
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="POST" action="/UserApplication/index.php?action=Login">
            <div class="form-group">
              <input type="text" id="username" name="username" class="form-control input-lg" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button id = "signin" class="btn btn-primary btn-lg btn-block" >Sign In</button>
              <a href="/UserApplication/index.php?action=RequestRegisterUser">Register</a>
            </div>
              
             <div class = "form-group">
                 <ul>
             <?php if($this != NULL && $this->signedIn() != NULL){ 
                        for($i = 0; $i < count($this->_messages); $i++){?>
                     <li style="color: darkred;"> <?php echo $this->_messages[$i];  ?> </li>
             <?php      }     
                    
                    } ?> 
                 </ul>
             </div>
          </form>
      </div>
      <div class="modal-footer">
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>