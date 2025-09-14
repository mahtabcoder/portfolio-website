<?php
session_start();
require("db.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

if (!isset($_SESSION['users']) || !isset($_FILES['data'])) {
    error_log("Unauthorized: Session or File not set");
    echo json_encode(["status" => "error", "msg" => "Unauthorized access."]);
    exit;
}

$user_email = $db->real_escape_string($_SESSION['users']);
$file = $_FILES['data'];
$filename = $db->real_escape_string(preg_replace("/[^a-zA-Z0-9_\.-]/", "_", strtolower($file['name'])));
$location = $file['tmp_name'];
$f_size = floatval(round($file['size'] / 1024 / 1024, 2));
error_log("File: $filename, Size: $f_size MB");

// ✅ Allowed file types check
$allowed_types = [
    'image/jpeg',
    'image/png',
    'application/pdf',
    'text/plain',
    'application/zip'
];

if (!in_array($file['type'], $allowed_types)) {
    error_log("Blocked file type: " . $file['type']);
    echo json_encode(["status" => "error", "msg" => "File type not allowed."]);
    exit;
}

// ✅ Allowed file extensions check
$allowed_extensions = ['jpg','jpeg','png','pdf','txt','zip'];
$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if (!in_array($file_ext, $allowed_extensions)) {
    error_log("Blocked file extension: " . $file_ext);
    echo json_encode(["status" => "error", "msg" => "File extension not allowed."]);
    exit;
}

$res = $db->query("SELECT * FROM backend WHERE email = '$user_email'");
if (!$res || $res->num_rows === 0) {
    error_log("User not found for email: $user_email");
    echo json_encode(["status" => "error", "msg" => "User not found."]);
    exit;
}

$user_data = $res->fetch_assoc();
$user_id_folder = "user_" . intval($user_data['id']);
$total_storage = $user_data['storage'];
$old_used_storage = $user_data['used_storage'];
$free_space = $total_storage - $old_used_storage;
error_log("User ID Folder: $user_id_folder, Free Space: $free_space MB");

$folder_path = __DIR__ . "/user_data/$user_id_folder";
$file_url    = "http://localhost:8080/project/user_data/$user_id_folder/$filename";

if (!file_exists($folder_path)) {
    mkdir($folder_path, 0777, true);
    error_log("Created folder: $folder_path");
}

$targetPath = "$folder_path/$filename";

if ($f_size > $free_space) {
    error_log("File too large: $f_size MB > $free_space MB");
    echo json_encode(["status" => "error", "msg" => "File too large. Buy more storage."]);
    exit;
}

if (file_exists($targetPath)) {
    error_log("File already exists: $targetPath");
    echo json_encode(["status" => "error", "msg" => "File already exists."]);
    exit;
}

if (!move_uploaded_file($location, $targetPath)) {
    error_log("Move failed for $targetPath: " . print_r(error_get_last(), true));
    echo json_encode(["status" => "error", "msg" => "File upload failed. Check logs at C:/xampp/apache/logs/error.log"]);
    exit;
}
error_log("File moved to: $targetPath");

$check_table = $db->query("SHOW TABLES LIKE '$user_id_folder'");
if ($check_table->num_rows == 0) {
    $db->query("CREATE TABLE `$user_id_folder` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        file_size FLOAT NOT NULL
    )");
    error_log("Created table: $user_id_folder");
}

$file_store = "INSERT INTO `$user_id_folder` (file_name, file_size) VALUES ('$filename', '$f_size')";
if ($db->query($file_store)) {
    error_log("Insert successful for $filename");
    $response = $db->query("SELECT SUM(file_size) AS uds FROM `$user_id_folder`");
    $aa = $response->fetch_assoc();
    $total_used_file_size = $aa['uds'] ?: 0;

    $update = "UPDATE backend SET used_storage = '$total_used_file_size' WHERE email = '$user_email'";
    if ($db->query($update)) {
        error_log("Storage updated to: $total_used_file_size MB");

        // ✅ Icon handling
        $icon_base_url = "http://localhost:8080/setlogo/";
        $icons = [
            "doc"  => "doc.png",
            "docx" => "doc.png",
            "pdf"  => "pdf.png",
            "jpg"  => "image.png",
            "jpeg" => "image.png",
            "png"  => "image.png",
            "gif"  => "image.png",
            "txt"  => "txt.png",
            "zip"  => "zip.png",
            "rar"  => "zip.png",
        ];

        if (isset($icons[$file_ext])) {
            $basename = $icons[$file_ext];
        } else {
            $basename = "default.png";
        }

        $icon_url = $icon_base_url . urlencode($basename);

        echo json_encode([
            "status" => "success",
            "msg" => "File uploaded successfully",
            "file_url" => $file_url,
            "icon_url" => $icon_url,   // ✅ icon ka url response me
            "used_storage" => floatval($total_used_file_size),
            "total_storage" => $total_storage
        ]);
        exit;
    } else {
        unlink($targetPath);
        error_log("Storage update failed for $user_email");
        echo json_encode(["status" => "error", "msg" => "Upload done, but storage update failed."]);
        exit;
    }
} else {
    unlink($targetPath);
    error_log("DB insert failed for $file_store: " . $db->error);
    echo json_encode(["status" => "error", "msg" => "Upload done, but DB insert failed: " . $db->error]);
    exit;
}
?>
