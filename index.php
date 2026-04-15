<?php
function validasiKartu($number) {
    $number = str_replace(" ", "", $number); // hapus spasi
    $number = strrev($number);
    $sum = 0;

    for ($i = 0; $i < strlen($number); $i++) {
        $digit = $number[$i];

        if ($i % 2 == 1) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }

        $sum += $digit;
    }

    return ($sum % 10 == 0);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Validasi Kartu Kredit</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 50px;
        }
        input {
            padding: 10px;
            width: 250px;
        }
        button {
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<h2>Validasi Kartu Kredit</h2>

<form method="post">
    <input type="text" name="card" placeholder="Masukkan nomor kartu" required>
    <br><br>
    <button type="submit">Cek</button>
</form>

<?php
if (isset($_POST['card'])) {
    $card = $_POST['card'];

    if (!is_numeric(str_replace(" ", "", $card))) {
        echo "<p style='color:orange;'>Input harus angka!</p>";
    } else {
        if (validasiKartu($card)) {
            echo "<p style='color:green;'>✅ Kartu VALID</p>";
        } else {
            echo "<p style='color:red;'>❌ Kartu TIDAK VALID</p>";
        }
    }
}
?>

</body>
</html>