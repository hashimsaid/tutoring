<?php
function filterEmail($input)
{
  if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function filterText($input)
{
  $pattern = "/^[a-zA-Z0-9]+$/";
  if(preg_match($pattern, $input)) {
    return true;
  } else {
    return false;
  }
}
?>