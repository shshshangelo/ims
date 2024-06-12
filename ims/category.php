<?php 
ob_start();
session_start();
include('inc/header.php');
include 'Inventory.php';
$inventory = new Inventory();
$inventory->checkLogin();
?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/category.js"></script>
<script src="js/common.js"></script>
<style>
html, body, body>.container {
    height: 100%;
    width: 100%;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding-top: 20px;
}

.card {
    border: none;
    width: 110%;
    max-width: 1200px;
    margin: 0 auto;
}

.card-header {
    background-color: #4a69bd;
    color: #fff;
}

.card-title {
    margin: 0;
}

.card-body {
    background-color: #f8f9fa;
    padding: 30px;
}

.table {
    width: 110%;
    background-color: #fff;
}

.table thead th {
    background-color: #4a69bd;
    color: #fff;
    border: none;
}

.table-bordered {
    border: 1px solid #4a69bd;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #4a69bd;
}

.navbar {
    background-color: #4a69bd;
}

.navbar a {
    color: #fff;
}

.btn-primary {
    background-color: #4a69bd;
    border: none;
}

.btn-primary:hover {
    background-color: #3b5394;
}

.modal-content {
    border-radius: 0;
}

.modal-header {
    background-color: #4a69bd;
    color: #fff;
    border-bottom: none;
}

.modal-title {
    margin: 0;
}

.modal-footer {
    border-top: none;
}
</style>
<?php include('inc/container.php');?>
<div class="container">		
		
	<?php include("menus.php"); ?> 
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default rounded-0 shadow">
                <div class="card-header">
                        <div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
									<h3 class="card-title">Category List</h3>
							</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 text-end">
								<button type="button" name="add" id="categoryAdd" data-bs-toggle="modal" data-bs-target="#categoryModal" class="btn btn-primary btn-sm bg-gradient rounded-0"><i class="far fa-plus-square"></i> Add Category</button>   		
						</div>
					</div>
                    <div style="clear:both"></div>
                </div>
                <div class="card-body">
                    <div class="row">
                    		<table id="categoryList" class="table table-bordered table-striped">
                    			<thead><tr>
									<th>ID</th>
									<th>Category Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr></thead>
                    		</table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="categoryModal" class="modal fade">
    	<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Category</h4>
    					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    				</div>
    				<div class="modal-body">
    					<form method="post" id="categoryForm">
							<input type="hidden" name="categoryId" id="categoryId"/>
							<input type="hidden" name="btn_action" id="btn_action"/>
							<label>Category Name</label>
							<input type="text" name="category" id="category" class="form-control rounded-0" required />
    					</form>
    				</div>
    				<div class="modal-footer">
    					<input type="submit" name="action" id="action" class="btn btn-primary btn-sm rounded-0" value="Add" form="categoryForm"/>
    					<button type="button" class="btn btn-default btn-sm rounded-0 border" data-bs-dismiss="modal">Close</button>
    				</div>
    			</div>
    	</div>
    </div>
</div>	
<?php include('inc/footer.php');?>
