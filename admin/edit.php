<?php
session_start(); 
// Memulai session untuk mengecek apakah user sudah login dan punya role tertentu

// Cek apakah user sudah login DAN apakah role-nya admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika belum login atau bukan admin, alihkan ke halaman login
    header("Location: ../public/login.php");
    exit();
}

include '../public/db_conn.php'; 
// Koneksi ke database (file db_conn.php menyimpan konfigurasi koneksi)

$error = '';
$photo = null;

// Cek apakah ada parameter ID foto yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT * FROM gallery WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    $photo = $result->fetch_assoc(); // Ambil data foto berdasarkan ID
    $stmt->close();

    if (!$photo) {
        // Jika ID ada tapi datanya tidak ditemukan di DB
        $error = "Foto tidak ditemukan.";
    }
} else {
    // Jika URL tidak mengirimkan parameter ID
    $error = "ID foto tidak diberikan.";
}

// Proses ketika form disubmit untuk update data foto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_photo'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];

    // Update data foto berdasarkan ID
    $stmt = $conn->prepare("UPDATE gallery SET title = ?, category = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $category, $id);

    if ($stmt->execute()) {
        // Jika berhasil update, redirect kembali ke dashboard dengan pesan sukses
        header("Location: dashboard.php?message=" . urlencode("Foto berhasil diperbarui!"));
        exit();
    } else {
        // Jika gagal update, tampilkan error
        $error = "Gagal memperbarui foto: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close(); // Tutup koneksi database
?>

<?php if ($error): ?>
    <!-- Pesan error jika foto tidak ditemukan atau gagal update -->
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php elseif ($photo): ?>
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <!-- Form edit foto -->
        <form action="edit_photo.php" method="POST" class="space-y-4">
            <!-- Hidden input untuk memastikan form ini update photo -->
            <input type="hidden" name="update_photo" value="1">
            <!-- Hidden input untuk ID foto yang sedang diedit -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($photo['id']); ?>">

            <!-- Input Judul Foto -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Photo Title</label>
                <!-- Field text untuk mengubah judul foto -->
                <input type="text" id="title" name="title" 
                    value="<?php echo htmlspecialchars($photo['title']); ?>" 
                    required 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>

            <!-- Input Kategori Foto -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <!-- Dropdown untuk memilih kategori foto -->
                <select id="category" name="category" required 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="Workshop" <?php echo ($photo['category'] == 'Workshop') ? 'selected' : ''; ?>>Creative Workshop</option>
                    <option value="Production" <?php echo ($photo['category'] == 'Production') ? 'selected' : ''; ?>>Production</option>
                    <option value="Campaign & Collaboration" <?php echo ($photo['category'] == 'Campaign & Collaboration') ? 'selected' : ''; ?>>Campaign & Collaboration</option>
                    <option value="Events" <?php echo ($photo['category'] == 'Events') ? 'selected' : ''; ?>>Events</option>
                    <option value="Brand & Activation" <?php echo ($photo['category'] == 'Brand & Activation') ? 'selected' : ''; ?>>Brand & Activation</option>
                </select>
            </div>

            <!-- Preview Gambar Saat Ini -->
            <div>
                <!-- Menampilkan foto yang ada di database untuk referensi admin -->
                <img src="../public/<?php echo htmlspecialchars($photo['file_path']); ?>" 
                     alt="Current Image" 
                     class="w-full h-auto object-cover rounded-md mt-4">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" 
                class="w-full py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">
                Save Changes
            </button>

            <!-- Tombol Batal (kembali ke dashboard tanpa update) -->
            <a href="dashboard.php" 
               class="w-full py-2 px-4 block text-center border border-gray-300 rounded-md text-gray-700 hover:bg-gray-200">
                Cancel
            </a>
        </form>
    </div>
<?php endif; ?>
