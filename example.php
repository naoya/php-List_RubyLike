<?php
require_once 'List/RubyLike.php';

echo LR(array("foo", "bar"))
    ->push("baz", "piyo")
    ->map(function ($v) { return strtoupper($v); })
    ->join(", ") . "\n";

echo LR(range(1, 5))
    ->grep(function ($n) { return $n % 2 == 0; })
    ->map(function ($n) { return $n * $n; })
    ->sum() . "\n";
?>