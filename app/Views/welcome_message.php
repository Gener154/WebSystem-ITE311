<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>🚀 Welcome to CodeIgniter 4 with Bootstrap!</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success text-center">
                            🎉 Bootstrap has been successfully integrated!
                        </div>
                        <p class="text-center">
                            You are now running <strong>CodeIgniter 4</strong> with a responsive
                            <span class="badge bg-info">Bootstrap 5</span> layout.
                        </p>
                        <div class="text-center mt-4">
                            <a href="https://codeigniter.com" target="_blank" class="btn btn-outline-primary">
                                Learn More about CodeIgniter
                            </a>
                            <a href="https://getbootstrap.com" target="_blank" class="btn btn-outline-success">
                                Learn More about Bootstrap
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        &copy; <?= date('Y') ?> CodeIgniter 4 Project
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional for components like modals, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
