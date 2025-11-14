<?php
									require_once ('GraphQL/DisplayTokenJWT.php');
									
									$jwtToken = new DisplayTokenJWT ();
										
									echo ($jwtToken->getTokenWS());
									//ToolsWS::printSucces ( $jwtToken->getToken() );
										
									
									?>