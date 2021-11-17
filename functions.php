<?php

function validateformdata($formdata)
{
    $formdata=trim(stripslashes(htmlspecialchars(strip_tags(str_replace(array('(',')'),'',$formdata)),ENT_QUOTES)));
    return $formdata;
}


?>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">