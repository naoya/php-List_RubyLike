<?php
/**
 * Array iterator like Ruby.
 *
 * @author Naoya Ito <i.naoya@gmail.com>
 * licence: TBD
 */
class List_RubyLike {
    var $list;

    function List_RubyLike ($array) {
        $this->list =& $array;
    }

    function _new ($array) {
        $class = get_class($this);
        return new $class($array);
    }

    function push ($args) {
        foreach (func_get_args() as $v) {
            array_push($this->list, $v);
        }
        return $this;
    }

    function pop() {
        return array_pop($this->list);
    }

    function unshift ($args) {
        foreach (func_get_args() as $v) {
            array_unshift($this->list, $v);
        }
        return $this;
    }

    function shift() {
        return array_shift($this->list);
    }

    function join ($glue) {
        return implode($glue, $this->list);
    }

    function first () {
        return $this->list[0];
    }

    function last () {
        return end($this->list);
    }

    function slice ($start, $end) {
        return $this->_new(array_slice($this->list, $start, $end));
    }

    function each($cb) {
        if (!is_callable($cb))
            die("assert");

        foreach ($this->list as $v) {
            $cb($v);
        }
        return $this;
    }

    function length () {
        return count($this->list);
    }

    function map ($cb) {
        if (!is_callable($cb))
            die("assert");
        return $this->_new( array_map($cb, $this->list) );
    }

    function grep ($cb) {
        $grepped = $this->_new(array());
        foreach ($this->list as $v) {
            if ($cb($v) == TRUE)
                $grepped->push($v);
        }
        return $grepped;
    }

    function find ($cb) {
        foreach ($this->list as $v) {
            if ($cb($v) == TRUE)
                return $v;
        }
        return FALSE;
    }

    function each_index($cb) {
        if (!is_callable($cb))
            die("assert");

        foreach($this->list as $i => $v) {
            $cb($i, $v);
        } 

        return $this;
    }

    function reduce ($cb) {
        return array_reduce($this->list, $cb);
    }

    function sum () {
        return $this->reduce(function ($a, $b) { return $a + $b; });
    }

    function dump() {
        var_dump($this);
    }

    function to_a () {
        return $this->list;
    }
}

function LR($array) {
    return new List_RubyLike( $array );
}
?>