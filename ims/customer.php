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
<script src="js/customer.js"></script>
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
	width: 150%;
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
<?php include('inc/container.php'); ?>
<div class="container">		
	<?php include("menus.php"); ?> 
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default rounded-0 shadow">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
							<h3 class="card-title">Customer List</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
							<button type="button" name="add" id="addCustomer" data-bs-toggle="modal" data-bs-target="#customerModal" class="btn btn-primary bg-gradient btn-sm rounded-0"><i class="far fa-plus-square"></i> New Customer</button>
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 table-responsive">
							<table id="customerList" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>										
										<th>Name</th>
										<th>Address</th>
										<th>Mobile</th>
										<th>Balance</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div id="customerModal" class="modal">
        	<div class="modal-dialog modal-dialog-centered rounded-0">
        		<div class="modal-content rounded-0">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Customer</h4>
						<button type="button" class="btn-close text-xs" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<form method="post" id="customerForm">
								<input type="hidden" name="userid" id="userid" />
								<input type="hidden" name="btn_action" id="btn_action" value="customerAdd" />
								<div class="mb-3">
									<label class="control-label">Name</label>
									<input type="text" name="cname" id="cname" class="form-control rounded-0" required />
								</div>
								<div class="mb-3">
									<label class="control-label">Mobile</label>
									<input type="number" name="mobile" id="mobile" class="form-control rounded-0" required />
								</div>
								<div class="mb-3">
									<label class="control-label">Balance</label>
									<input type="number" name="balance" id="balance" class="form-control rounded-0" required />
								</div>
								<div class="mb-3">
									<label class="control-label">Address</label>
									<textarea name="address" id="address" class="form-control rounded-0" rows="5" required></textarea>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" name="action" id="action" class="btn btn-sm rounded-0 btn-primary" form="customerForm">Save</button>
						<button type="button" class="btn btn-sm rounded-0 btn-default border" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
        	</div>
        </div>	
	</div>	
</div>	
<?php include('inc/footer.php'); ?>
