
<div class="container mt-3">
    <h2>Login</h2>
<form action="PHP/loginusersphp.php" method="post">
    <div class="mb-3 mt-3">
        <?php if(isset($_SESSION['loginfirst'])) {
            echo '<h4>' . $_SESSION['loginfirst'] . '</h4>';
        } ?>
    </div>
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password">
    </div>
    <div class="form-check mb-3">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>