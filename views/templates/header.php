<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container-fluid px-4">
    <span class="navbar-brand mb-0 h1">Food Ordering System</span>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="../../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    <?php endif; ?>
  </div>
</nav>