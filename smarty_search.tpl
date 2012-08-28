<html>
<head>
   <title>Explore for Wines</title>
</head>

<body>
  
   <form action="./HTMLinfo/wda/PartC/docs/smarty_query.php" method="get">
      <br>Enter a wine name :
      <input type="text" name="wineName" value="{$get.wineName|escape}">
      <br>Enter a winery name :
      <input type="text" name="wineryName" value="{$get.wineryName|escape}">
      <br>Region :
      <select name=regionName>
         {html_options values=$id output=$region value="{$get.regionName|escape}"}
      </select>
      <br>Grape variety :
      <select name=varietyName>
         {html_options values=$id output=$variety value="{$get.varietyName|escape}"}
      </select>
      <br>Starting year range :
      <select name=minYear>
         {html_options values=$id output=$year value="{$get.minYear|escape}"}
      </select>
      <br>Ending year range :
      <select name=maxYear>
         {html_options values=$id output=$year value="{$get.maxYear|escape}"}
      </select>
      <br>Enter minimum no. of stocked wines :
      <input type="text" name="minStock" value="{$get.minStock|escape}">
      <br>Enter minimum no. of ordered wines :
      <input type="text" name="minOrder" value="{$get.minOrder|escape}">
      <br>Enter minimum price range :
      <input type="text" name="minPrice" value="{$get.minPrice|escape}">
      <br>Enter maximum price range :
      <input type="text" name="maxPrice" value="{$get.maxPrice|escape}">
      <br><input type="submit" value="Search wines">
   </form>

</body>
</html>
