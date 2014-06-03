#!/bin/bash

url="http://marcelo.wp.local/Rest/example.php/clients"
curl -i -X POST -H 'Content-Type: application/json' -d '{"Name": "'$1'", "Age":'$2'}' $url

