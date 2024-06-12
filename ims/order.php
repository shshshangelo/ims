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
<script src="js/order.js"></script>
<script src="js/common.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
<style>
/* Paste the CSS styles from customer.php here */
html, body, body > .container {
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
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-12">
				<div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="card-title">Manage Orders</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                                <button type="button" name="add" id="addOrder" class="btn btn-primary btn-sm rounded-0"><i class="far fa-plus-square"></i> New Order</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th>      
									<th>Product</th>	
									<th>Total Item</th> 
									<th>Customer</th> 									
                                    <th>Action</th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="orderModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Order</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="orderForm">
                            <input type="hidden" name="order_id" id="order_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <select name="product" id="product" class="form-select rounded-0" required>
                                        <option value="">Select Product</option>
                                        <?php echo $inventory->productDropdownList();?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Total Item</label>
                                    <div class="input-group">
                                        <input type="text" name="shipped" id="shipped" class="form-control rounded-0" required />        
                                    </div>
                                </div> 
                                <div class="mb-3">
                                    <label>Customer Name</label>
                                    <select name="customer" id="customer" class="form-select rounded-0" required>
                                        <option value="">Select Customer</option>
                                        <?php echo $inventory->customerDropdownList();?>
                                    </select>
                                </div>	
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="action" id="action" class="btn btn-primary rounded-0" value="Add" form="orderForm"/>
                            <button type="button" class="btn btn-default border rounded-0" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
            </div>
        </div>
</div>	
<?php include('inc/footer.php');?>