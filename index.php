<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Financial BI Dashboard</title>

<link rel="stylesheet" href="style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <h2>Finance BI</h2>

        <ul>
            <li>Dashboard</li>
            <li>Revenue</li>
            <li>Expenses</li>
            <li>Reports</li>
            <li>Analytics</li>
        </ul>

    </div>

    <!-- MAIN CONTENT -->

    <div class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <h1>Financial Management Dashboard</h1>

        </div>

        <?php

        // KPI QUERIES

        $revenue_query = pg_query($conn,
        "SELECT SUM(revenue) AS total_revenue FROM finance_data");

        $expense_query = pg_query($conn,
        "SELECT SUM(expenses) AS total_expenses FROM finance_data");

        $budget_query = pg_query($conn,
        "SELECT SUM(budget) AS total_budget FROM finance_data");

        $employee_query = pg_query($conn,
        "SELECT SUM(employees) AS total_employees FROM finance_data");

        $project_query = pg_query($conn,
        "SELECT SUM(projects_completed) AS total_projects FROM finance_data");

        // FETCH DATA

        $revenue = pg_fetch_assoc($revenue_query);

        $expenses = pg_fetch_assoc($expense_query);

        $budget = pg_fetch_assoc($budget_query);

        $employee = pg_fetch_assoc($employee_query);

        $project = pg_fetch_assoc($project_query);

        // CALCULATIONS

        $profit =
        $revenue['total_revenue'] -
        $expenses['total_expenses'];

        $profit_margin =
        ($profit / $revenue['total_revenue']) * 100;

        ?>

        <!-- KPI CARDS -->

        <div class="cards">

            <div class="card">

                <h3>Total Revenue</h3>

                <p>
                    €<?php echo number_format($revenue['total_revenue'],2); ?>
                </p>

            </div>

            <div class="card">

                <h3>Total Expenses</h3>

                <p>
                    €<?php echo number_format($expenses['total_expenses'],2); ?>
                </p>

            </div>

            <div class="card">

                <h3>Net Profit</h3>

                <p>
                    €<?php echo number_format($profit,2); ?>
                </p>

            </div>

            <div class="card">

                <h3>Profit Margin</h3>

                <p>
                    <?php echo number_format($profit_margin,2); ?>%
                </p>

            </div>

            <div class="card">

                <h3>Total Employees</h3>

                <p>
                    <?php echo $employee['total_employees']; ?>
                </p>

            </div>

            <div class="card">

                <h3>Projects Completed</h3>

                <p>
                    <?php echo $project['total_projects']; ?>
                </p>

            </div>

        </div>

        <!-- CHART SECTION -->

        <div class="chart-grid">

            <!-- LINE CHART -->

            <div class="chart-box">

                <h3>Revenue vs Expenses Trend</h3>

                <br>

                <canvas id="financeChart"></canvas>

            </div>

            <!-- DOUGHNUT CHART -->

            <div class="chart-box">

                <h3>Department Revenue Distribution</h3>

                <br>

                <canvas id="departmentChart"></canvas>

            </div>

        </div>

        <!-- TABLE SECTION -->

        <div class="table-container">

            <h2>Department Financial Data</h2>

            <br>

            <table>

                <tr>

                    <th>Department</th>

                    <th>Manager</th>

                    <th>Region</th>

                    <th>Month</th>

                    <th>Revenue</th>

                    <th>Expenses</th>

                    <th>Budget</th>

                    <th>Employees</th>

                    <th>Projects</th>

                </tr>

                <?php

                $table_query = pg_query($conn,
                "SELECT * FROM finance_data");

                while($row = pg_fetch_assoc($table_query)){

                echo "

                <tr>

                    <td>{$row['department']}</td>

                    <td>{$row['manager']}</td>

                    <td>{$row['region']}</td>

                    <td>{$row['month']}</td>

                    <td>€{$row['revenue']}</td>

                    <td>€{$row['expenses']}</td>

                    <td>€{$row['budget']}</td>

                    <td>{$row['employees']}</td>

                    <td>{$row['projects_completed']}</td>

                </tr>

                ";

                }

                ?>

            </table>

        </div>

    </div>

</div>

<script src="script.js"></script>

</body>

</html>