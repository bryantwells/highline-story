const textareas = [...document.querySelectorAll('textarea')];
textareas.forEach((textarea) => {
	textarea.parentNode.dataset.replicatedValue = textarea.value;
});