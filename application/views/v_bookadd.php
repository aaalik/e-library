<div class="container">
		<div class="bs-docs-section">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<h1 id="type">Book</h1>
					</div>
				</div>
			</div>

			<div class="well col-xs-10 col-xs-offset-1">
				<form class="form-horizontal" method="post" action="">
					<fieldset>
						<legend>Add Book</legend>

						<div class="form-group">
						    <label for="inputTitle" class="col-xs-1 control-label">Title</label>
						    <div class="col-xs-10">
						    	<input type="text" class="form-control" name="title" placeholder="Enter book's title">
						    </div>
						</div>

						<div class="form-group">
						    <label for="inputAuthor" class="col-xs-1 control-label">Author</label>
						    <div class="col-xs-10">
								<input type="text" class="form-control" name="author" placeholder="Enter author here">
						    </div>
						</div>

						<div class="form-group">
						    <label for="inputYear" class="col-xs-1 control-label">Year</label>
						    <div class="col-xs-10">
						    	<input type="number" name="year" class="form-control" placeholder="Enter year here">
						    </div>
						</div>

						<div class="form-group">
						    <label for="inputDescription" class="col-xs-1 control-label">Description</label>
						    <div class="col-xs-10">
                            	<textarea class="form-control" name="description" placeholder="Enter description here"></textarea>
						    </div>
						</div>

						<div class="form-group">
							<label class="col-xs-1 control-label" for="inputImg">Image</label>
							<div class="col-xs-10">
  								<input type="file" name="img_name" id="inputImg" multiple="">
  								<input type="text" readonly="" class="form-control" placeholder="Image here">
							</div>
						</div>

						<div class="col-xs-offset-10">
                  			<input type="submit" value="Submit" class="btn btn-primary"/>
                		</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>