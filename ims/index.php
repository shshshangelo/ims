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
	width: 100%;
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
	color: #black;
}

.btn-primary {
	background-color: #4a69bd;
	border: none;
}

.btn-primary:hover {
	background-color: #3b5394;
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
							<h3 class="card-title">Inventory</h3>
						</div>						
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 table-responsive">
							<table id="inventoryDetails" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>      
										<th>Product/Code</th>      
										<th>Starting Inventory</th> 
										<th>Inventory Received</th> 									
										<th>Inventory Shipped</th>
										<th>Inventory on Hand</th>								
									</tr>
								</thead>
								<tbody>
									<!-- Inventory details go here -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>	
<?php include('inc/footer.php'); ?>
