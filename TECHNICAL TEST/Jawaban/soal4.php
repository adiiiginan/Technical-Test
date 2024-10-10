<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal no 4 </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Hitung Pengurangan Diagonal Matriks</h2>
<form method="post" action="">
    <table>
        <tr>
            <td><label for="matrixInput">Masukkan matriks (pisahkan dengan koma dan baris dengan titik koma):</label></td>
        </tr>
        <tr>
            <td><input type="text" id="matrixInput" name="matrixInput" required placeholder="Contoh: 1,2,0;4,5,6;7,8,9"></td>
        </tr>
        <tr>
            <td><button type="submit">Hitung Pengurangan</button></td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses input dari pengguna
    $matrixInput = $_POST['matrixInput'];
    
    // Mengonversi input menjadi matriks 2D
    $rows = explode(';', $matrixInput);
    $matrix = array_map(function($row) {
        return array_map('intval', explode(',', $row));
    }, $rows);
    
    // Menghitung jumlah diagonal
    $n = count($matrix);
    $diagonal1 = 0; // Diagonal utama
    $diagonal2 = 0; // Diagonal sekunder

    for ($i = 0; $i < $n; $i++) {
        $diagonal1 += $matrix[$i][$i]; // Elemen diagonal utama
        $diagonal2 += $matrix[$i][$n - 1 - $i]; // Elemen diagonal sekunder
    }

    // Menghitung hasil pengurangan
    $result = $diagonal1 - $diagonal2;

    // Menampilkan hasil matriks dalam bentuk array
    echo "
    <table>
        <tr>
            <th>Matriks Inputan</th>
        </tr>
        <tr>
            <td><pre>" . htmlspecialchars(print_r($matrix, true)) . "</pre></td>
        </tr>
    </table>
    
    <table>
        <tr>
            <th colspan='2'>Hasil Pengurangan Diagonal Matriks</th>
        </tr>
        <tr>
            <th>Diagonal Pertama</th>
            <td>$diagonal1</td>
        </tr>
        <tr>
            <th>Diagonal Kedua</th>
            <td>$diagonal2</td>
        </tr>
        <tr>
            <th>Hasil</th>
            <td>$result</td>
        </tr>
    </table>";
}
?>

</body>
</html>
