<?php

  $redis = new Redis();
  $redis->connect(getenv('REDIS_HOST'), getenv('REDIS_PORT'));
  $redis->set("key", "Hello from Redis");
  echo "Redis => Sucessfully connect to server : " . $redis->get("key") . "<br>";

  $pq = pg_connect("host=" . getenv('POSTGRES_HOST'). " dbname=postgres user=" . getenv('POSTGRES_USER') . " password=" . getenv('POSTGRES_PASSWORD'));
  if (!$pq) {
    echo "Failed to connect to postgres";
    exit();
  }
  echo "Postgres => Sucessfully connect to server<br>";

  $mysqli = new mysqli(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_ROOT_PASSWORD'), "mysql");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MariaDB: " . $mysqli->connect_error;
    exit();
  }
  echo "MariaDB => Sucessfully connect to server<br>";

  $mongo = new MongoDB\Driver\Manager("mongodb://" . getenv('MONGO_USERNAME') . ":" . getenv('MONGO_PASSWORD') . "@" . getenv('MONGO_HOST') . ":" . getenv('MONGO_PORT'));
  $command = new MongoDB\Driver\Command(['ping' => 1]);
  try {
    $mongo->executeCommand('db', $command);
  } catch (\Exception $e) {
    echo "Failed to connect to MongoDB";
    exit();
  }
  echo "MongoDB => Sucessfully connect to server<br>";

  $memcached = new Memcached();
  $memcached->addServer(getenv('MEMCACHED_HOST'), getenv('MEMCACHED_PORT'));
  $memcached->set("key", "Hello from Memcached");
  $result = $memcached->get("key");
  echo "Memcached => Sucessfully connect to server : " . $result . "<br>";

?>
