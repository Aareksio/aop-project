#!/bin/bash


if [ ! -z "$1" ]
then
  input_file=$1
else
  echo "$(tput setaf 1)I need at least one file to work with.$(tput sgr0)"
  echo ""
  echo "****************************************"
  echo "normalize.sh <input_file> [output_file]"
  echo "****************************************"
  echo ""
  echo "<input_file> file you want to process"
  echo "[output_file] (optional) name to save the new file as"
  echo ""
  exit
fi

if [ ! -z "$2" ]
then
  output_file=$2
else
  raw_file="/home/mole/sygulski/aop/storage/normalized/$input_file"
  output_file="${raw_file%.*}.mp4"
fi

function welcome() {
  echo ""
  echo "$(tput setaf 6)#############################################################"
  echo "   Normalize v0.8."
  echo "#############################################################$(tput sgr0)"
}

function split_streams() {
  if [[ ! -f "$output_file" ]]; then
    echo "$(tput setaf 2)...Normalized file not found, processing $(tput sgr0)"
  else
    echo "$(tput setaf 2)...Normalized file found, aborting $(tput sgr0)"
    exit
  fi
  echo "$(tput setaf 2)...Splitting audio and video for processing$(tput sgr0)"
  ffmpeg -loglevel panic -i $input_file -c:a pcm_s16le -vn audio.wav < /dev/null
  ffmpeg -loglevel panic -i $input_file -vcodec copy -an silent.mov < /dev/null
}


function normalize_audio() {
  echo "$(tput setaf 2)...Analyzing audio track for peak volume$(tput sgr0)"
  sox audio.wav -n stat -v 2> vol.txt
  vol=`cat vol.txt`
  test1=`echo "$vol > 0.950" | bc`
  test2=`echo "1.050 > $vol" | bc`
  if [[ $test1 -gt 0 && $test2 -gt 0 ]]; then
    echo "$(tput setaf 2)...No need to normalize ($vol), terminating $(tput sgr0)"
    rm audio.wav
    rm silent.mov
    rm vol.txt
    cp $input_file $output_file
    exit
  else
    echo "$(tput setaf 2)...Processing audio file by factor of $vol $(tput sgr0)"
    sox -v $vol -G audio.wav norm.wav
  fi
}

function recompile_audio_video() {
  echo "$(tput setaf 2)...Encoding H.264 qt-faststart file...(this could take a while)$(tput sgr0)"
  ffmpeg -loglevel panic -i silent.mov -i norm.wav -map 0:0 -map 1:0 -c:v libx264 -preset slow -profile:v main -c:a libvo_aacenc -movflags +faststart  "$1" < /dev/null
}

function remove_trash() {
  echo "$(tput setaf 2)...Cleaning up$(tput sgr0)"
  rm audio.wav
  rm norm.wav
  rm silent.mov
  rm vol.txt
}
 
function notify_complete() {
  echo "$(tput setaf 2)...Done!"
}

function print_stats() {
  echo "$(tput setaf 6)#############################################################"
  echo "Volume was changed by a factor of $vol"
  echo "#############################################################$(tput sgr0)"
  echo ""
}

welcome
split_streams
normalize_audio
recompile_audio_video $output_file
remove_trash
notify_complete
print_stats
