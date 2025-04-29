<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="index.html" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
                                    <?php
                                    $c=mysqli_connect("localhost","root","","mydb");
                                    $a=mysqli_query($c,"Select * from tbl_category");
                                    while($r=mysqli_fetch_array($a))
                                    {
                                        ?>
                                        <div class="col-sm-3">
                                        <ul class="multi-column-dropdown">
                                                <h6><?php echo $r[1] ?></h6>
                                                <?php           
                                                $ar=mysqli_query($c,"Select * from tbl_sub_cat where Cat_id='".$r[0]."'");
                                                while($rr=mysqli_fetch_array($ar))
                                                {
                                                    echo "
                                                    <li><a href='products.php?scid=".$rr[0]."'>".$rr[1]."</a></li>
                                                    <!--<span>New</span></a></li>-->";
                                                }
                                            ?>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                    ?>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<li><a href="about.html">About Us</a></li> 
						<li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="icons.html">Web Icons</a></li>
								<li><a href="codes.html">Short Codes</a></li>     
							</ul>
						</li>  
						<li><a href="mail.html">Mail Us</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>