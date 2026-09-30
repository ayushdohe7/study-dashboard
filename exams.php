<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Exams';
$pageSubtitle = 'Stay ahead of every test and deadline.';
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
        <h3><i class="bi bi-pencil-square me-2"></i>Exams</h3>
        <button class="btn btn-primary-grad btn-sm" onclick="openExamModal()"><i class="bi bi-plus-lg me-1"></i>Add Exam</button>
      </div>
      <div class="row g-3" id="examsGrid">
        <div class="col-12 empty-state"><i class="bi bi-hourglass-split"></i>Loading…</div>
      </div>
    </div>
  </div>
</div>

<!-- Exam Modal -->
<div class="modal fade" id="examModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="examForm">
        <div class="modal-header">
          <h5 class="modal-title" id="examModalTitle">Add Exam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="examId">
          <div class="mb-3">
            <label class="form-label">Exam Title</label>
            <input type="text" class="form-control" id="examTitle" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Subject</label>
            <select class="form-select" id="examSubject" required></select>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <label class="form-label">Date</label>
              <input type="date" class="form-control" id="examDate" required>
            </div>
            <div class="col-6">
              <label class="form-label">Time</label>
              <input type="time" class="form-control" id="examTime">
            </div>
          </div>
          <div class="mb-3 mt-2">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" id="examLocation">
          </div>
          <div class="mb-1">
            <label class="form-label">Notes</label>
            <textarea class="form-control" id="examNotes" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-soft" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary-grad">Save Exam</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/exams.js"></script>
</body>
</html>
