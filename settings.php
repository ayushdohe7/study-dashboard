<?php
require_once __DIR__ . '/includes/auth_check.php';
requireLogin();
$pageTitle = 'Settings';
$pageSubtitle = 'Manage your profile and preferences.';
$user = currentUser();

$success = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $db = getDB();

    if ($action === 'profile') {
        $name = trim($_POST['full_name'] ?? '');
        $semester = trim($_POST['semester'] ?? '');
        $goal = (int)($_POST['daily_focus_goal_minutes'] ?? 120);
        if ($name === '') {
            $error = 'Name cannot be empty.';
        } else {
            $initial = strtoupper(substr($name, 0, 1));
            $stmt = $db->prepare("UPDATE users SET full_name=?, semester=?, avatar_initial=?, daily_focus_goal_minutes=? WHERE id=?");
            $stmt->execute([$name, $semester, $initial, $goal, $user['id']]);
            $success = 'Profile updated successfully.';
            $user = currentUser();
        }
    }

    if ($action === 'password') {
        $current = $_POST['current_password'] ?? '';
        $new = $_POST['new_password'] ?? '';
        if (!password_verify($current, $user['password'])) {
            $error = 'Current password is incorrect.';
        } elseif (strlen($new) < 6) {
            $error = 'New password must be at least 6 characters.';
        } else {
            $hash = password_hash($new, PASSWORD_DEFAULT);
            $stmt = $db->prepare("UPDATE users SET password=? WHERE id=?");
            $stmt->execute([$hash, $user['id']]);
            $success = 'Password changed successfully.';
        }
    }
}
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

    <?php if ($success): ?><div class="alert alert-success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
    <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>

    <div class="row g-3">
      <div class="col-lg-6">
        <div class="panel panel-pad">
          <div class="panel-head"><h3><i class="bi bi-person-circle me-2"></i>Profile</h3></div>
          <form method="POST">
            <input type="hidden" name="action" value="profile">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($user['full_name']) ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" disabled>
            </div>
            <div class="mb-3">
              <label class="form-label">Semester Label</label>
              <input type="text" name="semester" class="form-control" value="<?= htmlspecialchars($user['semester']) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Daily Focus Goal (minutes)</label>
              <input type="number" name="daily_focus_goal_minutes" class="form-control" value="<?= (int)$user['daily_focus_goal_minutes'] ?>" min="15" step="15">
            </div>
            <button type="submit" class="btn btn-primary-grad">Save Profile</button>
          </form>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="panel panel-pad">
          <div class="panel-head"><h3><i class="bi bi-shield-lock-fill me-2"></i>Change Password</h3></div>
          <form method="POST">
            <input type="hidden" name="action" value="password">
            <div class="mb-3">
              <label class="form-label">Current Password</label>
              <input type="password" name="current_password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">New Password</label>
              <input type="password" name="new_password" class="form-control" required minlength="6">
            </div>
            <button type="submit" class="btn btn-primary-grad">Update Password</button>
          </form>
        </div>

        <div class="panel panel-pad mt-3">
          <div class="panel-head"><h3><i class="bi bi-info-circle-fill me-2"></i>About</h3></div>
          <p style="color:var(--text-mid);font-size:.88rem">Study Dashboard v1.0 — a personal semester planner covering classes, tasks, exams, notes, resources, a focus timer and progress tracking.</p>
          <a href="auth/logout.php" class="btn btn-outline-soft"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
