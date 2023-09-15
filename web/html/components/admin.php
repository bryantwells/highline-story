<section
	class="Section Section--admin">

	<section
		class="Section-body Section-body--admin">

		<? foreach ($data as $rId => $responseArray): ?>

			<form 
				class="Form Form-response"
				action="/actions/update.php" 
				method="post">

				<? $i = 0; ?>

				<? foreach ($responseArray as $response): ?>

					<? $qId = 'q' . $i + 1 ?>

					<div class="Form-inputGroup">
						<label class="Form-label">
							<?= $questions[$i]['label'] ?>...
						</label>

						<div 
							class="Form-textWrapper">
							<textarea
								class="Form-input Form-input--textarea"
								rows="1"
								id="<?= $qId ?>" 
								name="<?= $qId ?>" 
								onInput="this.parentNode.dataset.replicatedValue = this.value"><?= 
								$response
							?></textarea>
						</div>
					</div>

					<? $i++; ?>
					
				<? endforeach; ?>

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
					value="<?= $rId ?>"
				/>

			</form>

		<? endforeach; ?>

	</section>

</section>