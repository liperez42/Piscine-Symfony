#!/bin/bash

URL="$1"

curl -sI "$URL" | grep -i "Location:" | cut -d ' ' -f2