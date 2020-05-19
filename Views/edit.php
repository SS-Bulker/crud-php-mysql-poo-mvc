<div class="container mt-5">
<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-body">
<form method="POST">
<center>
<h1>Edit Users</h1>
</center>
<?php
$edit = new UsersController();
$edit -> updateListUsersController();
$edit -> updateUsersController();
?>
</form>
</div>
</div>
</div>
</div>
</div>