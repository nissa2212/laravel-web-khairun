<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin-bottom: 15px;
        }
        .warning-box {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Data Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="info-box">
                            <h5>Informasi Pribadi</h5>
                            <p><strong>Nama:</strong> {{ $displayData['name'] }}</p>
                            <p><strong>Umur:</strong> {{ $displayData['my_age'] }}</p>
                            <p><strong>Cita-cita:</strong> {{ $displayData['future_goal'] }}</p>
                        </div>

                        <div class="info-box">
                            <h5>Hobi</h5>
                            <ul>
                                @foreach ($displayData['hobbies'] as $hobby)
                                    <li>{{ $hobby }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="info-box">
                            <h5>Informasi Akademik</h5>
                            <p><strong>Tanggal Harus Wisuda:</strong> {{ $displayData['tgl_harus_wisuda'] }}</p>
                            <p><strong>Jarak Hari:</strong> {{ $displayData['time_to_study_left'] }}</p>
                            <p><strong>Semester Saat Ini:</strong> {{ $displayData['current_semester'] }}</p>
                        </div>

                        <div class="warning-box">
                            <h5>Pesan Akademik</h5>
                            <p><strong>{{ $displayData['semester_info'] }}</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Debug Information -->
                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h5>Debug Data Array</h5>
                    </div>
                    <div class="card-body">
                        <pre>{{ print_r($displayData, true) }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
