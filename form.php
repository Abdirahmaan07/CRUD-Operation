<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
.container{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.container form{
    width: 500px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgb(0, 0, 0,0.2), 0 6px 20px 0 rgb(0, 0, 0,0.19);
}
.link-right{
    display: flex;
    justify-content: flex-start;
}
    </style>
</head>
<body>
<div class="container">
    <form method="POST" action="create.php">
        <h4 class="display-4 text-center">Create</h4><hr />
        <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" class="form-control" name="user_name" value="<?php if(isset($_GET['user_name']))
                                                                                               echo $_GET['user_name'];?>" placeholder="Enter Name">
      </div>
      <div class="mb-3">
          <label for="" class="form-label">Phone Number:</label>
          <input type="tel" id="" class="form-control" name="user_mobile" value="<?php if(isset($_GET['user_mobile']))
                                                                                               echo $_GET['user_mobile'];?>" placeholder="Enter Phone Number">
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="user_email" value="<?php if(isset($_GET['user_email']))
                                                                                               echo $_GET['user_email'];?>" placeholder="name@example.com">
     </div>
     <button type="submit" class="btn btn-primary m-1 " name="create">Create</button>
		    <a href="read.php" class="btn btn-secondary m-1 ">View</a>
            </div>
    </form>
</div>
</body>
</html>