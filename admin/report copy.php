<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include("../config/config.php");

// Ambil data dari database
$sql = "SELECT tgl_checkin, COUNT(id) AS total_entries FROM tamu GROUP BY tgl_checkin";
$result = $conn->query($sql);

// Inisialisasi array untuk label (tanggal) dan data (total entri)
$labels = [];
$data = [];
$tableRows = "";
while ($row = $result->fetch_assoc()) {
    $labels[] = $row['tgl_checkin'];
    $data[]   = $row['total_entries'];
    $tableRows .= "<tr><td>{$row['tgl_checkin']}</td><td>{$row['total_entries']}</td></tr>";
}

// Konversi array ke format JSON untuk JavaScript
$jsLabels = json_encode($labels);
$jsData   = json_encode($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Entri Tamu - Chart.js</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../assets/css/admin/report.css">
</head>
<body>
  <header>
    <h2>Laporan Entri Tamu dengan Chart.js</h2>
  </header>

  <div class="chart-wrapper">
    <!-- Bagian Atas: Tabel dan Pie Chart -->
    <div class="top-section">
      <!-- Tabel -->
      <div style="flex: 1;">
        <table>
          <thead>
            <tr>
              <th>Tanggal Check-In</th>
              <th>Total Entri</th>
            </tr>
          </thead>
          <tbody>
            <?= $tableRows ?>
          </tbody>
        </table>
      </div>
      <!-- Pie Chart -->
      <div class="chart-container">
        <canvas id="pieChart"></canvas>
      </div>
    </div>

    <!-- Bagian Bawah: Bar dan Line Chart -->
    <div class="bottom-section">
      <div class="chart-container">
        <canvas id="barChart"></canvas>
      </div>
      <div class="chart-container">
        <canvas id="lineChart"></canvas>
      </div>
    </div>
  </div>
  <a href="dashboard.php" class="back-link">Kembali ke Dashboard</a>

  <script>
    const labels = <?= $jsLabels ?>;
    const dataValues = <?= $jsData ?>;

    const chartData = {
      labels: labels,
      datasets: [{
        label: 'Total Entri Tamu',
        data: dataValues,
        backgroundColor: [
          'rgba(255, 99, 132, 0.5)',
          'rgba(54, 162, 235, 0.5)',
          'rgba(255, 206, 86, 0.5)',
          'rgba(75, 192, 192, 0.5)',
          'rgba(153, 102, 255, 0.5)',
          'rgba(255, 159, 64, 0.5)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        fill: false
      }]
    };

    new Chart(document.getElementById('lineChart').getContext('2d'), {
      type: 'line',
      data: chartData,
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(document.getElementById('barChart').getContext('2d'), {
      type: 'bar',
      data: chartData,
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(document.getElementById('pieChart').getContext('2d'), {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          data: dataValues,
          backgroundColor: [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)',
            'rgba(255, 159, 64, 0.7)'
          ],
          borderColor: '#fff',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  </script>
</body>
</html>
