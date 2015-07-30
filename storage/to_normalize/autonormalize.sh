#!/bin/bash

cd "$(dirname "$0")"
while read FILE; do
./normalize.sh "$FILE"
done < <(find . -mindepth 1 -maxdepth 1 -type f -name "*.mp4")
