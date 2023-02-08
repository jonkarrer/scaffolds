<?php

declare(strict_types=1);

$host = "host=localhost";
$port = "port=5432";
$dbname = "dbname=postgres";
$credentials = "user=jonkarrer password=admin";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
  echo "Error : Unable to open database\n";
} else {
  echo "Opened database successfully\n";
}

$sql = "CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  user_id TEXT NOT NULL,
  name TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE
)";


$ret = pg_query($db, $sql);
if (!$ret) {
  echo pg_last_error($db);
} else {
  print_r(pg_fetch_assoc($ret));
}
pg_close($db);
