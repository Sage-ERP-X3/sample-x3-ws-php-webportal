<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<!--<a class="navbar-brand page-scroll" href="#page-top">Sagee X3</a>-->
			<a href="#page-top" style="text-decoration: none;"><img src="img/sage-logo.png" style="margin: 0px 5px 10px 0px;" alt="Sage X3" width="86px" height=""><span style="font-family: Helvetica, Arial, sans-serif; color: #bfbfbf; font-size: 28px; text-decoration: none;"> | X3</span></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right ">
				<li class=""><a style="page-scroll" href="index.php">Home</a></li>
				<li class=""><a class="page-scroll" href="connexion.php">Connection</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">X3 Sales
						<span class="caret"></span>
				</a>
					<ul class="dropdown-menu" role="menu">

						<li><a href="page_soh_list.php" style="text-transform: none; text-align: right;">List of orders</a></li>
						<li><a href="page_soh_read.php" style="text-transform: none; text-align: right;">Read an order</a></li>
						<li class="divider"></li>
						<li><a href="page_soh_create.php" style="text-transform: none; text-align: right;">Create an order</a></li>
					</ul>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">X3 purchasing
						<span class="caret"></span>
				</a>
					<ul class="dropdown-menu" role="menu">

						<li><a href="page_poh_gq_list.php">List of orders</a></li>
						<li><a href="page_pth_gq_read.php">Read a receipt</a></li>
						<li class="divider"></li>
						<li><a href="page_poh_gq_read.php">Create a receipt</a></li>
						<!--li class="divider"></li>
						<li><a href="page_soh_create.php">Create an order</a></li-->
					</ul>
				</li>
				
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">Products X3
						<span class="caret"></span>
				</a>
					<ul class="dropdown-menu" role="menu">

						<li><a href="page_itm_list.php" style="text-transform: none; text-align: right;">List of products</a></li>
						<li><a href="page_stock_list.php" style="text-transform: none; text-align: right;">Available stock</a></li>
						
					</ul>
				</li>
			</ul>

		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-left ">
				<li class=""><div id="icon-connect" class="hide">
						<button class="btn btn-info" type="button">
							<span><i class="fa fa-spinner"></i></span>
						</button>
					</div></li>
					
					
					
					
					
					
					
				<li class="">
				
				
				<form action="logout_action.php"
						method="post">
						
						<div id="icon-deconnect" class="hide">
						<button  class="btn btn-primary" type="submit">
							<span><i class="fa fa-power-off"></i></span>
						</button>
					</div>
					</form>
				
				
				
				
				</li>



			</ul>

		</div>

	</div>
</nav>
