<?php
// Include the database connection file
include('../db_connection.php');

// Define columns
$columns = array(
    0 => 'product_id',
    1 => 'product_description',
    2 => 'product_title',
    3 => 'product_url',
);

// Get total records
$totalData = $conn->query("SELECT COUNT(product_id) as records_total FROM products")->fetch_assoc();
$totalFiltered = $totalData['records_total'];

// Set limit and offset for server-side pagination
$start = isset($_POST['start']) ? $_POST['start'] : 0;
$length = isset($_POST["length"]) ? $_POST["length"] : 10;

// Set order parameters
$columnIndex = isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column'] : 1;
$columnName = $columns[$columnIndex];
$order = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'ASC';

// Set search parameters
$searchValue = $_POST['search']['value'];
$searchQuery = '';

if (!empty($searchValue)) {
    // Adjust the search conditions based on your column names
    $searchQuery = " AND (product_description LIKE '%$searchValue%' OR product_title LIKE '%$searchValue%' OR product_url LIKE '%$searchValue%')";
}

// Fetch records
$sql = "SELECT product_id, product_description, product_title, product_url FROM products WHERE 1 $searchQuery ORDER BY $columnName $order LIMIT $start, $length";
$result = $conn->query($sql);
$data = array();

while ($row = $result->fetch_assoc()) {
    $subdata = array();
    $subdata['product_id'] = $row['product_id'];
    $subdata['product_description'] = $row['product_description'];
    $subdata['product_title'] = $row['product_title'];
    $subdata['product_url'] = $row['product_url'];
    $subdata['action'] = '<a href="#" class="btn btn-sm editBtn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . $row['product_id'] . '"><i class="far fa-edit"></i></a>
                           <a href="#" class="btn  btn-sm deleteBtn" data-id="' . $row['product_id'] . '"><i class="far fa-trash-alt"></i></a>';
    $data[] = $subdata;
}

// Get total filtered records
$sql = "SELECT COUNT(product_id) as records_filtered FROM products WHERE 1 $searchQuery";
$result = $conn->query($sql);
$totalFiltered = $result->fetch_assoc()['records_filtered'];

$json_data = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => intval($totalData['records_total']),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);

echo json_encode($json_data);

// Close the database connection
$conn->close();
?>
