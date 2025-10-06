<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="text-center">Login Berhasil!</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="alert alert-success">
                            <h4>{{ $message }}</h4>
                        </div>
                        <p>Selamat, Anda berhasil login!</p>
                        <a href="/auth" class="btn btn-primary">Kembali ke Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
