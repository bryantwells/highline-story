<?php

	// Initialize arrays to group data by properties
	$qArrays = [];

	// Iterate over the data and group it by properties
	foreach ($data as $entry) {
		$qArrays[1][] = $entry['q1'];
		$qArrays[2][] = $entry['q2'];
		$qArrays[3][] = $entry['q3'];
		$qArrays[4][] = $entry['q4'];
	}

?>

<section>

	<header>
		<h2>Viewer</h2>
	</header>

	<section>
		<?php foreach ($qArrays as $i => $qArray): ?>

			<h3><?= $i ?></h3>

			<p>
				<?php foreach ($qArray as $q): ?>
					<span><?= $q ?></span>
				<?php endforeach; ?>
			</p>
	
		<?php endforeach; ?>
	</section>
	
</section>