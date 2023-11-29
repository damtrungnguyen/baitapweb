<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Quản Lý Sản Phẩm</h1></header>
<main>

    <h1>Danh sách danh mục</h1>
    <table>
        <tr>
            <th>Tên</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['categoryName']; ?></td>
                <td>
                <form action="delete_category.php" method="post">
                    <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Xoá" class="delete-button">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
            </tr>
      
    
    </table>

   
    
    <h2>Thêm Danh Mục</h2>
<form action="add_category.php" method="post">
    <label for="category_name">Tên danh mục:</label>
    <input type="text" id="category_name" name="category_name" required>
    <input type="submit" value="Thêm danh mục">
</form>

    
    <br>
    <p><a href="index.php">Danh Sách Sản Phẩm   </a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>