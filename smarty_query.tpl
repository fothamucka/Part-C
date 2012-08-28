<html>
<head>
   <title>Explore for Wines</title>
</head>

<h1>Collection of Wines</h1>

<body>
   
   {if $hits > 0}
      <table>
	 <tr>
	    <th>Wine Name</th>
	    <th>Winery Name</th>
  	    <th>Region</th>
	    <th>Variety Name</th>  
	    <th>Year</th>
 	    <th>Cost</th>
	    <th>Total Bottles</th>
 	    <th>Total Stock</th>
	    <th>Sales Revenue</th>
	 </tr>
	 {foreach from=$data item="entry"}
	    <tr>
	       <td align="center">{$entry.wine_name|escape}</td> 
	       <td align="center">{$entry.winery_name|escape}</td>
	       <td align="center">{$entry.region_name|escape}</td>
	       <td align="center">{$entry.variety|escape}</td>
	       <td align="center">{$entry.year|escape}</td>
	       <td align="center">{$entry.cost|escape}</td>
	       <td align="center">{$entry.qty|escape}</td>
               <td align="center">{$entry.on_hand|escape}</td>
	       <td align="center">{$entry.qty|escape}*{$entry.cost|escape}</td>
	    </tr>
	 {foreachelse}
	    <br>No records found matching your search
	 {/foreach}

      </table>
   {/if}

</body>

</html>
