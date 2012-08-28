<?php

	define("USER_HOME_DIR", "/home/a/asudjoko/.HTMLinfo");
	require(USER_HOME_DIR . "/php/Smarty-3.1.11/libs/Smarty.class.php");
	
	$smarty = new Smarty();
	
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
	
	$query = "SELECT DISTINCT region_name
                  FROM region";
				  
	$results = mysql_query($query, $connection);
		
        $i=0;
	while ($row = @ mysql_fetch_array($results))
           $resultArray[$i++] = $row[region_name];
	
        $smarty->assign('id', $resultArray);
        $smarty->assign('region', $resultArray);
     
        $query = "SELECT DISTINCT variety
                  FROM grape_variety";

        $results = mysql_query($query, $connection);

        $i=0;
        while ($row = @ mysql_fetch_array($results))
           $resultArray[$i++] = $row[variety];

        $smarty->assign('id', $resultArray);
        $smarty->assign('variety', $resultArray);

        $query = "SELECT DISTINCT year
                  FROM wine";

        $results = mysql_query($query, $connection);

        $i=0;
        while ($row = @ mysql_fetch_array($results))
           $resultArray[$i++] = $row[year];

        $smarty->assign('id', $resultArray);
        $smarty->assign('year', $resultArray);

	$smarty->display('smarty_search.tpl');
	
?>
