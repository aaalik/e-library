	<div class="container">
		<div class="bs-docs-section">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<h1 id="type">User</h1>
					</div>
				</div>
			</div>

			<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Profile</h3>
			  	</div>
			  	<div class="panel-body">
			  		<div class="row">
				    	<div class="col-xs-3">
						    <div class="list-group">
						    	<div class="list-group-item">
						            <div class="row-picture col-xs-1">
						                <img class="circle " src="http://localmarketingplus.ca/wp-content/uploads/2015/02/blue-head.jpg" alt="icon" style="width: 200px; height: 200px;">
						            </div>
						            
					            </div>
					        </div>
					    </div>

					    <div class="col-xs-9">
						    <div class="list-group">
						    	<div class="list-group-item">
						    		<div class="col-xs-12">
						            	<div class="col-xs-3">
						                	<h4 class="list-group-item-text">Id :</h4>
						                </div>
						                <div class="col-xs-9">
						                	<h4 class="list-group-item-text"><?php echo $book_id ?></h4>
						                </div>
						            </div>
						            <div class="col-xs-12">
						            	<div class="col-xs-3">
						                	<h4 class="list-group-item-text">Title :</h4>
						                </div>
						                <div class="col-xs-9">
						                	<h4 class="list-group-item-text"><?php echo $title_book ?></h4>
						                </div>
						            </div>
						            <div class="col-xs-12">
						            	<div class="col-xs-3">
						                	<h4 class="list-group-item-text">Author :</h4>
						                </div>
						                <div class="col-xs-9">
						                	<h4 class="list-group-item-text"><?php echo $author ?></h4>
						                </div>
						            </div>
						            <div class="col-xs-12">
						            	<div class="col-xs-3">
						                	<h4 class="list-group-item-text">Year :</h4>
						                </div>
						                <div class="col-xs-9">
						                	<h4 class="list-group-item-text"><?php echo $year ?></h4>
						                </div>
						            </div>
						            <div class="col-xs-12">
						            	<div class="col-xs-3">
						                	<h4 class="list-group-item-text">Description :</h4>
						                </div>
						                <div class="col-xs-9">
						                	<h4 class="list-group-item-text"><?php echo $description ?></h4>
						                </div>
						            </div>
						            <div class="col-xs-offset-10">
						            	<a href="<?php base_url(); ?>update">
                  							<button type="submit" class="btn btn-raised btn-primary">Update</button>
                  						</a>
                					</div>
					            </div>
					        </div>
					    </div>
					</div>
			  	</div>
			</div>
		</div>
	</div>