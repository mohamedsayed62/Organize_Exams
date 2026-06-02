
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Organize Exams - README</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,400;0,500;1,400&family=Instrument+Serif:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap');

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: #0c0d0e;
    color: #e8e6df;
    min-height: 100vh;
    padding: 0;
    line-height: 1.65;
  }

  .hero {
    background: #0c0d0e;
    border-bottom: 1px solid #222;
    padding: 56px 48px 48px;
    position: relative;
    overflow: hidden;
  }

  .hero-banner {
    width: 100%;
    max-width: 920px;
    height: 220px;
    object-fit: cover;
    border-radius: 12px;
    border: 1px solid #1e1f20;
    margin-bottom: 32px;
    opacity: 0.85;
  }

  .hero::before {
    content: '';
    position: absolute;
    top: -40px; right: -60px;
    width: 320px; height: 320px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,71,0,0.08) 0%, transparent 70%);
    pointer-events: none;
  }

  .badge-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 28px;
  }

  .badge {
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    font-weight: 500;
    padding: 3px 10px;
    border-radius: 4px;
    border: 1px solid;
  }
  .badge-laravel { background: rgba(255,71,0,0.12); color: #ff7043; border-color: rgba(255,112,67,0.3); }
  .badge-php { background: rgba(119,107,180,0.12); color: #9c8fd4; border-color: rgba(119,107,180,0.3); }
  .badge-excel { background: rgba(59,180,87,0.1); color: #5eca7a; border-color: rgba(59,180,87,0.25); }
  .badge-mit { background: rgba(120,120,120,0.12); color: #aaa; border-color: rgba(120,120,120,0.3); }
  .badge-reverb { background: rgba(255,215,0,0.1); color: #ffd700; border-color: rgba(255,215,0,0.25); }

  .hero-title {
    font-family: 'Instrument Serif', serif;
    font-size: 52px;
    font-weight: 400;
    line-height: 1.1;
    letter-spacing: -1px;
    color: #f0ede6;
    margin-bottom: 10px;
  }

  .hero-title em {
    font-style: italic;
    color: #ff7043;
  }

  .hero-sub {
    font-size: 15px;
    color: #888;
    font-weight: 300;
    max-width: 620px;
    margin-top: 14px;
  }

  .content {
    padding: 0 48px 64px;
    max-width: 1040px;
    margin: 0 auto;
  }

  .section {
    padding: 40px 0;
    border-bottom: 1px solid #1a1b1c;
  }

  .section:last-child { border-bottom: none; }

  .section-label {
    font-family: 'DM Mono', monospace;
    font-size: 10px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: #555;
    margin-bottom: 20px;
  }

  .section-title {
    font-family: 'Instrument Serif', serif;
    font-size: 26px;
    font-weight: 400;
    color: #e8e6df;
    margin-bottom: 20px;
  }

  /* Highlights */
  .highlights {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 12px;
  }

  .highlight-card {
    background: #111213;
    border: 1px solid #1e1f20;
    border-radius: 8px;
    padding: 16px;
    transition: border-color 0.15s, transform 0.15s;
  }
  .highlight-card:hover {
    border-color: #2e2f30;
    transform: translateY(-2px);
  }

  .h-icon {
    font-size: 20px;
    margin-bottom: 10px;
  }

  .h-title {
    font-family: 'DM Mono', monospace;
    font-size: 12px;
    font-weight: 500;
    color: #d4d0c8;
    margin-bottom: 6px;
  }

  .h-desc {
    font-size: 12.5px;
    color: #666;
    line-height: 1.6;
  }

  /* Schema */
  .schema-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 12px;
  }

  .schema-card {
    background: #111213;
    border: 1px solid #1e1f20;
    border-radius: 8px;
    padding: 16px 18px;
    transition: border-color 0.15s;
  }
  .schema-card:hover { border-color: #2e2f30; }

  .schema-table-name {
    font-family: 'DM Mono', monospace;
    font-size: 12px;
    font-weight: 500;
    color: #ff7043;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .schema-table-name::before {
    content: '⬡';
    font-size: 10px;
    opacity: 0.6;
  }

  .schema-cols {
    display: flex;
    flex-wrap: wrap;
    gap: 4px 6px;
  }

  .schema-col {
    font-family: 'DM Mono', monospace;
    font-size: 10.5px;
    color: #666;
    background: #161718;
    padding: 2px 7px;
    border-radius: 3px;
    border: 1px solid #1e1f20;
  }

  .schema-col.pk { color: #9c8fd4; border-color: rgba(119,107,180,0.2); }
  .schema-purpose {
    font-size: 11.5px;
    color: #444;
    margin-top: 12px;
    font-style: italic;
  }

  /* Routes */
  .routes-grid {
    display: grid;
    gap: 2px;
    background: #111213;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #1e1f20;
    margin-bottom: 24px;
  }

  .route-row {
    display: grid;
    grid-template-columns: 70px 1fr auto;
    gap: 16px;
    align-items: center;
    padding: 12px 16px;
    background: #111213;
    transition: background 0.15s;
  }

  .route-row:hover { background: #161718; }

  .method {
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    font-weight: 500;
    padding: 3px 8px;
    border-radius: 4px;
    text-align: center;
    width: fit-content;
  }
  .method-post { background: rgba(255,171,0,0.12); color: #ffc34d; border: 1px solid rgba(255,171,0,0.2); }
  .method-get { background: rgba(59,180,87,0.1); color: #5eca7a; border: 1px solid rgba(59,180,87,0.2); }
  .method-put { background: rgba(119,107,180,0.12); color: #9c8fd4; border: 1px solid rgba(119,107,180,0.25); }

  .route-path {
    font-family: 'DM Mono', monospace;
    font-size: 12.5px;
    color: #d4d0c8;
  }

  .route-desc {
    font-size: 12px;
    color: #555;
    text-align: right;
  }

  .section-divider {
    font-family: 'DM Mono', monospace;
    font-size: 10px;
    color: #444;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 16px 0 8px;
    margin-top: 8px;
  }

  .section-divider span { color: #333; }

  /* Setup */
  .setup-block {
    background: #0a0b0c;
    border: 1px solid #1e1f20;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 16px;
  }

  .code-header {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    border-bottom: 1px solid #1a1b1c;
    gap: 8px;
  }

  .dot { width: 8px; height: 8px; border-radius: 50%; }
  .dot-r { background: #ff5f56; }
  .dot-y { background: #ffbd2e; }
  .dot-g { background: #27c93f; }

  .code-label {
    font-family: 'DM Mono', monospace;
    font-size: 10px;
    color: #444;
    margin-left: 4px;
  }

  .code-body {
    padding: 16px 20px;
  }

  .code-line {
    font-family: 'DM Mono', monospace;
    font-size: 12.5px;
    color: #888;
    line-height: 2;
  }

  .code-line .cmd { color: #5eca7a; }
  .code-line .flag { color: #9c8fd4; }
  .code-line .arg { color: #ffc34d; }
  .code-line .comment { color: #333; }
  .code-line .env { color: #ff7043; }

  /* Flow */
  .flow-container {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
    padding: 28px 24px;
    background: #111213;
    border: 1px solid #1e1f20;
    border-radius: 8px;
  }

  .flow-step {
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    color: #d4d0c8;
    background: #161718;
    padding: 10px 16px;
    border-radius: 6px;
    border: 1px solid #1e1f20;
    text-align: center;
    white-space: nowrap;
  }

  .flow-arrow {
    color: #333;
    font-size: 16px;
  }

  /* Footer */
  .footer {
    padding: 28px 48px;
    border-top: 1px solid #111;
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1040px;
    margin: 0 auto;
  }

  .footer-left {
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    color: #333;
  }

  .license-pill {
    font-family: 'DM Mono', monospace;
    font-size: 10px;
    padding: 4px 12px;
    border-radius: 20px;
    background: #111213;
    border: 1px solid #222;
    color: #555;
  }

  .footer-center {
    font-family: 'DM Sans', sans-serif;
    font-size: 12px;
    color: #444;
    text-align: center;
    margin-top: 16px;
    padding-bottom: 32px;
  }
  .footer-center a { color: #ff7043; text-decoration: none; }
  .footer-center a:hover { text-decoration: underline; }

  @media (max-width: 768px) {
    .hero { padding: 40px 24px 32px; }
    .hero-title { font-size: 38px; }
    .content { padding: 0 24px 48px; }
    .footer { padding: 24px; flex-direction: column; gap: 16px; text-align: center; }
    .route-row { grid-template-columns: 1fr; gap: 4px; padding: 12px; }
    .route-desc { text-align: left; }
    .flow-container { flex-direction: column; }
    .flow-arrow { transform: rotate(90deg); }
    .hero-banner { height: 140px; }
  }
</style>
</head>
<body>

<div class="hero">
  <img class="hero-banner" src="https://image.qwenlm.ai/public_source/9faa1682-c16d-43d6-8e92-9503bdefc83f/11baf2a8f-e6d2-45ab-98a0-eda6c0c642ef.png" alt="Organize Exams Banner" />
  <div class="badge-row">
    <span class="badge badge-laravel">Laravel 12</span>
    <span class="badge badge-php">PHP 8.3</span>
    <span class="badge badge-excel">Maatwebsite Excel 3.1</span>
    <span class="badge badge-reverb">Laravel Reverb</span>
    <span class="badge badge-mit">MIT License</span>
  </div>
  <div class="hero-title">Organize <em>Exams</em></div>
  <p class="hero-sub">A robust Laravel application for managing student exam workflows, doctor accounts, and exam scheduling — powered by Excel imports, real-time WebSockets, and a clean REST API.</p>
</div>

<div class="content">

  <!-- Overview -->
  <div class="section">
    <div class="section-label">Overview</div>
    <div class="highlights">
      <div class="highlight-card">
        <div class="h-icon">🧑‍️</div>
        <div class="h-title">Doctor Auth</div>
        <div class="h-desc">Register & login using Laravel Sanctum token-based authentication.</div>
      </div>
      <div class="highlight-card">
        <div class="h-icon">📊</div>
        <div class="h-title">Excel Import</div>
        <div class="h-desc">Bulk-import students from .xlsx files — auto-creates subjects & groups.</div>
      </div>
      <div class="highlight-card">
        <div class="h-icon">✅</div>
        <div class="h-title">Exam Tracking</div>
        <div class="h-desc">Mark students complete and monitor live exam progress per group.</div>
      </div>
      <div class="highlight-card">
        <div class="h-icon">🔐</div>
        <div class="h-title">Google OAuth</div>
        <div class="h-desc">Secure, one-click authentication via Laravel Socialite.</div>
      </div>
      <div class="highlight-card">
        <div class="h-icon">⚡</div>
        <div class="h-title">Laravel Reverb</div>
        <div class="h-desc">Real-time dashboard updates via WebSockets & Laravel Echo.</div>
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
        <div class="schema-purpose">Doctor accounts & authentication records.</div>
      </div>
      <div class="schema-card">
        <div class="schema-table-name">subjects</div>
        <div class="schema-cols">
          <span class="schema-col pk">id</span>
          <span class="schema-col">name</span>
          <span class="schema-col">doctor_id</span>
          <span class="schema-col">location</span>
        </div>
        <div class="schema-purpose">Exam subjects owned by doctors.</div>
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
        <div class="schema-purpose">Student exam groups with scheduled times.</div>
      </div>
      <div class="schema-card">
        <div class="schema-table-name">students</div>
        <div class="schema-cols">
          <span class="schema-col pk">id</span>
          <span class="schema-col">name</span>
          <span class="schema-col">group_id</span>
          <span class="schema-col">done_exam</span>
        </div>
        <div class="schema-purpose">Student records & completion status.</div>
      </div>
    </div>
  </div>

  <!-- API Reference -->
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

    <div class="section-divider">— Protected <span>· auth:sanctum required</span></div>
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
    <div class="section-label">Installation & Setup</div>

    <div class="setup-block">
      <div class="code-header">
        <span class="dot dot-r"></span>
        <span class="dot dot-y"></span>
        <span class="dot dot-g"></span>
        <span class="code-label">bash</span>
      </div>
      <div class="code-body">
        <div class="code-line"><span class="cmd">composer</span> install</div>
        <div class="code-line"><span class="cmd">cp</span> .env.example .env</div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">key:generate</span></div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">migrate</span></div>
        <div class="code-line"><span class="cmd">npm</span> install <span class="arg">&amp;&amp;</span> <span class="cmd">npm</span> run <span class="arg">dev</span></div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">serve</span></div>
      </div>
    </div>

    <div class="section-divider">— Configuration</div>

    <div class="setup-block">
      <div class="code-header">
        <span class="dot dot-r"></span>
        <span class="dot dot-y"></span>
        <span class="dot dot-g"></span>
        <span class="code-label">.env · Google OAuth</span>
      </div>
      <div class="code-body">
        <div class="code-line"><span class="env">GOOGLE_CLIENT_ID</span>=your_client_id</div>
        <div class="code-line"><span class="env">GOOGLE_CLIENT_SECRET</span>=your_client_secret</div>
        <div class="code-line"><span class="env">GOOGLE_REDIRECT_URL</span>=http://localhost:8000/auth/google/callback</div>
        <div class="code-line" style="margin-top: 8px;"><span class="comment"># Install Socialite:</span></div>
        <div class="code-line"><span class="cmd">composer</span> require laravel/socialite</div>
      </div>
    </div>

    <div class="setup-block">
      <div class="code-header">
        <span class="dot dot-r"></span>
        <span class="dot dot-y"></span>
        <span class="dot dot-g"></span>
        <span class="code-label">.env · Laravel Reverb</span>
      </div>
      <div class="code-body">
        <div class="code-line"><span class="env">BROADCAST_CONNECTION</span>=reverb</div>
        <div class="code-line"><span class="env">REVERB_APP_ID</span>=your_app_id</div>
        <div class="code-line"><span class="env">REVERB_APP_KEY</span>=your_app_key</div>
        <div class="code-line"><span class="env">REVERB_APP_SECRET</span>=your_app_secret</div>
        <div class="code-line"><span class="env">REVERB_HOST</span>=127.0.0.1</div>
        <div class="code-line"><span class="env">REVERB_PORT</span>=8080</div>
        <div class="code-line"><span class="env">REVERB_SCHEME</span>=http</div>
        <div class="code-line" style="margin-top: 8px;"><span class="comment"># Start WebSocket server:</span></div>
        <div class="code-line"><span class="cmd">php artisan</span> <span class="flag">reverb:start</span></div>
      </div>
    </div>
  </div>

  <!-- Real-Time Flow -->
  <div class="section">
    <div class="section-label">Real-Time Flow</div>
    <div class="flow-container">
      <div class="flow-step">🧑‍⚕️ Doctor</div>
      <div class="flow-arrow">→</div>
      <div class="flow-step">Update Student</div>
      <div class="flow-arrow">→</div>
      <div class="flow-step">Event Dispatched</div>
      <div class="flow-arrow">→</div>
      <div class="flow-step" style="color: #ffd700; border-color: rgba(255,215,0,0.2);">⚡ Laravel Reverb</div>
      <div class="flow-arrow">→</div>
      <div class="flow-step">Laravel Echo</div>
      <div class="flow-arrow">→</div>
      <div class="flow-step" style="color: #5eca7a; border-color: rgba(59,180,87,0.2);">🖥️ Live Dashboard</div>
    </div>
  </div>

</div>

<div class="footer">
  <span class="footer-left">organize-exams · Laravel 12 · PHP 8.3 · MIT</span>
  <span class="license-pill">MIT License © Mohamed Sayed</span>
</div>
<div class="footer-center">Built with ❤️ using <a href="https://laravel.com" target="_blank">Laravel</a></div>

</body>
</html>
