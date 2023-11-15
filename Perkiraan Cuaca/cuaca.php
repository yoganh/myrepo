<?php
$apiKey = '84e8ee47360f41638638e8c65b76a8d9'; // Ganti dengan kunci API Weatherbit Anda
$city = 'Bandung';

if (empty($apiKey)) {
    die('Kunci API Weatherbit tidak tersedia. Dapatkan kunci di https://www.weatherbit.io/');
}

$selectedMonth = isset($_POST['month']) ? $_POST['month'] : date('m');
$startDate = date('Y-' . $selectedMonth . '-01');
$endDate = date('Y-' . $selectedMonth . '-t');

$apiUrl = "https://api.weatherbit.io/v2.0/history/daily?city={$city}&start_date={$startDate}&end_date={$endDate}&key={$apiKey}";

$weather_data = file_get_contents($apiUrl);

if ($weather_data === false) {
    die('Gagal mengambil data historis cuaca dari Weatherbit.');
}

$data = json_decode($weather_data, true);

if (!isset($data['data'])) {
    die('Data historis tidak ditemukan.');
}

foreach ($data['data'] as $day) {
    $date = $day['datetime'];
    $temperature = isset($day['temp']) ? $day['temp'] : 'N/A';
    $maxTemperature = isset($day['max_temp']) ? $day['max_temp'] : 'N/A';
    $minTemperature = isset($day['min_temp']) ? $day['min_temp'] : 'N/A';
    $weatherDescription = isset($day['weather']['description']) ? $day['weather']['description'] : 'N/A';

    echo "<tr>
            <td>{$date}</td>
            <td>{$temperature}</td>
            <td>{$maxTemperature}</td>
            <td>{$minTemperature}</td>
        </tr>";
}
?>
