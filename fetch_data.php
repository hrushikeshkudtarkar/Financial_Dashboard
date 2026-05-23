<?php

include 'db.php';

$months = [];
$revenues = [];
$expenses = [];

$departments = [];
$departmentRevenue = [];

$query = pg_query($conn,
"SELECT month,
SUM(revenue) AS revenue,
SUM(expenses) AS expenses
FROM finance_data
GROUP BY month");

while($row = pg_fetch_assoc($query)){

$months[] = $row['month'];
$revenues[] = $row['revenue'];
$expenses[] = $row['expenses'];

}

$deptQuery = pg_query($conn,
"SELECT department,
SUM(revenue) AS total_revenue
FROM finance_data
GROUP BY department");

while($row = pg_fetch_assoc($deptQuery)){

$departments[] = $row['department'];
$departmentRevenue[] = $row['total_revenue'];

}

$response = [

'months'=>$months,
'revenues'=>$revenues,
'expenses'=>$expenses,

'departments'=>$departments,
'departmentRevenue'=>$departmentRevenue

];

header('Content-Type: application/json');

echo json_encode($response);

?>