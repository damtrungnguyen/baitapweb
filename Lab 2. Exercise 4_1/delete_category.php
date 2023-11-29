<?php
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem có giá trị `category_id` đã được gửi từ form hay không
    if (isset($_POST['category_id'])) {
        $categoryID = $_POST['category_id'];

        // Xóa danh mục dựa trên categoryID
        $query = 'DELETE FROM categories WHERE categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $result = $statement->execute();
        $statement->closeCursor();

        // Chuyển hướng trở lại trang danh sách danh mục sau khi xóa
        header('Location: category_list.php');
        exit();
    }
}
?>
