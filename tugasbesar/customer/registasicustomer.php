<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #45103E;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 0.8rem;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #45103E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Registrasi Customer</h2>
        <form action="registrasi_proses.php" method="POST">
            <label for="id_customer">ID Customer:</label>
            <input type="text" name="id_customer" id="id_customer" placeholder="Contoh: CUST001" required>

            <label for="Nama_C">Nama:</label>
            <input type="text" name="Nama_C" id="Nama_C" placeholder="Masukkan nama lengkap" required>

            <label for="No_telepon">No. Telepon:</label>
            <input type="number" name="No_telepon" id="No_telepon" placeholder="Masukkan no. telepon" required>

            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>
