<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Progress';
$pageSubtitle = 'Track how your semester is going.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include __DIR__ . '/includes/head.php'; ?>
</head>
<body>
<div class="app-shell">
  <?php include __DIR__ . '/includes/sidebar.php'; ?>
  <div class="main-content">
    <?php include __DIR__ . '/includes/topbar.php'; ?>

    <div class="row g-3 mb-3">
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-violet-soft"><i class="bi bi-clock-fill"></i></div>
          <div><div class="stat-value" id="progTotalHours">–</div><div class="stat-label">Total Hours Studied</div></div>
        </div>
      </div>
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-green-soft"><i class="bi bi-check-circle-fill"></i></div>
          <div><div class="stat-value" id="progCompleted">–</div><div class="stat-label">Tasks Completed</div></div>
        </div>
      </div>
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-blue-soft"><i class="bi bi-list-task"></i></div>
          <div><div class="stat-value" id="progTotalTasks">–</div><div class="stat-label">Total Tasks</div></div>
        </div>
      </div>
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-orange-soft"><i class="bi bi-graph-up-arrow"></i></div>
          <div><div class="stat-value" id="progRate">–</div><div class="stat-label">Completion Rate</div></div>
        </div>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-lg-7">
        <div class="panel panel-pad h-100">
          <div class="panel-head"><h3><i class="bi bi-graph-up me-2"></i>Study Hours — Last 8 Weeks</h3></div>
          <canvas id="trendChart" height="140"></canvas>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="panel panel-pad h-100">
          <div class="panel-head"><h3><i class="bi bi-pie-chart-fill me-2"></i>Time by Subject</h3></div>
          <canvas id="subjectChart" height="200"></canvas>
        </div>
      </div>
    </div>

    <div class="panel panel-pad mt-3">
      <div class="panel-head"><h3><i class="bi bi-bar-chart-steps me-2"></i>Subject Breakdown</h3></div>
      <div id="subjectBars"></div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/progress.js"></script>
</body>
</html>
