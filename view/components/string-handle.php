<?php
function nameBuilder($name){
$arr['label'] = $name;
$arr['camelCase'] = toCamelCase($name);
$arr['kebab-case'] = toKebabCase($name);
$arr['snake_case'] = toSnakeCase($name);
return $arr;
}

function toCamelCase($name){
    $name = preg_replace("/[^A-Za-z0-9 ]/", '', $name); //remove non-alphanumeric
    $name = trim($name);
    $name = preg_replace('/\s+/', ' ', $name); //remove multiple whitespace, newline etc
    $name = strtolower($name); //lowecase everything
    $name = ucwords($name); //uppercase words
    $name = lcfirst($name); //lowercase 1st letter
    $name = preg_replace("/[ ]/", '', $name); //remove spaces
    return $name; // camelCase
}

function toKebabCase($name){
    $name = preg_replace("/[^A-Za-z0-9 ]/", '', $name);
    $name = trim($name);
    $name = preg_replace('/\s+/', ' ', $name);
    $name = strtolower($name);
    $name = preg_replace("/[ ]/", '-', $name);
    return $name; // kebab-case
}

function toPascalCase($name){
    $name = preg_replace("/[^A-Za-z0-9 ]/", '', $name); //remove non-alphanumeric
    $name = trim($name);
    $name = preg_replace('/\s+/', ' ', $name); //remove multiple whitespace, newline etc
    $name = strtolower($name); //lowecase everything
    $name = ucwords($name); //uppercase words
    $name = preg_replace("/[ ]/", '', $name); //remove spaces
    return $name; // PascalCase
}

function toSnakeCase($name){
    $name = preg_replace("/[^A-Za-z0-9 ]/", '', $name);
    $name = trim($name);
    $name = preg_replace('/\s+/', ' ', $name);
    $name = strtolower($name);
    $name = preg_replace("/[ ]/", '_', $name);
    return $name; // snake_case
}


// $input = " Hello yo? woRld  Day yo!";

// echo toCamelCase($input);
// echo "<br>";
// echo toKebabCase($input);

/*

<button style="display:block;width:120px; height:30px;" onclick="document.getElementById('getFile').click()">Your text here</button>
<input type='file' id="getFile" style="display:none"> 
*/
?>
