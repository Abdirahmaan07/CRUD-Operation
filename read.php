<?php 
include 'sqlread.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
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
.box{
    width: 750px;
}
.container table{
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgb(0, 0, 0,0.2), 0 6px 20px 0 rgb(0, 0, 0,0.19);
}
.table {
            border-radius: 10px;
            overflow: hidden;
        }
.link-right{
    display: flex;
    justify-content: flex-end;
}
    </style>
</head>
<body>
<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Read</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
                  <th scope="col">Phone</th>
			      <th scope="col">Email</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $tableData = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $tableData++;
			  	 ?>
			    <tr>
			      <th scope="row"><?=$tableData?></th>
			      <td><?=$rows['name']?></td>
                  <td><?=$rows['mobile']?></td>
			      <td><?php echo $rows['email']; ?></td>
			      <td><a href="update.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-success">Update</a>

					  <a href="sqldelete.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			<div class="link-right">
				<a href="form.php" class="btn btn-secondary">Create</a>
			</div>
		</div>
	</div>
</body>
</html>