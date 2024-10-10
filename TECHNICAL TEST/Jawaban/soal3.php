<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal no 3</title>
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


<form method="post" action="">
    <table>
        <tr>
            <td><label for="inputArray">Masukkan array INPUT (pisahkan dengan koma):</label></td>
        </tr>
        <tr>
            <td><input type="text" id="inputArray" name="inputArray" required></td>
        </tr>
        <tr>
            <td><label for="queryArray">Masukkan array QUERY (pisahkan dengan koma):</label></td>
        </tr>
        <tr>
            <td><input type="text" id="queryArray" name="queryArray" required></td>
        </tr>
        <tr>
            <td><button type="submit">Hitung Frekuensi</button></td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses input dari pengguna
    $inputArray = array_map('trim', explode(',', $_POST['inputArray']));  // INPUT
    $queryArray = array_map('trim', explode(',', $_POST['queryArray']));    // QUERY

    // Fungsi untuk menghitung frekuensi kata dalam QUERY pada INPUT
    function countFrequencies($input, $query) {
        $frequencies = [];
        foreach ($query as $word) {
            // Hitung berapa kali setiap kata dalam QUERY muncul di INPUT
            $frequencies[] = count(array_filter($input, function($item) use ($word) {
                return $item === $word;
            }));
        }
        return $frequencies;
    }

    $output = countFrequencies($inputArray, $queryArray);  // Hitung frekuensi

    // Menampilkan hasil dalam tabel
    echo "
    <table>
        <tr>
            <th colspan='2'>Hasil Frekuensi</th>
        </tr>
        <tr>
            <th>INPUT</th>
            <td>[" . htmlspecialchars(implode(", ", $inputArray)) . "]</td>
        </tr>
        <tr>
            <th>QUERY</th>
            <td>[" . htmlspecialchars(implode(", ", $queryArray)) . "]</td>
        </tr>";

   

    // Menampilkan output dalam format yang diinginkan
    $outputString = "OUTPUT = [" . implode(", ", $output) . "] karena ";
    foreach ($queryArray as $index => $query) {
        $outputString .= "kata '" . htmlspecialchars($query) . "' terdapat " . htmlspecialchars($output[$index]) . " pada INPUT";
        if ($index < count($queryArray) - 1) {
            $outputString .= ", ";
        }
    }
    echo "<p style='text-align: center;'>" . $outputString . ".</p>";
}
?>

</body>
</html>
