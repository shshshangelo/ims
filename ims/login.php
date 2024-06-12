<?php 
ob_start();
session_start();
include('inc/header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    include 'Inventory.php';
    $inventory = new Inventory();
    $login = $inventory->login($_POST['email'], $_POST['pwd']); 
    if(!empty($login)) {
        $_SESSION['userid'] = $login[0]['userid'];
        $_SESSION['name'] = $login[0]['name'];            
        header("Location:index.php");
    } else {
        $loginError = "Invalid email or password!";
    }
}
?>
<style>
html, body, body>.container {
    height: 100%;
    width: 100%;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    font-family: Arial, sans-serif;
}

body>.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

#title-wrapper {
    text-align: center;
    margin-bottom: 10px; /* Adjust this value if needed */
}

#title-wrapper img {
    display: block;
    margin: 0 auto; /* Ensure no space around the image */
}

#title {
    margin: -60px 0 0 0; /* Negative margin to reduce space */
    color: #fff;
    text-shadow: 2px 2px 2px #000;
}

.card {
    border: none;
}

.card-header {
    background-color: #4a69bd;
    color: #fff;
}

.card-body {
    background-color: #f8f9fa;
    padding: 30px;
}

.btn-primary {
    background-color: #4a69bd;
    border: none;
}

.btn-primary:hover {
    background-color: #3b5394;
}

.form-control:focus {
    box-shadow: none;
    border-color: #4a69bd;
}

.alert-danger {
    background-color: #e74c3c;
    color: #fff;
}
</style>
<?php include('inc/container.php'); ?>

<div id="title-wrapper">
    <img src="pet.png" alt="Logo" width="200" height="200">
    <h1 id="title">PET SUPPLY SHOP</h1>
</div>

<div class="col-lg-4 col-md-5 col-sm-10 col-xs-12">
    <div class="card rounded-0 shadow">
        <div class="card-header">
            <div class="card-title h3 text-center mb-0 fw-bold">Login</div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form method="post" action="">
                    <div class="form-group">
                    <?php if ($loginError) { ?>
                        <div class="alert alert-danger rounded-0 py-1"><?php echo $loginError; ?></div>
                    <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="control-label">Email</label>
                        <input name="email" id="email" type="email" class="form-control rounded-0" placeholder="Email address" autofocus="" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control rounded-0" id="password" name="pwd" placeholder="Password" required>
                    </div>  
                    <div class="d-grid">
                        <button type="submit" name="login" class="btn btn-primary rounded-0">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>      
<?php include('inc/footer.php'); ?>
