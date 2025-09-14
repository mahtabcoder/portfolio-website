<?php
session_start();
require("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $stmt = $db->prepare("SELECT id, password FROM backend WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        $hashed_pass = $row['password'];

        if (password_verify($pass, $hashed_pass)) {
            $_SESSION['users'] = $email;

            $user_id = $row['id'];
            $user_table_name = "user_" . intval($user_id);

            $create_user_table = "
                CREATE TABLE IF NOT EXISTS `$user_table_name` (
                    id INT(11) NOT NULL AUTO_INCREMENT,
                    file_name VARCHAR(100),
                    file_size VARCHAR(100),
                    date_time DATETIME DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                )
            ";

            if ($db->query($create_user_table)) {
                $main_dir = "user_data/";
                if (!file_exists($main_dir)) {
                    mkdir($main_dir, 0777, true);
                }

                $folder_path = $main_dir . $user_table_name;
                if (!file_exists($folder_path)) {
                    mkdir($folder_path, 0777, true);
                }

                echo "success";
                exit;

            } else {
                echo "table_not_created";
                exit;
            }

        } else {
            echo "wrong_password";
            exit;
        }
    } else {
        echo "user_not_found";
        exit;
    }
} else {
    echo "unauthorised";
    exit;
}
?>
