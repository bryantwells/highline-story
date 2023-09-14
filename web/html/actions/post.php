<?php

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ensure all four input values are provided
    if (
        isset($_POST['q1']) &&
        isset($_POST['q2']) &&
        isset($_POST['q3']) &&
        isset($_POST['q4'])
    ) {

        // Define the new object
        $newObject = array(
            'q1' => $_POST['q1'],
            'q2' => $_POST['q2'],
            'q3' => $_POST['q3'],
            'q4' => $_POST['q4']
        );

        // Read the existing data from the JSON file if it exists
        $data = [];
        if (file_exists('../data.json')) {
            $data = json_decode(file_get_contents('../data.json'), true);
        }

        // Append the new object to the array
        $data[] = $newObject;

        // Encode the updated data and write it back to the file
        file_put_contents('../data.json', json_encode($data));

        // Response to the client
        echo 'Data saved successfully.';

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