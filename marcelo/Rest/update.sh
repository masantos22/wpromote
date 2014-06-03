#!/bin/bash

url="http://marcelo.wp.local/Rest/example.php/clients/$1"
curl -i -X PUT -H 'Content-Type: application/json' -d '{"Name": "'$2'", "Age":'$3'}' $url

