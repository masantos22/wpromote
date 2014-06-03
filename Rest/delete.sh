#!/bin/bash

url="http://marcelo.wp.local/Rest/example.php/clients/$1"
curl -i -X DELETE $url
