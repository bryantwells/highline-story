<?php

	// Read the data from the JSON file
	if (file_exists('../data.json')) {
		$data = json_decode(file_get_contents('../data.json'), true);
	} else {
		$data = [];
	}

	// Check if it's a POST request to delete an entry
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['delete'])) {

			$indexToDelete = $_POST['delete'];

			// Ensure the index is valid
			if (is_numeric($indexToDelete) && $indexToDelete >= 0 && $indexToDelete < count($data)) {

				// Remove the entry at the specified index
				array_splice($data, $indexToDelete, 1);

				// Save the updated data back to the JSON file
				file_put_contents('../data.json', json_encode($data));

			}

			// Response to the client
			echo 'Data deleted successfully.';

		} else {

			// If any input is missing, return an error message
			http_response_code(400);
			echo 'Missing input values.';

		}
	} else {

		// If it's not a POST request, return an error message
		http_response_code(405);
		echo 'Method not allowed.';

	}

?>