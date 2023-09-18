<?php 

	// Read the data from the JSON file
	if (file_exists('../data.json')) {
		$data = json_decode(file_get_contents('../data.json'), true);
	} else {
		$data = [];
	}

	// Check if it's a POST request to delete an entry
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		// Ensure all four input values are provided
		if (
			isset($_POST['update']) &&
			isset($_POST['index']) &&
			isset($_POST['q1']) &&
			isset($_POST['q2']) &&
			isset($_POST['q3']) &&
			isset($_POST['q4'])
		) {

			$index = $_POST['index'];

			// Ensure the index is valid
			if (is_numeric($index) && $index >= 0 && $index < count($data)) {

				// Update the data at the specified index
				$data[$index]['responses']['q1'] = $_POST['q1'];
				$data[$index]['responses']['q2'] = $_POST['q2'];
				$data[$index]['responses']['q3'] = $_POST['q3'];
				$data[$index]['responses']['q4'] = $_POST['q4'];

				// Save the updated data back to the JSON file
				file_put_contents('../data.json', json_encode($data));

			}

			// Response to the client
			echo 'Data updated successfully.';

		} else if (
			isset($_POST['delete']) &&
			isset($_POST['index'])
		) {

			$index = $_POST['index'];

			// Ensure the index is valid
			if (is_numeric($index) && $index >= 0 && $index < count($data)) {

				// Remove the entry at the specified index
				array_splice($data, $index, 1);

				// Save the updated data back to the JSON file
				file_put_contents('../data.json', json_encode($data));

			}

			// Response to the client
			echo var_dump($_POST);
			echo 'Data deleted successfully.';

		} else {

			// If any input is missing, return an error message
			http_response_code(400);
			echo var_dump($_POST);
			echo 'Missing input values.';

		}

	} else {

		// If it's not a POST request, return an error message
		http_response_code(405);
		echo 'Method not allowed.';

	}

?>