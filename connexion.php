<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>
<title>Connection</title>
</head>

<body role="document" >
	<?php include("includes/menu_home.php"); ?>
	
	<header style="border-bottom: 10px solid #00e14b;">
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Connection</div>
				<div class="intro-lead-in">You must sign in to use this Web site.</div>

			</div>

		</div>
	</header>
	<p />
	<div class="container">
		<div class="bs-component">
			<div class="row">
				<div class="col-lg-9 col-md-5 col-sm-3">
					<form class="form-horizontal" action="connexion_action.php"
						method="post">
						<fieldset>
							<legend>Form</legend>
							<div class="form-group">
								<label for="formlogin" class="col-lg-4 control-label">Login</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formlogin"
										name="formlogin" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="formpasswd" class="col-lg-4 control-label">Password</label>
								<div class="col-lg-5">
									<input type="password" class="form-control" id="formpasswd"
										name="formpasswd" placeholder="">
								</div>
							</div>
						</fieldset>

						<fieldset>
							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="reset" class="btn btn-default">Cancel</button>
									<button type="submit" class="btn btn-primary">Submit</button>
									
								</div>
							</div>
						</fieldset>
					</form>
				</div>



			</div>






		</div>
	</div>
	
<?php include("includes/end_body.php"); ?>
	<script type="text/javascript">
      // c'est ici que l'on va tester jQuery
      $(function(){
    	  var isConnect = '<?PHP echo $isConnect;?>';
    	  set_icon_connect(isConnect);
  // On peut accéder aux éléments.
  // $('#balise') marche.
          //$val = $('#sohnum').attr('placeholder');
    	  //$('#formsohnum').attr('value',$val);
		  	
    	  
    	 
});

    </script>
</body>
</html>


