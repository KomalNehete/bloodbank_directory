<?php
$institutes = Institute::getAll($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Directory</title>
    
    <!-- Bootstrap CDN for easy responsive design -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #d32f2f;
            margin-bottom: 30px;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
        }

        th {
            background-color: #d32f2f;
            color: #fff;
        }

        td, th {
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover effect */
        tr:hover {
            background-color: #ffe5e5;
        }

        /* Footer styling */
        footer {
            text-align: center;
            margin-top: 50px;
            padding: 15px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Blood Bank Directory</h1>
    
    <div class="table-wrapper">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($institutes)): ?>
                    <tr><td colspan="5" class="text-center">No data available</td></tr>
                <?php else: ?>
                    <?php foreach($institutes as $i): ?>
                        <tr>
                            <td><?= htmlspecialchars($i['public_id']) ?></td>
                            <td><?= htmlspecialchars($i['name']) ?></td>
                            <td><?= htmlspecialchars($i['type']) ?></td>
                            <td><?= htmlspecialchars($i['location']) ?></td>
                            <td><?= htmlspecialchars($i['contact'] ?: 'N/A') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Blood Bank Directory. All rights reserved.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
