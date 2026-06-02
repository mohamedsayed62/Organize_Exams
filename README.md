<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="README.css">
</head>
<body>

<div class="hero">
  <div class="badge-row">
    <span class="badge badge-laravel">Laravel ^13.8</span>
    <span class="badge badge-php">PHP 8.3</span>
    <span class="badge badge-excel">Maatwebsite Excel 3.1</span>
    <span class="badge badge-mit">MIT License</span>
  </div>
  <div class="hero-title">Organize <em>Exams</em></div>
  <p class="hero-sub">A Laravel application for managing student exam workflows, doctor accounts, and exam scheduling — powered by Excel imports and a clean REST API.</p>
</div>

<div class="content">

  <!-- Overview -->
  <div class="section">
    <div class="section-label">Overview</div>
    <div class="highlights">
      <div class="highlight-card">
        <div class="h-icon">🧑‍⚕️</div>
        <div class="h-title">Doctor Auth</div>
        <div class="h-desc">Register & login with Sanctum token-based authentication</div>
      </div>
      <div class="highlight-card">
        <div class="h-icon">📊</div>
        <div class="h-title">Excel Import</div>
        <div class="h-desc">Bulk-import students from .xlsx — auto-creates subjects & groups</div>
      </div>
      <div class="highlight-card">
        <div class="h-icon">✅</div>
        <div class="h-title">Exam Tracking</div>
        <div class="h-desc">Mark students complete and monitor live exam progress per group</div>
      </div>
    </div>
  </div>

  <!-- Database Schema -->
  <div class="section">
    <div class="section-label">Database Schema</div>
    <div class="schema-grid">
      <div class="schema-card">
        <div class="schema-table-name">doctors</div>
        <div class="schema-cols">
          <span class="schema-col pk">id</span>
          <span class="schema-col">name</span>
          <span class="schema-col">email</span>
          <span class="schema-col">password</span>
          <span class="schema-col">google_id</span>
          <span class="schema-col">avatar</span>
          <span class="schema-col">timestamps</span>
        </div>
        <div class="schema-purpose">Doctor accounts & auth</div>
      </div>
      <div class="schema-card">
        <div class="schema-table-name">subjects</div>
        <div class="schema-cols">
          <span class="schema-col pk">id</span>
          <span class="schema-col">name</span>
          <span class="schema-col">doctor_id</span>
          <span class="schema-col">location</span>
        </div>
        <div class="schema-purpose">Exam subjects owned by doctors</div>
      </div>
      <div class="schema-card">
        <div class="schema-table-name">groups</div>
        <div class="schema-cols">
          <span class="schema-col pk">id</span>
          <span class="schema-col">name</span>
          <span class="schema-col">number_of_students</span>
          <span class="schema-col">doctor_id</span>
          <span class="schema-col">subject_id</span>
          <span class="schema-col">time</span>
        </div>
        <div class="schema-purpose">Exam groups with assigned students</div>
      </div>
      <div class="schema-card">
        <div class="schema-table-name">students</div>
        <div class="schema-cols">
          <span class="schema-col pk">id</span>
          <span class="schema-col">name</span>
          <span class="schema-col">group_id</span>
          <span class="schema-col">done_exam</span>
        </div>
        <div class="schema-purpose">Student records & completion status</div>
      </div>
    </div>
  </div>

  <!-- API Routes -->
  <div class="section">
    <div class="section-label">API Reference</div>

    <div class="section-divider">— Public</div>
    <div class="routes-grid">
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/api/students/index</span>
        <span class="route-desc">List subjects with group counts</span>
      </div>
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/api/students/showExam/{subjectId}</span>
        <span class="route-desc">View grouped exam data</span>
      </div>
    </div>

    <div class="section-divider">— Authentication</div>
    <div class="routes-grid">
      <div class="route-row">
        <span class="method method-post">POST</span>
        <span class="route-path">/api/doctors/register</span>
        <span class="route-desc">Register new doctor</span>
      </div>
      <div class="route-row">
        <span class="method method-post">POST</span>
        <span class="route-path">/api/doctors/login</span>
        <span class="route-desc">Login → Sanctum token</span>
      </div>
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/api/doctors/logout</span>
        <span class="route-desc">Revoke token</span>
      </div>
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/auth/google</span>
        <span class="route-desc">Redirect to Google OAuth</span>
      </div>
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/auth/google/callback</span>
        <span class="route-desc">Handle Google OAuth callback</span>
      </div>
    </div>

    <div class="section-divider">— Protected <span style="color:#333">· auth:sanctum required</span></div>
    <div class="routes-grid">
      <div class="route-row">
        <span class="method method-post">POST</span>
        <span class="route-path">/api/doctors/index</span>
        <span class="route-desc">Import Excel → create groups</span>
      </div>
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/api/doctors/show/{id}</span>
        <span class="route-desc">Groups & students for subject</span>
      </div>
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/api/export/{id}</span>
        <span class="route-desc">Download Excel export</span>
      </div>
      <div class="route-row">
        <span class="method method-get">GET</span>
        <span class="route-path">/api/doctors/showExam/{subjectId}</span>
        <span class="route-desc">Exam progress for subject</span>
      </div>
      <div class="route-row">
        <span class="method method-put">PUT</span>
        <span class="route-path">/api/doctors/updateStudent/{studentId}</span>
        <span class="route-desc">Mark student exam complete</span>
      </div>
    </div>

  </div>

  <!-- Setup -->
  <div class="section">
    <div class="section-label">Setup</div>

    <div class="setup-block">
      <div class="code-header">
        <span class="dot dot-r"></span>
        <span class="dot dot-y"></span>
        <span class="dot dot-g"></span>
        <span class="code-label">bash</span>
      </div>
      <div class="code-body">
        <div class="code-line"><span class="cmd">composer</span> install</div>
        <div class="code-line"><span class="cmd">cp</span> .env.example .env &nbsp;<span class="comment"># or 'copy' on Windows</span></div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">key:generate</span></div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">migrate</span></div>
        <div class="code-line"><span class="cmd">npm</span> install <span class="arg">&amp;&amp;</span> <span class="cmd">npm</span> run <span class="arg">dev</span></div>
        <div class="code-line"><span class="comment"># Configure Socialite (Google OAuth credentials in .env)</span></div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">reverb:start</span> <span class="comment"># Start WebSocket server</span></div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">serve</span></div>
      </div>
    </div>

    <div class="setup-block">
      <div class="code-header">
        <span class="dot dot-r"></span>
        <span class="dot dot-y"></span>
        <span class="dot dot-g"></span>
        <span class="code-label">bash · single-step</span>
      </div>
      <div class="code-body">
        <div class="code-line"><span class="cmd">composer</span> run <span class="arg">setup</span></div>
      </div>
    </div>

  </div>

</div>

<div class="footer">
  <span class="footer-left">organize-exams · Laravel ^13.8 · PHP 8.3</span>
  <span class="license-pill">MIT License</span>
</div>

</body>
</html>
