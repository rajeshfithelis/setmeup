<?php

require_once 'Elasticsearch.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Gearman Worker function to pull the data from flatfiles 
 * and push it to ElasticSearch.
 * @author John Chornelius
 */
class DataAnalyticsFunction {

    protected $path = '/var/www/html/SMURC/app/webroot';  // Path to Webroot folder.

    public function updateAnalyticsES() {
        $StartTime = time();
        print($StartTime);
        $elasticSearch = new ElasticSearch();
        $elasticSearch->index = INDEX_DA;
        $elasticSearch->type = USER_TYPE_DA;
        date_default_timezone_set('UTC');
        $i = 1;
        $filename = $this->path . '/Analytics/analyticsLog.log.' . $i;
        $count = $elasticSearch->count();
        $lineCount = $count[0]->count + 1;
        while (file_exists($filename)) {
            foreach (file($filename) as $line) {
                if (strlen($line) > 10) {
                    $response = $elasticSearch->add($lineCount, $line);
                    $lineCount++;
                }
            }
            $date = date('Ymd');
            rename($this->path . '/Analytics/analyticsLog.log.' . $i, $this->path . '/Analytics/analyticsLog.log.' . $i . '.' . $date);
            $i = $i + 1;
            $filename = $this->path . '/Analytics/analyticsLog.log.' . $i;
        }
        
        $EndTime = time();
        print($EndTime);
    }
}

?>
