<?php
function sum($limit) {
	$sum = 0;
	for ($i=1; $i<=$limit; $i++)
		$sum += $i;
	return $sum;
}

echo "Sum of 5: ".sum(5)."<br />";
$data = array(2, 5, 9);
$result = array_map("sum", $data);
print_r($result);
echo "<hr />";
echo implode(',',$result);
?>