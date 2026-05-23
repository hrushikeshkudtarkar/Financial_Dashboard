<?php

$conn = pg_connect("
host=localhost
port=5432
dbname=financial_dashboard
user=postgres
password=2222
");

if(!$conn){
    echo "Database Connection Failed";
}

?>