<h2>Matters</h2>
<div class="clear"></div>

<div id="content-right">
<?php
/*
$totalCategory=count($categoryVals);
$icx2=0;
for($icx1=0; $icx1<4;$icx1++)
{
	$catStatValues[$icx1]="<div class=\"person-list\"><ul>";
	for($icx=0; $icx<ceil($totalCategory/4);$icx++)
	{
		$numVal=$icx1+4*$icx;
		if(isset($categoryVals[$numVal]) && isset($categoryVals[$icx2]))
		{
			$catStatValues[$icx1].="<li><a href=\"".HOST_ADDRESS."verdicts/".$categoryVals[$icx2]['Category']['url']."\" class=\"head1\">".$categoryVals[$icx2]['Category']['category_name']." </a></li>";
			$icx2++;
		}
	}
	$catStatValues[$icx1].="</ul></div>";
	echo $catStatValues[$icx1];
}
*/
foreach($categoryVals as $category)
{
	echo "<h3>".$category['Category']['category_name']."</h2>";
	//echo "<p>".$category['Category']['category_verdict']."</p>";
}
?>
<div class="clear"></div>
</div>