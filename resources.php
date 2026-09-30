<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Resources';
$pageSubtitle = 'Links, books and materials for every subject.';
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
        <h3><i class="bi bi-folder2-open me-2"></i>Resources</h3>
        <button class="btn btn-primary-grad btn-sm" onclick="openResourceModal()"><i class="bi bi-plus-lg me-1"></i>Add Resource</button>
      </div>
      <div class="row g-3" id="resourcesGrid">
        <div class="col-12 empty-state"><i class="bi bi-hourglass-split"></i>Loading…</div>
      </div>
    </div>
  </div>
</div>

<!-- Resource Modal -->
<div class="modal fade" id="resourceModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="resourceForm">
        <div class="modal-header">
          <h5 class="modal-title" id="resourceModalTitle">Add Resource</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="resourceId">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="resourceTitle" required>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <label class="form-label">Subject</label>
              <select class="form-select" id="resourceSubject"><option value="">General</option></select>
            </div>
            <div class="col-6">
              <label class="form-label">Type</label>
              <select class="form-select" id="resourceType">
                <option>Link</option><option>PDF</option><option>Video</option><option>Book</option><option>Other</option>
              </select>
            </div>
          </div>
          <div class="mb-3 mt-2">
            <label class="form-label">URL</label>
            <input type="url" class="form-control" id="resourceUrl" placeholder="https://…">
          </div>
          <div class="mb-1">
            <label class="form-label">Notes</label>
            <textarea class="form-control" id="resourceNotes" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-soft" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary-grad">Save Resource</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/resources.js"></script>
</body>
</html>
