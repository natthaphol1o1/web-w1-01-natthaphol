<!DOCTYPE html>
<html lang="th">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>แม่สูตรคูณ</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
      <style>
            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

            :root {
                  --bg:           #EFF3F8;
                  --surface:      #FFFFFF;
                  --border:       #DCE3EE;
                  --ink:          #0D1117;
                  --muted:        #64748B;
                  --faint:        #94A3B8;
                  --accent:       #0891B2;
                  --accent-soft:  #E0F6FB;
                  --radius:       14px;
                  --shadow:       0 1px 2px rgba(0,0,0,0.04), 0 8px 28px rgba(0,0,0,0.07);
            }

            body {
                  font-family: 'Sora', sans-serif;
                  background: var(--bg);
                  min-height: 100vh;
                  display: flex;
                  flex-direction: column;
                  align-items: center;
                  padding: 2.5rem 1rem 5rem;
                  color: var(--ink);
            }

            /* ── student bar ── */
            .student-bar {
                  width: 100%;
                  max-width: 460px;
                  display: flex;
                  align-items: center;
                  gap: 10px;
                  margin-bottom: 1.25rem;
                  font-size: 0.76rem;
                  color: var(--faint);
                  font-weight: 400;
            }
            .student-bar .dot {
                  width: 6px; height: 6px;
                  border-radius: 50%;
                  background: var(--accent);
                  flex-shrink: 0;
            }
            .student-bar strong { color: var(--muted); font-weight: 500; }

            /* ── card ── */
            .card {
                  width: 100%;
                  max-width: 460px;
                  background: var(--surface);
                  border: 1px solid var(--border);
                  border-radius: 20px;
                  box-shadow: var(--shadow);
                  padding: 2rem 1.75rem;
            }

            /* ── header ── */
            .card-header {
                  display: flex;
                  align-items: flex-start;
                  justify-content: space-between;
                  margin-bottom: 1.5rem;
            }
            .card-title {
                  font-size: 1.45rem;
                  font-weight: 700;
                  letter-spacing: -0.4px;
                  line-height: 1.2;
            }
            .loop-badge {
                  font-size: 0.7rem;
                  font-weight: 500;
                  font-family: 'JetBrains Mono', monospace;
                  color: var(--accent);
                  background: var(--accent-soft);
                  border: 1px solid rgba(8,145,178,0.2);
                  border-radius: 6px;
                  padding: 4px 10px;
                  letter-spacing: 0.2px;
                  margin-top: 3px;
            }

            /* ── segmented nav ── */
            .nav {
                  display: flex;
                  background: var(--bg);
                  border-radius: 10px;
                  padding: 3px;
                  margin-bottom: 1.75rem;
            }
            .nav a {
                  flex: 1;
                  text-align: center;
                  text-decoration: none;
                  font-size: 0.82rem;
                  font-weight: 500;
                  padding: 8px 0;
                  border-radius: 8px;
                  color: var(--faint);
                  transition: all 0.18s ease;
            }
            .nav a.active {
                  background: var(--surface);
                  color: var(--ink);
                  box-shadow: 0 1px 4px rgba(0,0,0,0.09);
            }
            .nav a:not(.active):hover { color: var(--muted); }

            /* ── form ── */
            .form-label {
                  display: block;
                  font-size: 0.78rem;
                  font-weight: 500;
                  color: var(--muted);
                  margin-bottom: 7px;
                  text-transform: uppercase;
                  letter-spacing: 0.5px;
            }
            .form-row {
                  display: flex;
                  gap: 8px;
                  margin-bottom: 2rem;
            }
            input[type="number"] {
                  flex: 1;
                  font-family: 'Sora', sans-serif;
                  font-size: 0.95rem;
                  font-weight: 400;
                  color: var(--ink);
                  background: var(--surface);
                  border: 1.5px solid var(--border);
                  border-radius: 10px;
                  padding: 11px 14px;
                  outline: none;
                  transition: border-color 0.18s;
            }
            input[type="number"]::placeholder { color: var(--faint); }
            input[type="number"]:focus { border-color: var(--accent); }
            input[type="submit"] {
                  font-family: 'Sora', sans-serif;
                  font-size: 0.85rem;
                  font-weight: 600;
                  background: var(--ink);
                  color: #fff;
                  border: none;
                  border-radius: 10px;
                  padding: 11px 22px;
                  cursor: pointer;
                  white-space: nowrap;
                  transition: opacity 0.15s, transform 0.1s;
            }
            input[type="submit"]:hover  { opacity: 0.82; }
            input[type="submit"]:active { transform: scale(0.97); }

            /* ── divider ── */
            .divider {
                  border: none;
                  border-top: 1px solid var(--border);
                  margin: 0 0 1.5rem;
            }

            /* ── result section ── */
            .result-label {
                  font-size: 0.76rem;
                  font-weight: 500;
                  color: var(--faint);
                  text-transform: uppercase;
                  letter-spacing: 0.6px;
                  margin-bottom: 1rem;
            }
            .result-label strong {
                  color: var(--ink);
                  font-size: 1.1rem;
                  font-weight: 700;
                  text-transform: none;
                  letter-spacing: -0.3px;
                  margin-left: 6px;
            }

            /* ── result rows ── */
            .result-row {
                  display: grid;
                  grid-template-columns: 76px 1fr 52px;
                  align-items: center;
                  gap: 12px;
                  padding: 7px 0;
                  border-bottom: 1px solid #F1F5FB;
            }
            .result-row:last-child { border-bottom: none; }

            .formula {
                  font-family: 'JetBrains Mono', monospace;
                  font-size: 0.79rem;
                  font-weight: 400;
                  color: var(--muted);
                  white-space: nowrap;
            }

            .bar-track {
                  height: 5px;
                  background: var(--accent-soft);
                  border-radius: 99px;
                  overflow: hidden;
            }
            .bar-fill {
                  height: 100%;
                  background: var(--accent);
                  border-radius: 99px;
            }

            .result-num {
                  font-size: 0.95rem;
                  font-weight: 700;
                  color: var(--ink);
                  text-align: right;
                  font-family: 'JetBrains Mono', monospace;
            }
      </style>
</head>
<body>

<?php echo "
<div class='student-bar'>
      <span class='dot'></span>
      <strong>Natthaphol Butdee</strong>
      &nbsp;·&nbsp; BIT.2/4 &nbsp;·&nbsp; เลขที่ 1 &nbsp;·&nbsp; งานที่ 1
</div>"; ?>

<div class="card">

      <div class="card-header">
            <h1 class="card-title">แม่สูตรคูณ</h1>
            <span class="loop-badge">for loop</span>
      </div>

      <nav class="nav">
            <a href="index.php" class="active">For Loop</a>
            <a href="while.php">While Loop</a>
      </nav>

      <label class="form-label" for="num">เลขแม่สูตรคูณ</label>
      <form action="" class="form-row">
            <input type="number" name="num" id="num" placeholder="1 – 99"
                   value="<?= isset($_GET['num']) ? htmlspecialchars($_GET['num']) : '' ?>">
            <input type="submit" value="คำนวณ">
      </form>

      <?php
      if(isset($_GET["num"])){
            $num = (int)$_GET["num"];

            echo "<hr class='divider'>";
            echo "<p class='result-label'>สูตรคูณแม่<strong>{$num}</strong></p>";

            for($i = 1; $i <= 12; $i++){
                  $result = $num * $i;
                  $pct    = round(($i / 12) * 100);
                  echo "
                  <div class='result-row'>
                        <span class='formula'>{$num} × {$i}</span>
                        <div class='bar-track'>
                              <div class='bar-fill' style='width:{$pct}%'></div>
                        </div>
                        <span class='result-num'>{$result}</span>
                  </div>";
            }
      }
      ?>

</div>
</body>
</html>