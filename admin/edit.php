<?php
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../public/login.php");
    exit();
}

include '../public/db_conn.php';

$error = '';
$photo = null;

// Get photo data from the database based on the provided ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM gallery WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $photo = $result->fetch_assoc();
    $stmt->close();

    if (!$photo) {
        $error = "Foto tidak ditemukan.";
    }
} else {
    $error = "ID foto tidak diberikan.";
}

// Handle form submission for updating photo data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_photo'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("UPDATE gallery SET title = ?, category = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $category, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?message=" . urlencode("Foto berhasil diperbarui!"));
        exit();
    } else {
        $error = "Gagal memperbarui foto: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Foto - CLARTÉ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Photo Gallery</h1>
        
        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php elseif ($photo): ?>
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <form action="edit_photo.php" method="POST" class="space-y-4">
                    <input type="hidden" name="update_photo" value="1">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($photo['id']); ?>">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Photo Tittle</label>
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($photo['title']); ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" name="category" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="Workshop" <?php echo ($photo['category'] == 'Workshop') ? 'selected' : ''; ?>>Creative Workshop</option>
                            <option value="Production" <?php echo ($photo['category'] == 'Production') ? 'selected' : ''; ?>>Production</option>
                            <option value="Campaign & Collaboration" <?php echo ($photo['category'] == 'Campaign & Collaboration') ? 'selected' : ''; ?>>Campaign & Collaboration</option>
                            <option value="Events" <?php echo ($photo['category'] == 'Events') ? 'selected' : ''; ?>>Events</option>
                            <option value="Brand & Activation" <?php echo ($photo['category'] == 'Brand & Activation') ? 'selected' : ''; ?>>Brand & Activation</option>

                        </select>
                    </div>
                    <div>
                        <img src="../public/<?php echo htmlspecialchars($photo['file_path']); ?>" alt="Current Image" class="w-full h-auto object-cover rounded-md mt-4">
                    </div>
                    <button type="submit" class="w-full py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Save Changes</button>
                    <a href="dashboard.php" class="w-full py-2 px-4 block text-center border border-gray-300 rounded-md text-gray-700 hover:bg-gray-200">cancel</a>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
