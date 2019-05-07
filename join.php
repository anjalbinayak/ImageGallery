<?php


$sql = "SELECT p.name,c.name FROM product  p  inner JOIN consumer  c ON product.pid = consumer.pid";

?>