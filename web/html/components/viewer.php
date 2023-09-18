<?php 

	// Initialize arrays to group data by properties
	$chapters = [];

	// Iterate over the data and group it by properties
	foreach ($entries as $entry) {
		$chapters[0][] = $entry['responses']['q1'];
		$chapters[1][] = $entry['responses']['q2'];
		$chapters[2][] = $entry['responses']['q3'];
		$chapters[3][] = $entry['responses']['q4'];
	}

?>

<section
	class="Section Section--viewer">

	<?php $chapterIndex = 0 ?>

	<?php  foreach ($chapters as $chapter): ?>

		<p class="Section-body">

			<?php $responseIndex = 0 ?>

			<?php foreach ($chapter as $response): ?>

				<span><?= $response ?></span>
				
				<?php $responseIndex++;?>

			<?php endforeach; ?>

		</p>

		<?php $chapterIndex++; ?>

	<?php endforeach; ?>

</section>