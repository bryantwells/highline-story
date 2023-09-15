<?php

	// Initialize arrays to group data by properties
	$responseArrays = [];

	// Iterate over the data and group it by properties
	foreach ($data as $response) {
		$responseArrays[0][] = $response['q1'];
		$responseArrays[1][] = $response['q2'];
		$responseArrays[2][] = $response['q3'];
		$responseArrays[3][] = $response['q4'];
	}

?>

<section
	class="Section Section--viewer">

	<? $i = 0 ?>

	<?php foreach ($responseArrays as $responseArray): ?>

		<p class="Section-body">

			<span>
				<?= $questions[$i]['label'] ?>
			</span>

			<? $j = 0 ?>

			<? foreach ($responseArray as $r): 

				?><span><?= 
					$r 
				?></span><span><?= 
					($j < count($responseArray) - 1) ? $questions[$i]['separator'] : '.'
				?></span><?
			
			$j++;
			endforeach; ?>

		</p>

		<? $i++; ?>

	<?php endforeach; ?>

</section>

