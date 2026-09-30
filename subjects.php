<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Subjects';
$pageSubtitle = 'Your classes, instructors and weekly schedule.';
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

    <div class="panel panel-pad mb-3">
      <div class="panel-head">
        <h3><i class="bi bi-journal-bookmark-fill me-2"></i>Subjects</h3>
        <button class="btn btn-primary-grad btn-sm" onclick="openSubjectModal()"><i class="bi bi-plus-lg me-1"></i>Add Subject</button>
      </div>
      <div class="row g-3" id="subjectsGrid">
        <div class="col-12 empty-state"><i class="bi bi-hourglass-split"></i>Loading…</div>
      </div>
    </div>

    <div class="panel panel-pad">
      <div class="panel-head"><h3><i class="bi bi-calendar-week-fill me-2"></i>Weekly Class Schedule</h3></div>
      <div class="table-responsive">
        <table class="table table-dark-custom align-middle mb-0">
          <thead><tr><th>Day</th><th>Subject</th><th>Time</th><th>Room</th></tr></thead>
          <tbody id="scheduleBody"><tr><td colspan="4" class="empty-state"><i class="bi bi-hourglass-split"></i>Loading…</td></tr></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Subject Modal -->
<div class="modal fade" id="subjectModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="subjectForm">
        <div class="modal-header">
          <h5 class="modal-title" id="subjectModalTitle">Add Subject</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="subjectId">
          <div class="mb-3">
            <label class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="subjectName" required>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <label class="form-label">Instructor</label>
              <input type="text" class="form-control" id="subjectInstructor">
            </div>
            <div class="col-6">
              <label class="form-label">Room</label>
              <input type="text" class="form-control" id="subjectRoom">
            </div>
          </div>
          <div class="row g-2 mt-1">
            <div class="col-6">
              <label class="form-label">Credits</label>
              <input type="number" class="form-control" id="subjectCredits" value="3" min="1" max="10">
            </div>
            <div class="col-6">
              <label class="form-label">Color</label>
              <input type="color" class="form-control form-control-color w-100" id="subjectColor" value="#7c5cff">
            </div>
          </div>

          <div id="scheduleSlotsWrap" class="mt-3">
            <label class="form-label d-flex justify-content-between align-items-center">
              Weekly time slots
              <button type="button" class="btn btn-sm btn-outline-soft" onclick="addScheduleSlot()"><i class="bi bi-plus-lg"></i></button>
            </label>
            <div id="scheduleSlots"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-soft" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary-grad">Save Subject</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/subjects.js"></script>
</body>
</html>
