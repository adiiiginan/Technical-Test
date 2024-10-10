<!DOCTYPE html>
<html>
<head>
    <title>Reverse String & Cari Kata Terpanjang</title>
    <style>
        table {
            width: 50%;
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
        }
        button {
            width: 90%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<form method="post" action="">
    <table>
        <tr>
            <th colspan="2">Soal 1: Reverse String with Number</th>
        </tr>
        <tr>
            <td><label for="inputString">Masukkan string:</label></td>
            <td><input type="text" id="inputString" name="inputString" required></td>
        </tr>
        
        <tr>
            <th colspan="2">Soal 2: Cari Kata Terpanjang</th>
        </tr>
        <tr>
            <td><label for="sentence">Masukkan kalimat:</label></td>
            <td><input type="text" id="sentence" name="sentence" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Proses</button>
            </td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses soal 1: Reverse String
    $input = $_POST['inputString'];

    function reverseStringWithNumber($input) {
        $letters = preg_replace('/[^a-zA-Z]/', '', $input); // Hanya ambil huruf
        $numbers = preg_replace('/[^0-9]/', '', $input); // Hanya ambil angka
        $reversedLetters = strrev($letters); // Balik urutan huruf
        return $reversedLetters . $numbers;
    }

    $reversedString = reverseStringWithNumber($input);

    // Proses soal 2: Cari kata terpanjang
    $sentence = $_POST['sentence'];

    function longestWord($sentence) {
        $words = explode(' ', $sentence);
        $longestWord = '';

        foreach ($words as $word) {
            if (strlen($word) > strlen($longestWord)) {
                $longestWord = $word;
            }
        }

        return $longestWord;
    }

    $longest = longestWord($sentence);

    // Tampilkan hasil dalam tabel
    echo "
    <table>
        <tr>
            <th>Soal</th>
            <th>Hasil</th>
        </tr>
        <tr>
            <td>Reverse String (Soal 1)</td>
            <td>" . htmlspecialchars($input) . " &rarr; " . htmlspecialchars($reversedString) . "</td>
        </tr>
        <tr>
            <td>Kata Terpanjang (Soal 2)</td>
            <td>" . htmlspecialchars($sentence) . " &rarr; " . htmlspecialchars($longest) . ": " . strlen($longest) . " karakter</td>
        </tr>
    </table>";
}
?>

</body>
</html>
