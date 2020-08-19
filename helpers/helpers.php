<?php
if(!function_exists('getCategories'))  {
    function getCategories()
    {
        return \App\Models\Category::with('news')->get();
    }
}
