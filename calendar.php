<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Calendar';
$pageSubtitle = 'Your academic calendar at a glance.';
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

    <div class="panel panel-pad">
      <div class="panel-head">
        <h3 id="calendarTitle"><i class="bi bi-calendar3 me-2"></i>Calendar</h3>
        <div class="d-flex align-items-center gap-2">
          <button class="btn btn-sm btn-outline-soft" id="prevMonth"><i class="bi bi-chevron-left"></i></button>
          <button class="btn btn-sm btn-outline-soft" id="todayBtn">Today</button>
          <button class="btn btn-sm btn-outline-soft" id="nextMonth"><i class="bi bi-chevron-right"></i></button>
        </div>
      </div>

      <div class="calendar-grid mb-1">
        <div class="calendar-weekday">Mon</div><div class="calendar-weekday">Tue</div><div class="calendar-weekday">Wed</div>
        <div class="calendar-weekday">Thu</div><div class="calendar-weekday">Fri</div><div class="calendar-weekday">Sat</div><div class="calendar-weekday">Sun</div>
      </div>
      <div class="calendar-grid" id="calendarGrid"></div>

      <div class="d-flex gap-3 mt-3 flex-wrap" style="font-size:.78rem;color:#a6a4bd">
        <span><i class="bi bi-circle-fill" style="color:#7c5cff"></i> Class</span>
        <span><i class="bi bi-circle-fill" style="color:#ff5c7a"></i> Exam</span>
        <span><i class="bi bi-circle-fill" style="color:#4da3ff"></i> Task</span>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/calendar.js"></script>
</body>
</html>
