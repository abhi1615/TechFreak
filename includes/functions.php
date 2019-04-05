<?php

function confirmQuery($confirm) {
    global $connection;
    if(!$confirm) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
}