<section>

	<header>
		<h2>Admin</h2>
	</header>

	<section>
		<?php foreach ($data as $index => $entry): ?>

			<form action="/actions/delete.php" method="post">
				<input type="hidden" name="delete" value="<?= $index ?>" />
				<p>
					Q1: 
					<br><?= $entry['q1'] ?>
				</p>
				<p>
					Q2:
					<br><?= $entry['q2'] ?>
				</p>
				<p>
					Q3: 
					<br><?= $entry['q3'] ?>
				</p>
				<p>
					Q4: 
					<br><?= $entry['q4'] ?>
				</p>
				<input type="submit" value="Delete">
			</form>

		<?php endforeach; ?>
	</section>

</section>