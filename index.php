<?php
require_once('control/list.php');


if(isset($_POST['Save']))
{
  $generationSingleton = ListSingleton::addGeneration($_POST['level'],$_POST['name']);
}
else
  $generationSingleton = ListSingleton::getInstance();

$keys = array_keys($generationSingleton->getGenerationList());

arsort($keys);

$array = $generationSingleton->getGenerationList();


// var_dump($keys);

// exit;

// print_r($array);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Insly Test</a>
    </div>
    
  </div>
</nav>

<form name="frm" method="POST">
<div class="container-fluid">
  <h1>Generation List & Sorting</h1>
  <p>Add new Generation</p>
  <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="level">Level:</label>
        <input type="number" class="form-control" id="level" name="level" required>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
    </div>
    
    
  </div>
  <div class="row">
  <div class="col-sm-3">
      <div class="form-group">
        <button type="submit" name="Save" class="btn btn-primary">Add to List</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="container-fluid">
  <h2>Table</h2>
  <?php
   foreach($keys as $b1)
   {
  ?>
  <p>Level: <?php echo $b1; ?></p>   
  <?php
  if(count($array[$b1]) > 0)
  {
    $i = 0;
  ?>                                       
  <table style="font:weight: bold" class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $data = $array[$b1];
    asort($data);
    $key = array_keys($data);
    foreach($key as $index)
    {
      ++$i;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data[$index]; ?></td>
        <td><a href="delete.php?id=<?php echo $b1; ?>&fid=<?php echo $index; ?>">Delete</a></td>
      </tr>
    <?php
    }
    ?>
    </tbody>
  </table>
  <?php
    }
   }
  ?>
</div>

</body>
</html>