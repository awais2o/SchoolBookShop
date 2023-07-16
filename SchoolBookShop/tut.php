
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    .navbar {
  padding: 20px;
}

.nav-item {
  padding: 10px;
}

.form-inline {
  margin-left: auto;
}


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Brand Name</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Add Book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Add Subject</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Add Type</a>
            </li>
          </ul>
          <?php
          if ($loc == 1) {

            ?>
          <form class="form-inline" method="POST"   action="index.php" >
            <div class="dropdown">
              <select name="searchby" id="">
              <option value="title">Title</option>
              <option value="standard">Standard</option>
              <option value="subject">Subject</option>                
              </select>
            </div>
            <input type="text" class="form-control mr-sm-2" placeholder="Search"  name="search" required >
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
<?php } ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </nav>