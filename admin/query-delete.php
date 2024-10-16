<?php
include('includes/dbconnection.php');

if($_GET['qid'])
{
$tid=$_GET['qid'];
$query=$dbh->prepare("delete from tblquery where ID=:tid");
$query->bindParam(':tid',$tid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Quer deleted")</script>';
echo "<script>window.location.href ='manage-publicprofileteacher.php'</script>";
  }
?>