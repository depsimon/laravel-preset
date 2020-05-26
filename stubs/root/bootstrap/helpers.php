<?php

if (!function_exists('selected')) {
  function selected($comparison = false)
  {
    return $comparison ? 'selected' : '';
  }
}

if (!function_exists('checked')) {
  function checked($comparison = false)
  {
    return $comparison ? 'checked' : '';
  }
}
