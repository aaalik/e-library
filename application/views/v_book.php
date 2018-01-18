	<div class="container">
		<div class="bs-docs-section">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-header">
						<h1 id="type">Book</h1>
					</div>

                    <?php if($this->session->userdata("level") == "0"&&"1"){ ?>
                    <a href="<?php echo base_url('/book/add_book'); ?>">
                        <button class="btn btn-raised btn-primary">Add New Book</button>
                    </a>
                    <?php } ?>

					<div class="table-responsive">
                        <table id="hasil" class="table table-bordered" cellspacing="0" width="100%">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
							<?php 
                                //$id = 1;
                                foreach($book as $u){ 
                            ?>
                            <tr>
                                <td><?php echo $u->book_id ?></td>
                                <td><?php echo $u->title ?></td>
                                <td><?php echo $u->author ?></td>
                                <td><?php echo $u->year ?></td>
                                <td>
                                    <a href="<?php echo base_url()."book/detail?id=".$u->book_id; ?>">
                                        <button class="btn btn-raised btn-primary">Details</button>
                                    </a>
                                </td>
                            </tr> 
                            <?php } ?>
                        </table>
                    </div>
				</div>
			</div>

			
		</div>
	</div>