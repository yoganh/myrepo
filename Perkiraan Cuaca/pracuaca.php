<?php
$apiKey = '84e8ee47360f41638638e8c65b76a8d9';
$city = 'Bandung';
$days = 7; 

if (empty($apiKey)) {
    die('Kunci API Weatherbit tidak tersedia. Dapatkan kunci di https://www.weatherbit.io/');
}

$apiUrl = "https://api.weatherbit.io/v2.0/forecast/daily?city={$city}&days={$days}&key={$apiKey}";

$weather_data = file_get_contents($apiUrl);

if ($weather_data === false) {
    die('Gagal mengambil data cuaca dari Weatherbit.');
}

$data = json_decode($weather_data, true);

if (!isset($data['data'])) {
    die('Data cuaca tidak ditemukan.');
}
?>

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
    <h1>Prakiraan Cuaca di <?php echo $city; ?> Selama 7 Hari Kedepan</h1>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Suhu</th>
                <th>Suhu Maks (°C)</th>
                <th>Suhu Min (°C)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['data'] as $day) : ?>
                <?php
                $date = date('Y-m-d', strtotime($day['valid_date']));
                $temperature = isset($day['temp']) ? $day['temp'] : 'N/A';
                $maxTemperature = isset($day['max_temp']) ? $day['max_temp'] : 'N/A';
                $minTemperature = isset($day['min_temp']) ? $day['min_temp'] : 'N/A';
                ?>
                <tr>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $temperature; ?>
                    <td><?php echo $maxTemperature; ?></td>
                    <td><?php echo $minTemperature; ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
