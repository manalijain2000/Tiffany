<?php
class Investors {
    public function index() {
        // Define columns for the investors table
        include('../db_connection.php');
        $columns = array(
            0 => 'inquiry_id',
            1 => 'inquiry_contact',
            2 => 'created_at',
        );
    
        // Get total records for the investors table
        $totalData = $conn->query("SELECT COUNT(inquiry_id) as records_total FROM inquiries")->fetch_assoc();
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
            $searchQuery = " AND (inquiry_contact LIKE '%$searchValue%' OR created_at LIKE '%$searchValue%')";
        }
    
        // Fetch records from the investors table
        $sql = "SELECT inquiry_id, inquiry_contact, created_at FROM inquiries WHERE 1 $searchQuery ORDER BY $columnName $order" . " LIMIT $start, $length";
        $result = $conn->query($sql);
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $subdata = array();
            $subdata['inquiry_id'] = $row['inquiry_id'];
            $subdata['inquiry_contact'] = $row['inquiry_contact'];
            // set timezone or else convert utc to Asia/Calcutta
            $created_at_utc = new DateTime($row['created_at'], new DateTimeZone('UTC'));
            $created_at_utc->setTimezone(new DateTimeZone('Asia/Calcutta'));
            $formatted_created_at = $created_at_utc->format('d M Y h:i A');
            $subdata['created_at'] = $formatted_created_at;
            $data[] = $subdata;
        }
    
        // Get total filtered records
        $sql = "SELECT COUNT(inquiry_id) as records_filtered FROM inquiries WHERE 1 $searchQuery";
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
    }
    
}

$investorInstance = new Investors();
// Check if the index function should be called
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $investorInstance->index();
    exit;
}
?>
