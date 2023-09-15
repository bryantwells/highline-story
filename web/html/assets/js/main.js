const forms = [...document.querySelectorAll('form')];
forms.forEach((form) => {
	form.addEventListener('submit', (e) => {

		// Prevent the default form submission
		e.preventDefault();

		// Create a FormData object from the form
		const formData = new FormData(form);

		// Add submit button value
		formData.append(e.submitter.name, e.submitter.value);

		// Send a POST request to your PHP script
		fetch(form.action, {
			method: 'POST',
			body: formData
		})
		.then(async function(response) {
			const body = await response.text();
			console.log(body);
		})
		.catch(function(error) {
			console.error('Error:', error);
		})
		.finally(function() {
			location.reload();
		});
	});
});

const textareas = [...document.querySelectorAll('textarea')];
textareas.forEach((textarea) => {
	textarea.parentNode.dataset.replicatedValue = textarea.value;
});