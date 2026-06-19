<?php

// Entry point yang dipanggil oleh Vercel (lihat routing di vercel.json).
// File ini hanya meneruskan request ke public/index.php milik Laravel,
// karena di Vercel folder /public bukan document root default.

$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';

require __DIR__ . '/../public/index.php';
