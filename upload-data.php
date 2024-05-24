<?php
// Pastikan form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $full_name = $_POST["full-name"];
    $interest = $_POST["interest"];
    $no_wa = $_POST["no-hp"];
    $konfirm_no_wa = $_POST["konfirm-no_hp"];
    $password = $_POST["password"];
    
    // Validasi data (Anda bisa menambahkan validasi sesuai kebutuhan)
    if ($no_wa !== $konfirm_no_wa) {
        echo "Nomor Whatsapp dan konfirmasi Nomor Whatsapp tidak cocok.";
        exit; // Menghentikan eksekusi kode jika validasi gagal
    }

    // Simpan ke database
    $servername = "localhost"; // Ganti dengan nama server Anda
    $username = "ruangbakti_go"; // Ganti dengan username database Anda
    $password_db = "c1YVRmO3"; // Ganti dengan password database Anda
    $dbname = "ruangbakti_go"; // Ganti dengan nama database Anda

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi Gagal: " . $conn->connect_error);
    }

    // Query SQL untuk memasukkan data ke dalam tabel
    $sql = "INSERT INTO pendaftar (full_name, interest, no_wa, password)
            VALUES ('$full_name', '$interest', '$no_wa', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dimasukkan ke dalam database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>
