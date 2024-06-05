<?php
class bdClass
{
	//$dbuser="tangiers_tangier";
//$pwd="user123";
//$default_db="tangiers_InvestigatorReport";
	function mysqlConnect($host, $userName, $password, $name)
	{
		$connectect = @mysql_connect($host, $userName, $password) or die(mysql_error());
		$selected = @mysql_select_db($name) or die(mysql_error());
	}
	function myQuery($query, $fieldName)
	{
		$this->query = @mysql_query($query) or die(mysql_error());
		$this->rows = @mysql_fetch_array($this->query);
		$this->count_all = @mysql_num_rows($this->query);
		$value = $this->rows[$fieldName];
		return $value;
	}
}
$bdconnect = new bdClass;
//('mysqlserver','dbuser','dbpassword','dbname')
$hello = $bdconnect->mysqlConnect('localhost', 'root', '', 'mylab');
//$hello = $bdconnect->mysqlConnect('localhost', 'tangiers_tangier', 'user123', 'tangiers_InvestigatorReport' );
?>