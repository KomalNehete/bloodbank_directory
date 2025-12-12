<?php
// Fetch all institutes
$institutes = Institute::getAll($conn);

// Get unique districts for dropdown
$districts = [];
foreach($institutes as $i){
    $district_name = $i['location']; // Assuming 'location' contains district
    if(!in_array($district_name, $districts)) {
        $districts[] = $district_name;
    }
}

// Apply filters if submitted
$filter_type = $_GET['type'] ?? '';
$filter_district = $_GET['district'] ?? '';
$search_name = $_GET['search'] ?? '';

$filtered = array_filter($institutes, function($i) use($filter_type, $filter_district, $search_name){
    $match_type = !$filter_type || $i['type'] === $filter_type;
    $match_district = !$filter_district || strpos($i['location'], $filter_district) !== false;
    $match_name = !$search_name || stripos($i['name'], $search_name) !== false;
    return $match_type && $match_district && $match_name;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Bank Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center text-danger mb-4">Blood Bank Directory</h1>

    <!-- Filter Form -->
    <form method="get" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="type" class="form-select">
                <option value="">All Types</option>
                <option value="charitable" <?= ($filter_type=='charitable')?'selected':'' ?>>Charitable</option>
                <option value="private" <?= ($filter_type=='private')?'selected':'' ?>>Private</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="district" class="form-select">
                <option value="">All Districts</option>
                <?php foreach($districts as $d): ?>
                    <option value="<?= htmlspecialchars($d) ?>" <?= ($filter_district==$d)?'selected':'' ?>><?= htmlspecialchars($d) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search by Name" value="<?= htmlspecialchars($search_name) ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-danger w-100">Filter</button>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($filtered)): ?>
                    <tr><td colspan="5" class="text-center">No results found</td></tr>
                <?php else: ?>
                    <?php foreach($filtered as $i): ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
