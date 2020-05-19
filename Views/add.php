<div class="container mt-5">
<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-body">
<form method="POST">
<?php
$registry = new UsersController();
$registry -> registryUsersController();

if(isset($_GET['action'])){
  if($_GET['action'] == "SuccessfulRegistration"){
    echo "<div class='alert alert-success' role='alert'> Successful registration! </div>";
  }else{
    echo "<div class='alert alert-danger' role='alert'> Registration failed! </div>";
  }
}
?>
<center>
<h1>Add Users</h1>
</center>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>