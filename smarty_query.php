<?php

	define("USER_HOME_DIR", "/home/a/asudjoko/.HTMLinfo");
	require(USER_HOME_DIR . "/php/Smarty-2.6.26/Smarty.class.php");
	
	$smarty = new Smarty;
	
	$smarty->template_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/templates";
	$smarty->compile_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/templates_c";
	$smarty->cache_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/cache";
	$smarty->config_dir = USER_HOME_DIR . "/wda/PartC/smartydocs/configs";
	
	$connection = @ mysql_connect("yallara.cs.rmit.edu.au:54561", "root", "password");

	mysql_select_db("winestore", $connection);
	
	$query = "SELECT wine_name, year, winery_name, variety, region_name, cost, on_hand, qty
		  FROM wine, winery, grape_variety, region, inventory, items, wine_variety 
		  WHERE wine.winery_id = winery.winery_id 
		  AND	wine.wine_id = wine_variety.wine_id 
		  AND	wine.wine_id = inventory.wine_id 
		  AND	wine.wine_id = items.wine_id 
		  AND	winery.region_id = region.region_id
		  AND	wine_variety.variety_id = grape_variety.variety_id";
						
	if (isset($wineName) && $wineName != "All")
		$query .= " AND wine_name = \"$wineName\"";

	if (isset($wineryName) && $wineryName != "All")
		$query .= " AND winery_name = \"$wineryName\"";
					
	if (isset($regionName) && $regionName != "All")
		$query .= " AND region_name = \"$regionName\"";					
	
	if (isset($varietyName) && $varietyName != "All")
		$query .= " AND variety = \"$varietyName\"";
	
	if (isset($startYear))
		$query .= " AND year >= \"$startYear\"";
	
	if (isset($endYear))
		$query .= " AND year <= \"$endYear\"";

	if (isset($minStock))
		$query .= " AND on_hand >= \"$minStock\"";
	
	if (isset($minOrder))
		$query .= " AND qty >= \"$minOrder\"";
	
	if (isset($minPrice))
		$query .= " AND cost >= \"$minPrice\"";
	
	if (isset($maxPrice))
		$query .= " AND cost <= \"$maxPrice\"";
	
	$result = @ mysql_query($query, $connection);
	
	$data = @ mysql_fetch_array(($result);
	
	$smarty->assign('data', $data);
	
	$smarty->assign('get', $wineName);
	$smarty->assign('get', $wineryName);
	$smarty->assign('get', $regionName);
	$smarty->assign('get', $varietyName);
	$smarty->assign('get', $minYear);
	$smarty->assign('get', $maxYear);
	$smarty->assign('get', $minStock);
	$smarty->assign('get', $minOrder);
	$smarty->assign('get', $minPrice);
	$smarty->assign('get', $maxPrice);	

	$smarty->display('smarty_query.tpl');

?>
