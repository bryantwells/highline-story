<section 
	class="Section Section--input">

	<section 
		class="Section-body Section-body--input">

		<form 
			class="Form Form--post"
			action="/actions/post.php" 
			method="post">

			<? foreach ($questions as $i => $question): ?>

				<? $id = 'q' . $i + 1 ?>

				<div class="Form-question">

					<h2 class="Form-questionHeader">
						<?= $questions[$i]['title'] ?>
					</h2>

					<div class="Form-inputGroup">
						<label 
							class="Form-label" 
							for="<?= $id ?>">
							<?= $questions[$i]['label'] ?>...
						</label>

						<div class="Form-textWrapper">
							<textarea 
								class="Form-input Form-input--textarea" 
								rows="2"
								id="<?= $id ?>" 
								name="<?= $id ?>" 
								onInput="this.parentNode.dataset.replicatedValue = this.value"
								required></textarea>
						</div>
					</div>					

				</div>

			<? endforeach; ?>

			<input 
				class="Button Button--submit" 
				type="submit" 
				value="Submit">

		</form>

	</section>

</section>