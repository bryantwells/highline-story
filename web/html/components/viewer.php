<?php 

	echo 'one';
	echo var_dump($data);

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

	<?php $i = 0 ?>

	<?php  foreach ($responseArrays as $responseArray): ?>

		<p class="Section-body">

			<span>
				<?= $questions[$i]['label'] ?>
			</span>

			<?php $j = 0 ?>

			<?php foreach ($responseArray as $r): 

				?><span><?= 
					$r 
				?></span><span><?= 
					($j < count($responseArray) - 1) ? $questions[$i]['separator'] : '.'
				?></span><?php
			
			$j++;
			endforeach; ?>

		</p>

		<?php $i++; ?>

	<?php  endforeach; ?>

</section>