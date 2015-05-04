<?php
class item
{
	public $name;
	public $introduce;
	public $picture;
	public $id;
	public $sql;
	public $con;

	public function open()
	{
		$this->con = mysql_connect("localhost","root","root");
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("ss", $this->con);
	}

	public function query()
	{
		if (!mysql_query($this->sql,$this->con))
		{
			die('Error: ' . mysql_error());
		}
		$result = Array('result'=>'success');
		echo json_encode($result);
		
		mysql_close($this->con);
	}

	public function setName()
	{

	}	
}
