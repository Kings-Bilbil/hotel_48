<?php

namespace App\Controllers;

use App\Config\Database;
use App\Models\User;

class AuthController
{
    private $db;
    private $user;

    public function __construct()
    {
        // Siapkan koneksi DB & Model User setiap kali controller dipanggil
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Menampilkan Halaman Login
    public function index()
    {
        // Panggil view (tampilan HTML)
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    // Memproses Data Login dari Form
    public function loginProcess()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Panggil Model
        if ($this->user->login($email, $password)) {
            // Login Sukses -> Simpan Session
            $_SESSION['user_id'] = $this->user->id;
            $_SESSION['user_name'] = $this->user->name;
            $_SESSION['user_role'] = $this->user->role;

            // Redirect ke Dashboard
            header("Location: index.php?action=dashboard");
            exit();
        } else {
            // Login Gagal -> Kembali ke Login + Alert
            echo "<script>
                    alert('Login Gagal! Email atau Password Salah.');
                    window.location.href='index.php?action=login';
                  </script>";
        }
    }

    public function logout()
    {
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        session_destroy();
        
        // Redirect ke file index.php relatif (lebih aman)
        header("Location: index.php");
        exit();
    }

    // Tampilkan Form Register
    public function register()
    {
        require_once __DIR__ . '/../Views/auth/register.php';
    }

    // Proses Data Register
    public function registerProcess()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validasi sederhana
        if (empty($name) || empty($email) || empty($password)) {
            echo "<script>alert('Semua kolom wajib diisi!'); window.history.back();</script>";
            exit;
        }

        // Cek Email Kembar
        if ($this->user->isEmailExists($email)) {
            echo "<script>alert('Email sudah terdaftar! Silakan login.'); window.location.href='index.php?action=login';</script>";
            exit;
        }

        // Simpan ke Database
        if ($this->user->register($name, $email, $password)) {
            echo "<script>
                    alert('Registrasi Berhasil! Silakan Login.');
                    window.location.href='index.php?action=login';
                  </script>";
        } else {
            echo "<script>alert('Gagal mendaftar. Coba lagi.'); window.history.back();</script>";
        }
    }
}