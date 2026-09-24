<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$food_menu = [
    [
        'id' => 1,
        'name' => 'Nasi Lemak',
        'image' => '../images/NasiLemak.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Chicken Chop',
        'image' => '../images/ChickenChop.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Burger',
        'image' => '../images/Burger.jpg'
    ],
    [
        'id' => 4,
        'name' => 'Spaghetti',
        'image' => '../images/Spaghetti.jpg'
    ],
    [
        'id' => 5,
        'name' => 'Nasi Goreng',
        'image' => '../images/NasiGoreng.jpg'
    ]

];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu - Food Ordering System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class = "container-fluid px-4 d-flex justify-content-between align-items-center">
        <span class="navbar-brand mb-0 h1">Food Ordering</span>
        <a href="../../logout.php" class="btn btn-outline-light btn-sm" onclick="return confirm('Are you sure you want to log out');">Logout</a>
    </div>
</nav>

<div class="container pb-5">
    <div class = "row justify-content-center">
        <div class = "col-md-8">
            <div class="card p-4 bg-white shadow-sm rounded-3">
                <h3 class = "text-center mb-4 text-dark fw-bold">Food Menu</h3>

                <form action="../controllers/OrderController.php" method="POST">
                    <div class="row g-4">
                        <?php foreach ($food_menu as $food): ?>
                            <div class = "col-md-6">
                                <div class="card h-100 border text-center shadow-sm">
                                    <img src="<?php echo $food['image']; ?>" class="card-img-top" alt="<?php echo $food['name']; ?>" onerror="this.src='https://via.placeholder.com/200x150?text=Food+Image'">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title text-dark"><?php echo $food['name']; ?></h5>
                                            <div class = "form-check d-flex justify-content-center align-items-center mt-2">
                                                <input class="form-check-input me-2" type="checkbox" name="selected_food[]" value="<?php echo $food['name']; ?>" id="food_<?php echo $food['id']; ?>"> 
                                                <label class="form-check-label text-secondary small" for="food_<?php echo $food['id']; ?>">Select</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn-success px-5 py-2 fw-bold">Order Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>