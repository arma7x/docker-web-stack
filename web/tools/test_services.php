<?php

  $redis = new Redis();
  $redis->connect('redis', 6379);
  $redis->set("key", "Hello from Redis");
  echo "Redis => Sucessfully connect to server : " . $redis->get("key") . "<br>";

  $pq = pg_connect("host=postgres dbname=postgres user=postgres password=password");
  if (!$pq) {
    echo "Failed to connect to postgres";
    exit();
  }
  echo "Postgres => Sucessfully connect to server<br>";

  $mysqli = new mysqli("mariadb", "root", "password", "mysql");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MariaDB: " . $mysqli->connect_error;
    exit();
  }
  echo "MariaDB => Sucessfully connect to server<br>";

  $mongo = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017");
  $command = new MongoDB\Driver\Command(['ping' => 1]);
  try {
    $mongo->executeCommand('db', $command);
  } catch (\Exception $e) {
    echo "Failed to connect to MongoDB";
    exit();
  }
  echo "MongoDB => Sucessfully connect to server<br>";

  $memcached = new Memcached();
  $memcached->addServer("memcached", 11211);
  $memcached->set("key", "Hello from Memcached");
  $result = $memcached->get("key");
  echo "Memcached => Sucessfully connect to server : " . $result . "<br>";

?>
