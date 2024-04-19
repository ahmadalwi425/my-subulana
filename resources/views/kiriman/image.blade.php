<!DOCTYPE html>
<html>
<head>
    <title>Gambar Full Page</title>
    <style>
        /* Mengatur margin dan padding agar gambar memenuhi seluruh halaman */
        body {
            margin: 0;
            padding: 0;
        }
        /* Mengatur gambar memenuhi seluruh halaman */
        img {
            width: 100vw; /* Lebar gambar setara dengan lebar viewport */
            height: 100vh; /* Tinggi gambar setara dengan tinggi viewport */
            object-fit: cover; /* Menyesuaikan gambar sesuai dengan rasio aspek */
        }
    </style>
</head>
<body>
    <!-- Ganti base64_image_data dengan data base64 gambar Anda -->
    <img src="data:image/jpeg;base64,{{ $foto }}" alt="Gambar Full Page">
</body>
</html>