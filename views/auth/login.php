<?php-
session_start();

$error_message = isset($_GET['error']) ? $_GET['error'] : "";
$success_message = isset($_GET['success']) ? $_GET['success'] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Ordering System</title>

    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-box { 
            max-width: 400px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0 h1">Food Ordering</span>
            <a href="register.php" class="btn btn-outline-light btn-sm">Register</a>
        </div>
    </nav>

    <div class = "container d-flex justify-content-center my-4">
        <div class = "bg-white p-4 login-box shadow-sm rounded-3 w-100">
            <h3 class = "text-center mb-4 fw-normal text-dark">Login</h3>
            <?php if(!empty($error_message)): ?>
                <div class="alert alert-danger p-2 small text-center mb-3">
                    <?php echo htmlspecialchars($error_message);?>
                </div>
            <?php endif;?>
            
            <form id = "loginForm" action="../../controllers/AuthController.php?action=login" method="POST" onsubmit="return validateLoginForm()">
                <div class = "mb-3">
                    <label class="form-label text-muted small mb-1">Username</label>
                    <input type="text" id="login_username" name="username" class="form-control" placeholder="Username">
                </div>

                <div class = "mb-3">
                    <label class="form-label text-muted small mb-1">Password</label>
                    <input type = "password" id="login_password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class = "mt-4 mb-3">
                    <button type = "submit" class="btn btn-primary w-100 py-2">Login</button>
                </div>

                <div class = "text-center pt-2">
                    <span class="text-muted small">Don't have an account? <a href="register.php" class="text-decoration-none">Register</a></span>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateLoginForm() {
            const username = document.getElementById('login_username').value.trim();
            const password = document.getElementById('login_password').value.trim();

            if (username === "" || password === "") {
                alert("Please fill username and password!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>