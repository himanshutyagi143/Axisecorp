<?php

// NewsController.php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

public function news() {
    $posts = DB::table('news')->paginate(10); // Assuming 'news' is the name of your table.

    return view('news.news', compact('news'));

}

?>
