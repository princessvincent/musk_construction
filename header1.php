
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">

</head>

<script src="./js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="./admin-dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./create-project.php">Create New Project</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./unverify_user.php">Verify Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./list-users.php">Number of Users</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            View All Projects
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item " href="./view_bysite.php">View by Site</a></li>
            <li><a class="dropdown-item" href="./view_bywork.php">View by Work</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="./logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>