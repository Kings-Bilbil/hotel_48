<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        // Cek session untuk mengatur tombol di navbar (Login vs Dashboard)
        if (session_status() == PHP_SESSION_NONE) session_start();
        
        $isLoggedIn = isset($_SESSION['user_id']);
        
        $data = [
            'title' => 'Selamat Datang di Hotel 48',
            'is_logged_in' => $isLoggedIn
        ];

        require_once __DIR__ . '/../Views/home/landing.php';
    }
}