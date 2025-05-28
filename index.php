<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CRM Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>CRM Dashboard</header>
  <nav>
    <ul>
      <li><a href="#" class="tab-link active" data-tab="dashboard">Dashboard</a></li>
      <li><a href="#" class="tab-link" data-tab="contacts">Contacts</a></li>
      <li><a href="#" class="tab-link" data-tab="accounts">Accounts</a></li>
      <li><a href="#" class="tab-link" data-tab="sales">Sales</a></li>
      <li><a href="#" class="tab-link" data-tab="marketing">Marketing</a></li>
      <li><a href="#" class="tab-link" data-tab="support">Support</a></li>
      <li><a href="#" class="tab-link" data-tab="analytics">Analytics</a></li>
    </ul>
  </nav>
  <main>
    <section id="dashboard" class="active">
      <h2>Dashboard Overview</h2>
      <div class="dashboard-stats">
        <div class="stat-card"><h4>Total Contacts</h4><div class="number" id="total-contacts-number">0</div></div>
        <div class="stat-card"><h4>Active Accounts</h4><div class="number" id="active-accounts-number">0</div></div>
        <div class="stat-card"><h4>Sales Closed</h4><div class="number" id="sales-closed-number">0</div></div>
        <div class="stat-card"><h4>Marketing Campaigns</h4><div class="number" id="marketing-campaigns-number">0</div></div>
      </div>
    </section>
    <section id="contacts">
      <h2>Contact Management</h2>
      <form action="add_contact.php" method="post">
        <label>Name</label><input type="text" name="name" required>
        <label>Email</label><input type="email" name="email" required>
        <label>Phone</label><input type="text" name="phone">
        <label>Company</label><input type="text" name="company">
        <button type="submit">Add Contact</button>
      </form>
    </section>
    <section id="accounts">
      <h2>Account Management</h2>
      <form action="add_account.php" method="post">
        <label>Company Name</label><input type="text" name="company_name" required>
        <label>Industry</label><input type="text" name="industry">
        <label>Revenue</label><input type="number" name="revenue">
        <button type="submit">Add Account</button>
      </form>
    </section>
    <section id="sales">
      <h2>Sales Management</h2>
      <form action="add_sales.php" method="post">
        <label>Lead Name</label><input type="text" name="lead_name" required>
        <label>Deal Value</label><input type="number" name="deal_value">
        <label>Status</label>
        <select name="status"><option>Open</option><option>Closed Won</option><option>Closed Lost</option></select>
        <button type="submit">Add Sale</button>
      </form>
    </section>
    <section id="marketing">
      <h2>Marketing Automation</h2>
      <form action="add_marketing.php" method="post">
        <label>Campaign Name</label><input type="text" name="campaign_name" required>
        <label>Channel</label><input type="text" name="channel">
        <label>Start Date</label><input type="date" name="start_date">
        <button type="submit">Add Campaign</button>
      </form>
    </section>
    <section id="support">
      <h2>Customer Support</h2>
      <form action="add_support.php" method="post">
        <label>Customer Name</label><input type="text" name="customer_name" required>
        <label>Issue</label><textarea name="issue"></textarea>
        <button type="submit">Log Ticket</button>
      </form>
    </section>
    <section id="analytics">
      <h2>Customer Analytics</h2>
      <form action="add_analytics.php" method="post">
        <label>Metric Name</label><input type="text" name="metric_name" required>
        <label>Value</label><input type="text" name="value">
        <button type="submit">Save Metric</button>
      </form>
    </section>
  </main>


    

  <script src="./js/dashboardoverview.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
