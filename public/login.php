<?php
// Start Session & Database Connect
session_start();              // Memulai session untuk menyimpan data login user
include 'db_conn.php';        // File koneksi database

// Array untuk menampung error login
$login_errors = [];

// Proses Form Login (jika POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi: cek jika email / password kosong
    if (empty($email) || empty($password)) {
        $login_errors[] = "Email and password are required.";
    } else {
        // Cegah SQL Injection dengan Prepared Statement
        $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);  // Bind parameter (s = string)
        $stmt->execute();
        $result = $stmt->get_result();

        // Cek apakah user ditemukan
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verifikasi password dengan hash
            if (password_verify($password, $user['password'])) {
                // Jika password benar → simpan data ke session
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['role']      = $user['role']; // simpan role (admin/user)

                // Redirect sesuai role
                if ($user['role'] === 'admin') {
                    header("Location: ../admin/dashboard.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                // Password salah
                $login_errors[] = "Invalid email or password.";
            }
        } else {
            // Email tidak ditemukan
            $login_errors[] = "Invalid email or password.";
        }
        $stmt->close();
    }
}
$conn->close(); // Tutup koneksi DB
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - CLARTÉ</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Inter -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Card Form Login -->
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Login to Your Account</h2>
        
        <!-- Notifikasi sukses (misalnya setelah register) -->
        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($_GET['success']); ?></span>
            </div>
        <?php endif; ?>

        <!-- Tampilkan error login jika ada -->
        <?php if (!empty($login_errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <?php foreach ($login_errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="login.php" method="POST" class="space-y-4">
            <!-- Input Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                              focus:outline-none focus:ring-black focus:border-black sm:text-sm">
            </div>
            
            <!-- Input Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                              focus:outline-none focus:ring-black focus:border-black sm:text-sm">
            </div>
            
            <!-- Tombol Submit -->
            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm 
                               text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none 
                               focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Sign In
                </button>
            </div>
        </form>
        
        <!-- Link ke halaman Register -->
        <div class="text-sm text-center text-gray-500">
            Don't have an account yet? 
            <a href="register.php" class="font-medium text-blue-700 hover:underline">Register Now</a>
        </div>
    </div>
</body>
</html>
