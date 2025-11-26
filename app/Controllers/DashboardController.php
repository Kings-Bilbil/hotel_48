<?php

namespace App\Controllers;

class DashboardController
{
    public function __construct()
    {
        // 1. Mulai session di setiap method
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // 2. PROTEKSI: Jika belum login, redirect ke login page
        if (!isset($_SESSION['user_id'])) {
            header("Location: /hotel_48/public/index.php?action=login");
            exit();
        }
    }

    public function index()
    {
        // Pastikan tidak ada echo di sini!
        
        $role = $_SESSION['user_role'];
        $userName = $_SESSION['user_name'];

        $data = [
            'title' => 'Dashboard ' . ucfirst($role),
            'user' => $userName,
            'role' => $role
        ];

        require_once __DIR__ . '/../Views/dashboard/index.php';
    }
}