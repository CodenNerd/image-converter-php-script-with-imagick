<?php

	$url = 'https://svs.gsfc.nasa.gov/vis/a000000/a004900/a004955/frames/5760x3240_16x9_30p/fancy/comp.0001.tif';

    $convertFrom = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
    $convertTo = "png";

    echo "\nConverting $convertFrom to $convertTo...\n";

    $timestamp = time();
	$img = '/tmp/conversion-from-'. $timestamp .'.' . $convertFrom;
	file_put_contents($img, file_get_contents($url));

    $image = new Imagick($img);
    $image->setImageFormat($convertTo);
    // echo $image;
    $newImagePath = '/tmp/conversion-to-' . $timestamp . '.' . $convertTo;
    file_put_contents( $newImagePath, $image);
    echo "\nSuccessfully converted $img to $newImagePath\n";


