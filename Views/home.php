<?php
if(isset($_GET['action'])){
  if($_GET['action'] == "SuccessfulUpdate"){
    echo "<div class='alert alert-success' role='alert'> Successful update! </div>";
  }
  if($_GET['action'] == "SuccessfulDelete"){
    echo "<div class='alert alert-success' role='alert'> Successful Delete! </div>";
  }
}
?>
<div class="container">
<div class="row mt-5">
<div class="col-md-8">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
#List Users
$list = new UsersController();
$list -> listUsersController();
#Delete Users
$delete = new UsersController();
$delete -> deleteUsersController();
?>
  </tbody>
</table>
</div>
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
  }
}
?>
<center>
<h1>Add Users</h1>
</center>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" name="address" placeholder="Enter address" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
