<?php

/*
 * Description: This a script to initiate gearman worker via crontab.
 * All the loggings stored in log files under 'webroot/Analytics' will be pushed
 * to Elastic Search.
 * 
 * Author: John Chornelius
 * 
 */

require_once 'DataAnalyticsFunction.php';

$DataFunction = new DataAnalyticsFunction;
$DataFunction->updateAnalyticsES();

?>
