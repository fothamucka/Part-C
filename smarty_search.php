<?php

	define("USER_HOME_DIR", "/home/a/asudjoko/.HTMLinfo");
	require("USER_HOME_DIR . "/php/Smarty-2.6.26/Smarty.class.php");
	
	$smarty = new $Smarty();
	
	$smarty->template_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/templates";
	$smarty->compile_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/templates_c";
	$smarty->cache_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/cache";
	$smarty->config_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/configs";
	
	$connection = mysql_connect("yallara.cs.rmit.edu.au:54561", "root", "password");
	mysql_select_db("winestore", $connection);
	
	$smarty->assign('get', $wineName);
	$smarty->assign('get', $wineryName);
	$smarty->assign('get', $minStock);
	$smarty->assign('get', $minOrder);
	$smarty->assign('get', $minPrice);
	$smarty->assign('get', $maxPrice);
	
	function selectOption($connection, $tableName, $columnName, $dropdownName)
	{
		$query = "SELECT DISTINCT $columnName
				  FROM $tableName";
				  
		$results = mysql_query ($query, $connection)
		
		$i=0;
		while ($row = @ mysql_fetch_array($result))
		{
			$resultArray[i++] = $row[$columnName];
		}
		
		$smarty->assign('dropdownName', $resultArray());
	}
	
	selectOption($connection, "region", "region_name")
	
	selectOption($connection, "grape_variety", "variety")
	
	selectOption($connection, "wine", "year")
	
	$smarty->display('smarty_search.tpl');
	
?>
