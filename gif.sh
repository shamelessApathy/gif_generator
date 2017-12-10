#!/bin/sh

FILE=$1
NAME=$2
echo "emptying frames directory"
echo "rm frames/*"
rm frames/*


echo "creating frames"
echo "ffmpeg -i $FILE -r 5 'frames/frame-%03d.jpg'"

ffmpeg -i $FILE -r 5 'frames/frame-%03d.jpg'

echo "finished creating frames"


convert -delay 20 -loop 0 frames/*.jpg gifs/$NAME


