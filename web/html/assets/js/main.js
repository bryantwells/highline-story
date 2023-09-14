const forms = [...document.querySelectorAll('form')];
forms.forEach((form) => {
	form.addEventListener('submit', (e) => {

		// Prevent the default form submission
		e.preventDefault();

		// Create a FormData object from the form
		const formData = new FormData(form);

		// Send a POST request to your PHP script
		fetch(form.action, {
			method: 'POST',
			body: formData
		})
		.then(function(response) {
			if (response.ok) {
				console.log('Data submitted successfully.');
			} else {
				console.log('Error submitting data.');
			}
		})
		.catch(function(error) {
			console.error('Error:', error);
		})
		.finally(function() {
			location.reload();
		});
	});
});