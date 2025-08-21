<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../public/login.php");
    exit();
}

include '../public/db_conn.php';

$message = '';
$error = '';

// Tentukan folder untuk menyimpan gambar yang diupload
$target_dir = "../public/images/gallery/";

// Buat direktori jika belum ada
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Logika untuk Tambah, Edit, dan Hapus Galeri
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_photo'])) {
        $title = $_POST['title'];
        $category = $_POST['category'];
        
        // Proses upload file
        if (isset($_FILES["file_upload"]) && $_FILES["file_upload"]["error"] == 0) {
            $file_name = basename($_FILES["file_upload"]["name"]);
            $target_file = $target_dir . $file_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Periksa ekstensi file
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
            } else {
                // Pindahkan file ke direktori target
                if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
                    $file_path = "images/gallery/" . $file_name; // Simpan jalur relatif
                    $stmt = $conn->prepare("INSERT INTO gallery (title, file_path, category) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $title, $file_path, $category);
                    
                    if ($stmt->execute()) {
                        $message = "Foto berhasil ditambahkan!";
                    } else {
                        $error = "Gagal menambahkan foto: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $error = "Maaf, terjadi kesalahan saat mengunggah file Anda.";
                }
            }
        } else {
            $error = "File tidak diunggah atau terjadi kesalahan.";
        }
    } elseif (isset($_POST['delete_photo'])) {
        $id = $_POST['id'];

        // Ambil jalur file sebelum dihapus untuk menghapus file fisik
        $stmt_select = $conn->prepare("SELECT file_path FROM gallery WHERE id = ?");
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $result = $stmt_select->get_result();
        $row = $result->fetch_assoc();
        $file_path_to_delete = '../' . $row['file_path'];
        $stmt_select->close();

        // Hapus entri dari database
        $stmt_delete = $conn->prepare("DELETE FROM gallery WHERE id = ?");
        $stmt_delete->bind_param("i", $id);
        if ($stmt_delete->execute()) {
            // Hapus file fisik dari server
            if (file_exists($file_path_to_delete)) {
                unlink($file_path_to_delete);
            }
            $message = "Foto berhasil dihapus!";
        } else {
            $error = "Gagal menghapus foto: " . $stmt_delete->error;
        }
        $stmt_delete->close();
    }
    // Logika edit akan diarahkan ke file edit_photo.php terpisah
}

// Ambil semua foto dari database
$gallery = $conn->query("SELECT * FROM gallery ORDER BY created_at DESC");
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - CLARTÉ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>
        
        <?php if ($message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk Tambah Foto Baru -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Tambah Foto Baru</h2>
            <form action="dashboard.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="add_photo" value="1">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Foto</label>
                    <input type="text" id="title" name="title" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="category" name="category" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                        <option value="Workshop">Workshop</option>
                        <option value="Production">Production</option>
                        <option value="Studio">Studio</option>
                        <option value="Events">Events</option>
                    </select>
                </div>
                <div>
                    <label for="file_upload" class="block text-sm font-medium text-gray-700">Pilih Gambar</label>
                    <input type="file" id="file_upload" name="file_upload" required class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Tambah Foto</button>
            </form>
        </div>

        <!-- Tabel untuk Mengelola Galeri -->
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Kelola Galeri</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if ($gallery->num_rows > 0): ?>
                        <?php while($row = $gallery->fetch_assoc()): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo htmlspecialchars($row['id']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($row['title']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($row['category']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <img src="../public/<?php echo htmlspecialchars($row['file_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="h-16 w-16 object-cover rounded-md">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <!-- Formulir Edit -->
                                    <form action="edit_photo.php" method="GET" class="inline-block">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <button type="submit" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    </form>
                                    <!-- Formulir Hapus -->
                                    <form action="dashboard.php" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <button type="submit" name="delete_photo" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada foto di galeri.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
