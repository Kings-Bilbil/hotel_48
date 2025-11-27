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
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function index()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function loginProcess()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        // TWEAK: Tangkap destinasi redirect
        $redirectTo = $_POST['redirect_to'] ?? 'dashboard';

        if ($this->user->login($email, $password)) {
            $_SESSION['user_id'] = $this->user->id;
            $_SESSION['user_name'] = $this->user->name;
            $_SESSION['user_role'] = $this->user->role;

            // LOGIKA REDIRECT PINTAR
            if ($redirectTo === 'booking') {
                header("Location: index.php?action=booking");
            } else {
                header("Location: index.php?action=dashboard");
            }
            exit();
        } else {
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
        header("Location: index.php");
        exit();
    }

    public function register()
    {
        require_once __DIR__ . '/../Views/auth/register.php';
    }

    public function registerProcess()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            echo "<script>alert('Semua kolom wajib diisi!'); window.history.back();</script>";
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Format Email tidak valid!'); window.history.back();</script>";
            exit;
        }

        if (strlen($password) < 6) {
            echo "<script>alert('Password minimal 6 karakter.'); window.history.back();</script>";
            exit;
        }

        if ($this->user->isEmailExists($email)) {
            echo "<script>alert('Email sudah terdaftar! Silakan login.'); window.location.href='index.php?action=login';</script>";
            exit;
        }

        if ($this->user->register($name, $email, $password)) {
            echo "<script>
                    alert('Registrasi Berhasil! Silakan Masuk.');
                    window.location.href='index.php?action=login';
                  </script>";
        } else {
            echo "<script>alert('Gagal mendaftar. Coba lagi.'); window.history.back();</script>";
        }
    }
}