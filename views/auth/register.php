<?php
session_start();
$error_message = isset($_GET['error']) ? $_GET['error'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .big-navbar {
            background-color: #212529;
            padding: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0 h1">Food Ordering</span>
            <a href="login.php" class="btn btn-outline-light btn-sm">Login</a>
        </div>
    </nav>    

    <div class="container my-4">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                    <div class="bg-primary text-white text-center py-2 rounded-2 mb-4">
                        <h4 class="mb-0">Register Account</h4>
                    </div>

                    <?php if(!empty($error_message)): ?>
                        <div class="alert alert-danger p-2 small text-center mb-3">
                            <?php echo htmlspecialchars($error_message); ?>
                        </div>
                    <?php endif; ?>

                    <form id="registration" action="../../controllers/AuthController.php?action=register" method="POST" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label class="form-label text-secondary small">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Register</button>

                        <p class="text-center mt-3 mb-0 text-secondary small">
                            Already have an account? <a href="login.php" class="text-decoration-none">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    function validateForm() {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (username === '' || password === '' || confirmPassword === '') {
            alert('Please fill the blank form!');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Password and confirm password not matching!');
            return false;
        }

        return true;
    }    
    </script>
</body>
</html>