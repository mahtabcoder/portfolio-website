<?php
// Folder jahan icons rakhe hain
$iconDir = __DIR__ . "/setlogo/";

// Extension lo (lowercase)
$ext = strtolower(pathinfo($_GET['file'], PATHINFO_EXTENSION));

// Mapping of extensions to icon filenames
$icons = [
    "doc" => "doc.png",
    "docx" => "doc.png",
    "pdf" => "pdf.png",
    "ppt" => "ppt.png",
    "pptx" => "ppt.png",
    "xls" => "xls.png",
    "xlsx" => "xls.png",
    "txt" => "txt.png",
    "mp3" => "mp3.png",
    "mp4" => "mp4.png",
    "mov" => "mov.png",
    "wmv" => "wmv.png",
    "zip" => "zip.png",
    "rar" => "zip.png",
];

// Agar extension ka icon mile
if (isset($icons[$ext]) && file_exists($iconDir . $icons[$ext])) {
    $img = $iconDir . $icons[$ext];
} else {
    // Agar match na ho to default icon
    $img = $iconDir . "default.png"; // ek default.png bana lo
}

// Mime type detect karo
$mime = mime_content_type($img);
header("Content-Type: $mime");
readfile($img);
exit;
