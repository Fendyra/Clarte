<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - CLARTÉ</title>
    <!-- Import Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Gunakan font Inter dari Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <?php
    // Mulai session untuk menyimpan data sementara
    session_start();
    // Hubungkan ke database
    include 'db_conn.php';

    // Array untuk menampung pesan error
    $errors = [];

    // Cek apakah form dikirim menggunakan metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil input user dari form, gunakan null coalescing untuk menghindari error
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        // ================= VALIDASI INPUT =================
        if (empty($name)) {
            $errors[] = "Name is required.";
        }
        if (empty($email)) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Validasi format email
            $errors[] = "Invalid email format.";
        }
        if (empty($password)) {
            $errors[] = "Password is required.";
        }
        if ($password !== $confirm_password) {
            // Password harus sama dengan konfirmasi password
            $errors[] = "Passwords do not match.";
        }

        // ================= PROSES PENDAFTARAN =================
        if (empty($errors)) {
            // Cek apakah email sudah digunakan sebelumnya
            $stmt_check = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $stmt_check->store_result();
            
            if ($stmt_check->num_rows > 0) {
                // Email sudah terdaftar
                $errors[] = "Email already registered.";
            } else {
                // Enkripsi password sebelum disimpan ke database
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert data pengguna baru ke database dengan prepared statement
                $stmt_insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt_insert->bind_param("sss", $name, $email, $hashed_password);
                
                if ($stmt_insert->execute()) {
                    // Jika berhasil, buat pesan sukses dan redirect ke halaman login
                    $success = "Registration successful! You can now login.";
                    header("Location: login.php?success=" . urlencode($success));
                    exit();
                } else {
                    // Jika gagal simpan
                    $errors[] = "Error during registration: " . $stmt_insert->error;
                }
                $stmt_insert->close();
            }
            $stmt_check->close();
        }
    }
    // Tutup koneksi database
    $conn->close();
    ?>
    
    <!-- ================= FORM REGISTER ================= -->
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Create New Account</h2>

        <!-- Tampilkan error jika ada -->
        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Form Registrasi -->
        <form action="register.php" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required minlenght="6"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
            </div>
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="6"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
            </div>
            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Regist
                </button>
            </div>
        </form>

        <!-- Link ke halaman login -->
        <div class="text-sm text-center text-gray-500">
            Already have an account? <a href="login.php" class="font-medium text-blue-700 hover:underline">Login</a>
        </div>
    </div>
</body>
</html>
