<?php

	$url = getenv('src_url');
    $convertTo = getenv('convert_to');

    $convertFrom = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);

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


