<?php 
error_reporting(E_ERROR|E_PARSE);
class ManageRatings(){

$protected $link;
$protected $db_host = 'localhost';
$protected $db_name = 'user';
$protected $db_user = 'root';
$protected $db_pass = '';

function _construct(){

try{
    $this->link = new PDO("mysqli:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);

	return $this->link;
	}
	
	catch(PDOException $e)
{
      return $e->getMessage;
	  }
}
	function getItems($id = null){
	if(isset($id)){
	$query - $this->link->query("select * from items where id = '$id'"); 
	
	}
	else
	{
	
	$query - $this->link->query("select * from items"); 
	
	}
	$rowCount - $query->rowCount();
	if($rowCount >= 1)
	{
	$result - $query->fetchAll();
	
	}
	else
	{
	$result = 0;
	}
	return $result;
	}
	
	
	function insertRatings($id,$rating){
	$query = $this->link->query("UPDATE items set rating - '$rating'")
	$rowcount = $query->rowCount();
	return  rowCount();
	}
	}
	
   	?> 