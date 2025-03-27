<?php

$pageTitle ='Login';

require_once 'includes/header.php';

// Check if already logged in
if (isset($_SESSION['user_id'])){
    header('Location: ' . BASE_URL);
    exit;
}

// Process the form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // VAILDATE FORM
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $error = [];

    if (empty($username)){
        $error[] = 'Username is required';
    }

    if (empty($password)){
        $error[] = 'Password is required';
    }

    // If no errors, attempt to login
    if (empty($error)){
        // Instantiate User
        $user = new User();

        // Attempt to login
        $loggedInUser = $user->login($username, $password);

        // Check for succesful log in

        if ($loggedInUser){
            // Create session
            $_SESSION['user_id'] = $loggedInUser->id;
            $_SESSION['user_name'] = $loggedInUser->username;
            $_SESSION['user_email'] = $loggedInUser->email;
            $_SESSION['user_role'] = $loggedInUser->role;

            // Redirect to home page
            header('Location: ' . BASE_URL);
            exit;
        }else{
            $error[] = 'Invalid username or password';
        }
    }

}
?>

<div class="auth-form">
    <h1>Log in</h1>
    <?php if (isset($error) && !empty($error)) : ?>
        <div class="alert alert-danger">
            <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="" method="post"></form>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"  value="<?php  echo isset($_POST['username'])  ? $_POST['username'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password"  required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Log in</button>
        </div>
    </form>
    <p>Don't have an account? <a href="<?php echo BASE_URL; ?>/register.php">Register here</a></p>
</div>

<?php require_once 'includes/footer.php'; ?>
