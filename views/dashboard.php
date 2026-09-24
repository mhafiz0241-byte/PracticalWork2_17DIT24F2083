<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$selected_foods = isset($_SESSION['selected_foods']) ? $_SESSION['selected_foods'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary - Food Ordering System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .top-navbar {
            background-color: #212529; 
            padding: 10px 20px;
        }

        .navbar-brand {
            font-size: 1.25rem;
            color: #fff;
            text-decoration: none;
        }
        .dashboard-card {
            max-width: 500px;
            margin: 50px auto;
            border-radius: 8px;
            overflow: hidden; 
        }
        .card-header-green {
            background-color: #198754; 
            color: #fff;
            padding: 15px 20px;
            font-size: 1.2rem;
            font-weight: 500;
        }
        .selection-box {
            background-color: #f8f9fa; 
            border: 1px solid #dee2e6; 
            border-radius: 6px;
            padding: 15px;
            margin-top: 10px;
        }

        .selection-box-title {
            color: #6c757d; 
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

       
        .food-list {
            list-style: none; 
            padding: 0;
            margin: 0;
        }

        .food-list li {
            position: relative;
            padding-left: 15px;
            margin-bottom: 5px;
            font-size: 0.95rem;
            color: #212529;
        }

        
        .food-list li::before {
            content: "\2022"; 
            color: #000;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
            font-size: 0.8rem;
        }

    </style>
</head>
<body>

    <div class="top-navbar d-flex justify-content-between align-items-center">
        <a href="#" class="navbar-brand">Food Ordering</a>
        <a href="../logout.php" class="btn btn-light btn-sm px-3">Logout</a>
    </div>

    <div class="container">
        <div class="card dashboard-card shadow border-0">
            <div class="card-header-green">
                Order Summary
            </div>
            
            <div class="card-body p-4 bg-white">
                <h5 class="fw-normal mb-3">Welcome, <?php echo htmlspecialchars($username); ?></h5>
                <div class="selection-box">
                    <div class="selection-box-title">Your Selection:</div>
                    
                    <?php if (!empty($selected_foods)): ?>
                        <ul class="food-list">
                            <?php foreach ($selected_foods as $food): ?>
                                <li><?php echo htmlspecialchars($food); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <div class="small text-muted text-center py-2">No items selected.</div>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                    <a href="menu.php" class="btn btn-primary px-4 py-2" style="border-radius: 5px; font-size: 0.95rem;">Order More</a>
                    <a href="../logout.php" class="btn btn-outline-danger px-4 py-2" style="border-radius: 5px; font-size: 0.95rem;">Logout</a>
                </div>

            </div>
        </div>
    </div>

</body>
</html>