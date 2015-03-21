<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Edit</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="/UserApplication/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center">Edit Account</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="POST" action="index.php?action=Edit">
            <input type="hidden" id="userName" name="id" value="<?php echo $this->signedIn()->getUserId();?>">
            <div class="form-group">
              <input type="text" name="username" class="form-control input-lg" value="<?php echo $this->signedIn()->getUsername();?>">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="new password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Edit</button>
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
          <?php 
            if($this != null && $this->signedIn()){ ?>
               <div class="modal-footer">
          <div class="col-md-12">
              <a id="overviewLink" href= "index.php?action=RequestOverview" data-dismiss="modal" aria-hidden="true"> Cancel</a>
		  </div>	
      </div>
        <?php  
            }?>
      </div>
      </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>