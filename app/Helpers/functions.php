<?php

function objToJson($obj)
{
    return (array) json_decode(json_encode($obj));
}

function decToPercent($value)
{
    return empty($value) ? '0%' : number_format($value * 100, 2).'%';
}
