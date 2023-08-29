<?php
 require_once "../config.php";
 $statement=$pdo->prepare("SELECT * FROM request");
 $statement->execute();
 $requests=$statement->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
    <head>
     <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
        <h1>List of Requests</h1>
        <!-- <a href="create.php" target="ifr" type="button" class="btn btn-success">Register Items</a> -->
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Property name</th>
      <th scope="col">Property type</th>
      <th scope="col">Property quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($requests as $i=> $request){?>
    <tr>
      <th scope="row"><?php echo $i + 1;?></th>
      <td><?php echo $request['username'];?></td>
      <td><?php echo $request['property_name'];?></td>
      <td><?php echo $request['property_type'];?></td>
      <td><?php echo $request['property_quantity'];?></td>
      <td>
        <a href="accept.php?request_id=<?php echo $request['request_id'];?>" type="button" class="btn btn-outline-primary">Accept</a>
        <a href="reject.php?request_id=<?php echo $request['request_id'];?>"type="button" class="btn btn-outline-danger" onclick="confirmationDelete(this);return false;">Reject</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<script type="text/javascript">
function confirmationDelete(a)
    {
      var conf = confirm('Are you sure want to reject the disposal?');
      if(conf)
          window.location=a.attr("href");
    }
</script>
    </body>
</html>