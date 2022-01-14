<?php
  //Initialize the session
  session_start();
  
  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: store.php");
      exit;  //記得要跳出來，不然會重複轉址過多次
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Login Form with Avatar Image</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>

</script>

</head>
<body>
<div class="login-form" >
    <form action="php-member/Login.php" method="POST">
		<div class="avatar">
			<img src="https://www.tutorialrepublic.com/examples/images/avatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">商家登入</h2>   
        <div class="form-group">
        	<input type="text" class="form-control" name="sId" placeholder="商家名稱" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="sPhone" placeholder="商家電話" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" id = "sign_in_btn" class="btn btn-primary btn-lg btn-block">登入</button>
        </div>
        <div class="form-group">
            <a class="btn btn-inverse btn-block" href="supplier.html">管理供應商頁面</a>
        </div>
    </form>
    <p class="text-center small">還未註冊嗎?<a href="#sign_up" class="edit" data-toggle="modal">註冊!</a></p>
</div>
<div id="sign_up" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">						
                <h4 class="modal-title">註冊</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>			
            <div class="signup-form modal-body">
                <form action="php-member/register.php" method="post" class="form-horizontal">
                        <div class="row">
                        <div class="col-8 offset-4">
                            <h2>新增商家</h2>
                        </div>	
                        </div>			
                    <div class="form-group row">
                        <label class="col-form-label col-4">商家名稱</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="sId" required="required" id = "store_name">
                        </div>        	
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4">地址</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="sAdder" required="required" id = "store_address">
                        </div>        	
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4">電話</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="sPhone" required="required" id = "store_phone">
                        </div>        	
                    </div>
                    <div class="form-group row">
                        <div class="col-8 offset-4">
                            <button type="submit" value = "Submit"class="btn btn-primary btn-lg" id = "sign_up_btn">新增</button>
                        </div>  
                    </div>		      
                </form>
            </div>
		</div>
	</div>
</div>
</body>
</html>