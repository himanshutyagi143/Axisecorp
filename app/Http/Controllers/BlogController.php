<?php

// BlogController.php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

public function blog() {
    $posts = DB::table('blogs')->paginate(10); // Assuming 'blogs' is the name of your table.

    return view('blog.blog', compact('blogs'));

}

?>



