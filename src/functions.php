<?php
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    die();
}
function handle_exception($e)
{
    error_log($e);                        // Log the error
    http_response_code(500);              // Set the http response code
    echo "<h1>Sorry, a problem occurred</h1>   
          The site's owners have been informed. Please try again later.";
}
