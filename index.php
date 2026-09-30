<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Dashboard';
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

    <!-- Stat cards -->
    <div class="row g-3 mb-3" id="statCards">
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-violet-soft"><i class="bi bi-calendar2-week-fill"></i></div>
          <div>
            <div class="stat-value" id="statClasses">–</div>
            <div class="stat-label">Classes This Week</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-blue-soft"><i class="bi bi-check2-square"></i></div>
          <div>
            <div class="stat-value" id="statTasks">–</div>
            <div class="stat-label">Tasks Pending</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-green-soft"><i class="bi bi-book-half"></i></div>
          <div>
            <div class="stat-value" id="statHours">–</div>
            <div class="stat-label">Study Hours This Week</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon bg-orange-soft"><i class="bi bi-bullseye"></i></div>
          <div>
            <div class="stat-value" id="statProgress">–</div>
            <div class="stat-label">Progress Overall</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Schedule + Exams -->
    <div class="row g-3 mb-3">
      <div class="col-lg-6">
        <div class="panel panel-pad h-100">
          <div class="panel-head">
            <h3><i class="bi bi-clock-history me-2"></i>Today's Schedule</h3>
          </div>
          <div id="todaySchedule">
            <div class="empty-state"><i class="bi bi-hourglass-split"></i>Loading…</div>
          </div>
          <a href="calendar.php" class="btn-link-full">View Full Calendar</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="panel panel-pad h-100">
          <div class="panel-head">
            <h3><i class="bi bi-pencil-square me-2"></i>Upcoming Exams</h3>
          </div>
          <div id="upcomingExams">
            <div class="empty-state"><i class="bi bi-hourglass-split"></i>Loading…</div>
          </div>
          <a href="exams.php" class="btn-link-full">View All Exams</a>
        </div>
      </div>
    </div>

    <!-- Weekly progress chart + Focus timer -->
    <div class="row g-3">
      <div class="col-lg-8">
        <div class="panel panel-pad h-100">
          <div class="panel-head">
            <h3><i class="bi bi-bar-chart-line-fill me-2"></i>Weekly Study Progress</h3>
          </div>
          <canvas id="weeklyChart" height="130"></canvas>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-pad h-100 text-center">
          <div class="panel-head" style="justify-content:center;">
            <h3><i class="bi bi-stopwatch-fill me-2"></i>Focus Timer</h3>
          </div>
          <div class="focus-mode-tabs">
            <button data-mins="25" class="active">Focus 25</button>
            <button data-mins="15">Short 15</button>
            <button data-mins="50">Deep 50</button>
          </div>
          <div class="focus-ring-wrap">
            <div class="focus-ring">
              <svg viewBox="0 0 120 120">
                <defs>
                  <linearGradient id="focusGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#7c5cff"/>
                    <stop offset="100%" stop-color="#4da3ff"/>
                  </linearGradient>
                </defs>
                <circle class="bg-circle" cx="60" cy="60" r="52"></circle>
                <circle class="fg-circle" id="focusCircle" cx="60" cy="60" r="52"></circle>
              </svg>
              <div class="focus-ring-label">
                <div class="time" id="focusTime">25:00</div>
                <div class="hint" id="focusHint">Press start to begin</div>
              </div>
            </div>
          </div>
          <div class="focus-controls">
            <button class="btn btn-primary-grad" id="focusStartBtn"><i class="bi bi-play-fill me-1"></i>Start Focus Session</button>
            <button class="btn btn-outline-soft d-none" id="focusResetBtn"><i class="bi bi-arrow-counterclockwise"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="quote-strip">
      <i class="bi bi-chat-quote-fill"></i>
      <span>Small steps every day lead to big results.</span>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/dashboard.js"></script>
</body>
</html>
