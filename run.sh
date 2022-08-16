docker build -t tiff-conversion-image . 
if [[ "$1" ]] && [[ "$2" ]]
then
    docker run -it -e src_url=$1 -e convert_to=$2 --name tiff-conversion-app tiff-conversion-image
else
    docker run -it --name tiff-conversion-app tiff-conversion-image
fi