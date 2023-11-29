<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem có giá trị `category_name` đã được gửi từ form hay không
    if (isset($_POST['category_name'])) {
        $categoryName = $_POST['category_name'];

        // Thêm danh mục mới vào cơ sở dữ liệu
        $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryName', $categoryName);
        $result = $statement->execute();
        $statement->closeCursor();

        // Chuyển hướng trở lại trang danh sách danh mục sau khi thêm
        header('Location: category_list.php');
        exit();
    }
}
?>