<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Tasks';
$pageSubtitle = 'Manage your assignments and to-dos.';
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
      <div class="panel-head flex-wrap gap-2">
        <h3><i class="bi bi-check2-square me-2"></i>Tasks</h3>
        <div class="d-flex gap-2">
          <select id="filterStatus" class="form-select form-select-sm" style="width:auto">
            <option value="all">All</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
          </select>
          <button class="btn btn-primary-grad btn-sm" data-bs-toggle="modal" data-bs-target="#taskModal" onclick="openTaskModal()">
            <i class="bi bi-plus-lg me-1"></i>Add Task
          </button>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-dark-custom align-middle mb-0">
          <thead>
            <tr>
              <th></th>
              <th>Task</th>
              <th>Subject</th>
              <th>Due Date</th>
              <th>Priority</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tasksBody">
            <tr><td colspan="7" class="empty-state"><i class="bi bi-hourglass-split"></i>Loading…</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Task Modal -->
<div class="modal fade" id="taskModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="taskForm">
        <div class="modal-header">
          <h5 class="modal-title" id="taskModalTitle">Add Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="taskId">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="taskTitle" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="taskDescription" rows="2"></textarea>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <label class="form-label">Subject</label>
              <select class="form-select" id="taskSubject"><option value="">None</option></select>
            </div>
            <div class="col-6">
              <label class="form-label">Priority</label>
              <select class="form-select" id="taskPriority">
                <option>Low</option><option selected>Medium</option><option>High</option>
              </select>
            </div>
          </div>
          <div class="mb-3 mt-2">
            <label class="form-label">Due Date</label>
            <input type="date" class="form-control" id="taskDueDate">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-soft" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary-grad">Save Task</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/tasks.js"></script>
</body>
</html>
