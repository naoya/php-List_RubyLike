<?php
require_once 'List/RubyLike.php';

$list =& new List_RubyLike(array("foo", "bar", "baz"));
$list->push("bab")->push("moge", "piyo")->unshift("hoge")->each(function ($v) { print $v . "\n"; });
print $list->join(",") . "\n";
print "first: " . $list->first() . "\n";
print "last: " . $list->last()   . "\n";
$list->slice(2, 2)->dump();
$list->each_index(function ($i) { print $i . "\n"; });
$list->map(function ($v) { return strtoupper($v); })->each(function ($v) { print $v . "\n"; });
$list->grep(function ($v) { return strlen($v) > 3; })->dump();
print $list->find(function ($v) { return strstr($v, "ho"); }) . "\n";
print $list->length() . "\n";

print LR(array(2, 4, 5))->reduce(function ($a, $b) { return $a + $b; }) . "\n";
print LR(array(2, 4, 5))->sum() . "\n";
?>