<section 
	class="Section Section--input">

	<section 
		class="Section-body Section-body--input">

		<form 
			class="Form Form--post"
			action="/actions/post.php" 
			method="post">

			<?php foreach ($questions as $questionId => $question): ?>

				<div class="Form-question">

					<h2 class="Form-questionHeader">
						<?= $questions[$questionId]['title'] ?>
					</h2>

					<div class="Form-inputGroup">
						<div class="Form-textWrapper">
							<textarea 
								class="Form-input Form-input--textarea" 
								rows="2"
								id="<?= $questionId ?>" 
								name="<?= $questionId ?>" 
								onInput="this.parentNode.dataset.replicatedValue = this.value"
								placeholder="<?= $questions[$questionId]['label'] ?>"
								required></textarea>
						</div>
					</div>					

				</div>

			<?php endforeach; ?>

			<input 
				class="Button Button--submit" 
				type="submit" 
				value="Submit">

		</form>

	</section>

</section>