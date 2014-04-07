<?php

require 'Elasticsearch.php';
$elasticSearch = new ElasticSearch();
$elasticSearch->index = INDEX_DA;
$elasticSearch->type = USER_TYPE_DA;
$elasticSearch->create();
$data = '{
  "analytics": {
    "_source" : {"enabled" : true},
    "properties": {
        "UserA": {
        "type": "long",
        "store": "yes",
        "index": "not_analyzed"
      },
      "UserB" : {
	  "type" : "long",
	  "store":"yes",
          "index": "not_analyzed"
      },
        "UserC" : {
	  "type" : "long",
	  "index" : "not_analyzed",
	  "store":"yes"
      },
       "Type": {
        "type": "long",
        "store": "yes",
		"index": "not_analyzed"
      },
       "PPLTime": {
        "type": "date",
        "store": "yes",
		"index": "not_analyzed"
      },
       "CPLTime": {
        "type": "date",
        "store": "yes",
		"index": "not_analyzed"
      },
       "PPage": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "CPage": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "UserType": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "LogTime": {
        "type": "date",
        "store": "yes",
		"index": "not_analyzed"
      },
       "SessionId": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "UEmail": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "Age": {
        "type": "date",
        "store": "yes",
		"index": "not_analyzed"
      },
       "Sex": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "RStatus": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "Location": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "HomeTown": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "EducationType": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "SchoolName": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      },
       "EducationLevel": {
        "type": "string",
        "store": "yes",
		"index": "not_analyzed"
      }
    }
  }
}';
var_dump($elasticSearch->map($data));
?>
