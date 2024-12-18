<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Font Style */
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            font-size: 1.2rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .nav-link:hover {
            color: #FFD700 !important; /* Golden color on hover */
            transform: scale(1.1); /* Slight zoom effect */
        }
        .nav-link.active {
            font-weight: bold;
        }
    </style>
</head>
<body>
  <!-- Navbar atas -->
  <nav class="navbar bg-body-light">
    <div class="container">
        <img src="" alt="">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!-- Navbar bawah -->
  <nav class="navbar navbar-expand-lg" style="background-color: #00008B">
    <div class="container-fluid">
      <div class="d-flex justify-content-center w-100">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Pricing</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
