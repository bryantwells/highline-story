<section
	class="Section Section--admin">

	<section
		class="Section-body Section-body--admin">

		<?php foreach ($entries as $entryId => $entry): ?>

			<form 
				class="Form Form-response"
				action="/actions/update.php" 
				method="post">

				<?php foreach ($entry['responses'] as $questionId => $response): ?>

					<div class="Form-inputGroup">

						<label class="Form-label">
							<?= $questionId ?>
						</label>

						<div 
							class="Form-textWrapper">
							<textarea
								class="Form-input Form-input--textarea"
								rows="1"
								id="<?= $questionId ?>" 
								name="<?= $questionId ?>" 
								onInput="this.parentNode.dataset.replicatedValue = this.value"><?= 
								$response
							?></textarea>
						</div>
					</div>
					
				<?php endforeach; ?>

				<div class="Form-buttonGroup">
					<input 
						class="Button Button--delete"
						type="submit" 
						value="Delete"
						name="delete">
					<input 
						class="Button Button--update"
						type="submit" 
						value="Update"
						name="update">
				</div>
				
				<input 
					type="hidden" 
					name="index" 
					value="<?= $entryId ?>"
				/>

			</form>

		<?php endforeach; ?>

	</section>

</section>