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
<script src="js/brand.js"></script>
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

.table-container {
    max-height: 400px; /* Set the maximum height of the table container */
    overflow-y: auto; /* Enable vertical scrolling */
    width: 100%;
}

.table {
    width: 100%;
    background-color: #fff;
    margin: 0;
    border-collapse: collapse; /* Ensure borders don't collapse */
}

.table thead {
    position: sticky;
    top: 0;
    background-color: #4a69bd; /* Set the background color for the header */
    color: #fff;
    z-index: 1; /* Ensure it stays on top while scrolling */
}

.table th, .table td {
    padding: 8px;
    text-align: left;
    border: 1px solid #4a69bd; /* Ensure table borders are visible */
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
                <div class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="card-title">Brand List</h3>
                        </div>
                        <div class="col-md-3 text-end">
                            <button type="button" name="addBrand" id="addBrand" class="btn btn-primary bg-gradient btn-sm rounded-0"><i class="far fa-plus-square"></i> New Brand</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table id="brandList" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Brand Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Add PHP code here to dynamically generate table rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="brandModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add Brand</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="brandForm">
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" name="btn_action" id="btn_action" />
                        <div class="mb-3">
                            <select name="categoryid" id="categoryid" class="form-select rounded-0" required>
                                <option value="">Select Category</option>
                                <?php echo $inventory->categoryDropdownList(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Enter Brand Name</label>
                            <input type="text" name="bname" id="bname" class="form-control rounded-0" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="action" id="action" class="btn btn-primary btn-sm rounded-0" value="Add" form="brandForm"/>
                    <button type="button" class="btn btn-default btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>	
<?php include('inc/footer.php');?>
