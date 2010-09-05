<?php
require_once 'lib/lime.php';
require_once 'List/RubyLike.php';

$t = new lime_test();

$list = LR(array(2, 4, 6, 8, 10));

$t->ok($list);
$t->is($list->length(), 5);
$t->is($list->first(), 2);
$t->is($list->last(), 10);
$t->is($list->sum(), 30);

$t->is($list->pop(), 10);
$t->is_deeply($list->to_a(), array(2, 4, 6, 8));

$t->is($list->shift(), 2);
$t->is_deeply($list->to_a(), array(4, 6, 8));

$t->is(get_class( $list->push(5) ), 'List_RubyLike');
$t->is( $list->last(), 5 );
$t->is_deeply( $list->to_a(), array(4, 6, 8, 5) );

$t->is(get_class( $list->unshift(10) ), 'List_RubyLike');
$t->is( $list->first(), 10 );
$t->is_deeply( $list->to_a(), array(10, 4, 6, 8, 5) );

$t->is( $list->join(","), "10,4,6,8,5");
$t->is_deeply( $list->slice(2, 2)->to_a(), array(6,8));

$t->is_deeply( $list->unshift(1, 2)->to_a(), array(1, 2, 10, 4, 6, 8, 5));

$list2 = new List_RubyLike(1, 2, 3);
$t->ok( $list2 );
$t->is( get_class( $list2 ), 'List_RubyLike');
$t->is( $list2->length(), 3 );
$t->is( LR(1, 2, 3)->length(), 3);

/* TODO
   - each()
   - each_index()
   - map()
   - grep()
   - find()
   - reduce()
 */
?>