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
			<a class="navbar-brand page-scroll" href="#page-top">Sage X3</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right ">
				<li class=""><a class="page-scroll" href="index.php">Home</a></li>
				<li class=""><a class="page-scroll" href="connexion.php">Connection</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">Orders X3
						<span class="caret"></span>
				</a>
					<ul class="dropdown-menu" role="menu">

						<li><a href="page_soh_list.php">List of orders</a></li>
						<li><a href="page_soh_read.php">Read an order</a></li>
						<li class="divider"></li>
						<li><a href="page_soh_create.php">Create an order</a></li>
					</ul></li>

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
