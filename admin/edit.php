<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

include '../db_conn.php';

$error = '';
$photo = null;

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
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Foto Galeri</h1>
        
        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php elseif ($photo): ?>
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <form action="dashboard.php" method="POST" class="space-y-4">
                    <input type="hidden" name="edit_photo" value="1">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($photo['id']); ?>">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Foto</label>
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($photo['title']); ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="image_url" class="block text-sm font-medium text-gray-700">URL Gambar</label>
                        <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($photo['image_url']); ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <button type="submit" class="w-full py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Simpan Perubahan</button>
                    <a href="dashboard.php" class="w-full py-2 px-4 block text-center border border-gray-300 rounded-md text-gray-700 hover:bg-gray-200">Batal</a>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>