<?php
function getSquareArea($length, $width, $height)
{
    $area = $length * $width * $height;
    echo "${area}cm^3";
}

echo getSquareArea(5, 10, 8);
