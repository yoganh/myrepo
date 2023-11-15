<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prakiraan Cuaca</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="weather-container">
    <h1>Historical Cuaca Bandung</h1>
    <form id="weatherForm">
        <label for="month">Pilih Bulan:</label>
        <select id="month" name="month">
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
        </select>
        <button type="button" onclick="submitForm()">Tampilkan Historikal Cuaca</button>

       
        
    </form>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Suhu (°C)</th>
                <th>Suhu Minimal (°C)</th>
                <th>Suhu Maksimal (°C)</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <a href="pracuaca.php" class="forecast-link">Prakiraan Cuaca Kedepan Bandung 7 Hari Kedepan</a>
</div>

<script>
    function submitForm() {
        var form = document.getElementById("weatherForm");
        var formData = new FormData(form);

        fetch("cuaca.php", {
            method: "POST", 
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.querySelector("tbody").innerHTML = data;
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
</script>

</body>
</html>
