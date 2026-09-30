<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Notes';
$pageSubtitle = 'Keep all your class notes in one place.';
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
        <h3><i class="bi bi-sticky-fill me-2"></i>Notes</h3>
        <button class="btn btn-primary-grad btn-sm" onclick="openNoteModal()"><i class="bi bi-plus-lg me-1"></i>Add Note</button>
      </div>
      <div class="row g-3" id="notesGrid">
        <div class="col-12 empty-state"><i class="bi bi-hourglass-split"></i>Loading…</div>
      </div>
    </div>
  </div>
</div>

<!-- Note Modal -->
<div class="modal fade" id="noteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="noteForm">
        <div class="modal-header">
          <h5 class="modal-title" id="noteModalTitle">Add Note</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="noteId">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="noteTitle" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Subject</label>
            <select class="form-select" id="noteSubject"><option value="">General</option></select>
          </div>
          <div class="mb-1">
            <label class="form-label">Content</label>
            <textarea class="form-control" id="noteContent" rows="6"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-soft" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary-grad">Save Note</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- View Note Modal -->
<div class="modal fade" id="viewNoteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewNoteTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p id="viewNoteMeta" class="meta mb-3"></p>
        <p id="viewNoteContent" style="white-space:pre-wrap;color:#a6a4bd"></p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/notes.js"></script>
</body>
</html>
