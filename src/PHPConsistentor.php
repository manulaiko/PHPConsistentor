<?php

/**
 * PHPConsistentor
 *
 * The main class of PHPConsistentor, in order to use it call the method {@see PHPConsistentor::init}.
 *
 * @author Manulaiko <manulaiko@gmail.com>
 *
 * @package PHPConsistentor
 *
 * @version 1.0
 *
 * @since 1.0
 *
 * @see ../README.md For a guide on using PHPConsistentor
 */
class PHPConsistentor
{
    ///////////////////////////////////
    // Start Configuration Constants //
    ///////////////////////////////////
    /**
     * Separate words with underscores
     *
     * @var string
     */
    const WORD_SEPARATION_UNDERSCORE = "underscore";

    /**
     * Don't separate words
     *
     * @var string
     */
    const WORD_SEPARATION_NO_SEPARATION = "no_separation";

    /**
     * Separate words with camelCase
     *
     * @var string
     */
    const WORD_SEPARATION_CAMEL_CASE = "camelCase";

    /**
     * Don't cut words
     *
     * @var string
     */
    const WORD_CUT_NO_CUT = "no_cut";

    /**
     * Cut words
     *
     * @var string
     */
    const WORD_CUT_CUT = "cut";

    /**
     * Translate `2` to `to`
     *
     * @var string
     */
    const TO_2_TO = "to";

    /**
     * Translates `to` to `2`
     *
     * @var string
     */
    const TO_2_2 = "2";

    /**
     * Don't translates `to` and keeps original
     *
     * @var string
     */
    const TO_2_DEFAULT = "to_default";
    /////////////////////////////////
    // End Configuration Constants //
    /////////////////////////////////

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Starts stupidly huge array with function names 'cause it's the easiest way to gather all functions and their aliases //
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * The all-mighty array with function aliases
     *
     * @todo Find a better way when I'm more motivated
     *
     * @var array
     */
    private static $_functions = array(
        /**
         * I won't explain all functions, they're mostly the same:
         *
         * "function_name" => [
         * 	    "function"   => "func",
         * 	    "name"       => "name",
         * 		"_WILDCARD_" => ""
         * ]
         *
         * Each index is an array of type `$key (full word) => $value (short word)` with the words of function's name
         *
         * The `_WILDCARD_` index is a string that shows where are the `to` words, the value is the default type (either `2`, `to` or nothing)
         *
         * Example:
         *
         *     "hex2bin" => [
         *         "hexadecimal" => "hex",
         *         "_WILDCARD_"  => "2",
         *         "binary"      => "bin"
         *     ],
         *     "hexdec" => [
         *         "hexadecimal" => "hex",
         *         "_WILDCARD_"  => "",
         *         "decimal"     => "dec"
         *     ]
         *
         * @see https://secure.php.net/manual/en/indexes.functions.php for the list of functions
         */
        "abs" => array(
            "absolute" => "abs",
            "value"    => ""
        ),
        "acos" => array(
            "arc"    => "a",
            "cosine" => "cos"
        ),
        "acosh" => array(
            "arc"        => "a",
            "cosine"     => "cos",
            "hyperbolic" => "h"
        ),
        "addcslashes" => array(
            "add"     => "add",
            "c"       => "c",
            "slashes" => "slashes"
        ),
        "addslashes" => array(
            "add"     => "add",
            "slashes" => "slashes"
        ),
        "array_change_key_case" => array(
            "array"  => "array",
            "change" => "change",
            "key"    => "key",
            "case"   => "case"
        ),
        "array_chunk" => array(
            "array" => "array",
            "chunk" => "chunk"
        ),
        "array_column" => array(
            "array"  => "array",
            "column" => "column"
        ),
        "array_combine" => array(
            "array"   => "array",
            "combine" => "combine"
        ),
        "array_count_values" => array(
            "array"  => "array",
            "count"  => "count",
            "values" => "values"
        ),
        "array_diff" => array(
            "array"       => "array",
            "difference"  => "diff"
        ),
        "array_diff_assoc" => array(
            "array"       => "array",
            "difference"  => "diff",
            "associative" => "assoc"
        ),
        "array_diff_key" => array(
            "array"       => "array",
            "difference"  => "diff",
            "key"         => "key"
        ),
        "array_diff_uassoc" => array(
            "array"       => "array",
            "difference"  => "diff",
            "user"        => "u",
            "associative" => "assoc"
        ),
        "array_diff_ukey" => array(
            "array"      => "array",
            "difference" => "diff",
            "user"       => "u",
            "key"        => "key"
        ),
        "array_fill" => array(
            "array" => "array",
            "fill"  => "fill"
        ),
        "array_fill_keys" => array(
            "array" => "array",
            "fill"  => "fill",
            "keys"  => "keys"
        ),
        "array_flip" => array(
            "array" => "array",
            "flip"  => "flip"
        ),
        "array_intersect" => array(
            "array"     => "array",
            "intersect" => "intersect",
        ),
        "array_intersect_assoc" => array(
            "array"       => "array",
            "intersect"   => "intersect",
            "associative" => "assoc"
        ),
        "array_intersect_key" => array(
            "array"     => "array",
            "intersect" => "intersect",
            "key"       => "key"
        ),
        "array_intersect_uassoc" => array(
            "array"       => "array",
            "intersect"   => "intersect",
            "user"        => "u",
            "associative" => "assoc"
        ),
        "array_intersect_ukey" => array(
            "array"     => "array",
            "intersect" => "intersect",
            "user"      => "u",
            "key"       => "key"
        ),
        "array_keys" => array(
            "array" => "array",
            "keys"  => "keys"
        ),
        "array_key_exists" => array(
            "array"  => "array",
            "key"    => "key",
            "exists" => "exists"
        ),
        "array_map" => array(
            "array" => "array",
            "map"   => "map"
        ),
        "array_merge" => array(
            "array" => "array",
            "merge" => "merge"
        ),
        "array_merge_recursive" => array(
            "array"     => "array",
            "merge"     => "merge",
            "recursive" => "recursive"
        ),
        "array_multisort" => array(
            "array" => "array",
            "multi" => "multi",
            "sort"  => "sort"
        ),
        "array_pad" => array(
            "array" => "array",
            "pad"   => "pad"
        ),
        "array_pop" => array(
            "array" => "array",
            "pop"   => "pop"
        ),
        "array_product" => array(
            "array"   => "array",
            "product" => "product"
        ),
        "array_push" => array(
            "array" => "array",
            "push"  => "push"
        ),
        "array_rand" => array(
            "array"  => "array",
            "random" => "rand"
        ),
        "array_reduce" => array(
            "array"  => "array",
            "reduce" => "reduce"
        ),
        "array_replace" => array(
            "array"   => "array",
            "replace" => "replace"
        ),
        "array_replace_recursive" => array(
            "array"     => "array",
            "replace"   => "replace",
            "recursive" => "recursive"
        ),
        "array_reverse" => array(
            "array"   => "array",
            "reverse" => "reverse"
        ),
        "array_search" => array(
            "array"  => "array",
            "search" => "search"
        ),
        "array_shift" => array(
            "array" => "array",
            "shift" => "shift"
        ),
        "array_slice" => array(
            "array" => "array",
            "slice" => "slice"
        ),
        "array_splice" => array(
            "array"  => "array",
            "splice" => "splice"
        ),
        "array_sum" => array(
            "array"    => "array",
            "sumatory" => "sum"
        ),
        "array_udiff" => array(
            "array"      => "array",
            "user"       => "u",
            "difference" => "diff"
        ),
        "array_udiff_assoc" => array(
            "array"       => "array",
            "user"        => "u",
            "difference"  => "diff",
            "associative" => "assoc"
        ),
        "array_udiff_uassoc" => array(
            "array"       => "array",
            "user"        => "u",
            "difference"  => "diff",
            "user"        => "u",
            "associative" => "assoc"
        ),
        "array_uintersect" => array(
            "array"     => "array",
            "user"      => "u",
            "intersect" => "intersect"
        ),
        "array_uintersect_assoc" => array(
            "array"       => "array",
            "user"        => "u",
            "intersect"   => "intersect",
            "associative" => "assoc"
        ),
        "array_uintersect_uassoc" => array(
            "array"       => "array",
            "user"        => "u",
            "intersect"   => "intersect",
            "user"        => "u",
            "associative" => "assoc"
        ),
        "array_unique" => array(
            "array"  => "array",
            "unique" => "unique"
        ),
        "array_unshift" => array(
            "array"   => "array",
            "unshift" => "unshift"
        ),
        "array_values" => array(
            "array"  => "array",
            "values" => "values"
        ),
        "array_walk" => array(
            "array" => "array",
            "walk"  => "walk"
        ),
        "array_walk_recursive" => array(
            "array"     => "array",
            "walk"      => "walk",
            "recursive" => "recursive"
        ),
        "arsort" => array(
            "array"   => "a",
            "reverse" => "r",
            "sort"    => "sort"
        ),
        "asin" => array(
            "arc"  => "a",
            "sine" => "sin"
        ),
        "asinh" => array(
            "arc"        => "a",
            "sine"       => "sin",
            "hyperbolic" => "h"
        ),
        "asort" => array(
            "array" => "a",
            "sort"  => "sort"
        ),
        "assert_options" => array(
            "assert"  => "assert",
            "options" => "options"
        ),
        "atan" => array(
            "arc"     => "a",
            "tangent" => "tan"
        ),
        "atan2" => array(
            "arc"     => "a",
            "tangent" => "tan",
            "two"     => "2"
        ),
        "atanh" => array(
            "arc"        => "a",
            "tangent"    => "tan",
            "hyperbolic" => "h"
        ),
        "base64_decode" => array(
            "base64" => "base64",
            "decode" => "decode"
        ),
        "base64_encode" => array(
            "base64" => "base64",
            "encode" => "encode"
        ),
        "basename" => array(
            "base" => "base",
            "name" => "name"
        ),
        "base_convert" => array(
            "base"    => "base",
            "convert" => "convert"
        ),
        "bin2hex" => array(
            "binary"      => "bin",
            "_WILDCARD_"  => "2",
            "hexadecimal" => "hex"
        ),
        "bindec" => array(
            "binary"     => "bin",
            "_WILDCARD_" => "",
            "decimal"    => "dec"
        ),
        "bindtextdomain" => array(
            "bind"   => "bind",
            "text"   => "text",
            "domain" => "domain"
        ),
        "bind_textdomain_codeset" => array(
            "bind"   => "bind",
            "text"   => "text",
            "domain" => "domain",
            "code"   => "code",
            "set"    => "set"
        ),
        "blenc_encrypt" => array(
            "blenc"   => "blenc",
            "encrypt" => "encypt"
        ),
        "boolval" => array(
            "boolean" => "bool",
            "value"   => "val"
        ),
        "bson_decode" => array(
            "bson"   => "bson",
            "decode" => "decode"
        ),
        "bson_encode" => array(
            "bson"   => "bson",
            "encode" => "encode"
        ),
        "call_user_func" => array(
            "call"     => "call",
            "user"     => "user",
            "function" => "function"
        ),
        "call_user_func_array" => array(
            "call"     => "call",
            "user"     => "user",
            "function" => "function",
            "array"    => "array"
        ),
        "call_user_method" => array(
            "call"   => "call",
            "user"   => "user",
            "method" => "method"
        ),
        "call_user_method_array" => array(
            "call"   => "call",
            "user"   => "user",
            "method" => "method",
            "array"  => "array"
        ),
        "chdir" => array(
            "change"    => "ch",
            "directory" => "dir"
        ),
        "checkdate" => array(
            "check" => "check",
            "date"  => "date"
        ),
        "checkdnsrr" => array(
            "check"   => "check",
            "dns"     => "dns",
            "records" => "rr"
        ),
        "chgrp" => array(
            "change" => "ch",
            "group"  => "grp"
        ),
        "chmod" => array(
            "change" => "ch",
            "mode"   => "mod"
        ),
        "chown" => array(
            "change" => "ch",
            "owner"  => "own"
        ),
        "chr" => array(
            "character" => "chr"
        ),
        "chroot" => array(
            "change" => "ch",
            "root"   => "root"
        ),
        "chunk_split" => array(
            "chunk" => "chunk",
            "split" => "split"
        ),
        "class_alias" => array(
            "class" => "class",
            "alias" => "alias"
        ),
        "class_exists" => array(
            "class"  => "class",
            "exists" => "exists",
        ),
        "class_implements" => array(
            "class"      => "class",
            "implements" => "implements"
        ),
        "class_parents" => array(
            "class"   => "class",
            "parents" => "parents"
        ),
        "class_uses" => array(
            "class" => "class",
            "uses"  => "uses"
        ),
        "clearstatcache" => array(
            "clear"  => "clear",
            "status" => "status",
            "cache"  => "cache"
        ),
        "closedir" => array(
            "close"     => "close",
            "directory" => "dir"
        ),
        "closelog" => array(
            "close"  => "close",
            "logger" => "log"
        ),
        "cos" => array(
            "cosine" => "cos"
        ),
        "cosh" => array(
            "cosine"     => "cos",
            "hyperbolic" => "h"
        ),
        "create_function" => array(
            "create"   => "create",
            "function" => "function"
        ),
        "decbin" => array(
            "decimal"    => "dec",
            "_WILDCARD_" => "",
            "binary"     => "bin"
        ),
        "dechex" => array(
            "decimal"     => "dec",
            "_WILDCARD_"  => "",
            "hexadecimal" => "hex"
        ),
        "decoct" => array(
            "decimal"    => "dec",
            "_WILDCARD_" => "",
            "octal"      => "oct"
        ),
        "deg2rad" => array(
            "degree"     => "deg",
            "_WILDCARD_" => "2",
            "radian"     => "rad"
        ),
        "dir" => array(
            "directory" => "dir"
        ),
        "dirname" => array(
            "directory" => "dir",
            "name"      => "name"
        ),
        "disk_free_space" => array(
            "disk"  => "disk",
            "free"  => "free",
            "space" => "space"
        ),
        "disk_total_space" => array(
            "disk"  => "disk",
            "total" => "total",
            "space" => "space"
        ),
        "doubleval" => array(
            "double" => "double",
            "value"  => "val"
        ),
        "easter_date" => array(
            "easter" => "easter",
            "date"   => "date"
        ),
        "easter_days" => array(
            "easter" => "easter",
            "days"   => "days"
        ),
        "eval" => array(
            "evaluate" => "eval"
        ),
        "exec" => array(
            "execute" => "exec"
        ),
        "exp" => array(
            "exponent" => "exp"
        ),
        "expm1" => array(
            "exponent" => "exp",
            "minus"    => "m",
            "one"      => "1"
        ),
        "feof" => array(
            "file" => "f",
            "end"  => "e",
            "of"   => "o",
            "file" => "f"
        ),
        "fflush" => array(
            "file"  => "f",
            "flush" => "flush"
        ),
        "fgetc" => array(
            "file"      => "f",
            "get"       => "get",
            "character" => "c"
        ),
        "fileatime" => array(
            "file"   => "file",
            "access" => "a",
            "time"   => "time"
        ),
        "filectime" => array(
            "file"   => "file",
            "change" => "c",
            "time"   => "time"
        ),
        "filegroup" => array(
            "file"  => "file",
            "group" => "group"
        ),
        "fileinode" => array(
            "file"  => "file",
            "inode" => "inode"
        ),
        "filemtime" => array(
            "file"         => "file",
            "modification" => "m",
            "time"         => "time"
        ),
        "fileowner" => array(
            "file"  => "file",
            "owner" => "owner"
        ),
        "fileperms" => array(
            "file"        => "file",
            "permissions" => "perms"
        ),
        "filesize" => array(
            "file" => "file",
            "size" => "size"
        ),
        "filetype" => array(
            "file" => "file",
            "type" => "type"
        ),
        "file_exists" => array(
            "file"   => "file",
            "exists" => "exists"
        ),
        "file_get_contents" => array(
            "file"     => "file",
            "get"      => "get",
            "contents" => "contents"
        ),
        "file_put_contents" => array(
            "file"     => "file",
            "put"      => "put",
            "contents" => "contents"
        ),
        "filter_has_var" => array(
            "filter" => "filter",
            "hash"   => "has",
            "var"    => "var"
        ),
        "filter_id" => array(
            "filter"     => "filter",
            "identifier" => "id"
        ),
        "filter_input" => array(
            "filter" => "filter",
            "input"  => "input"
        ),
        "filter_input_array" => array(
            "filter" => "filter",
            "input"  => "input",
            "array"  => "array"
        ),
        "filter_list" => array(
            "filter" => "filter",
            "list"   => "list"
        ),
        "filter_var" => array(
            "filter"   => "filter",
            "variable" => "var"
        ),
        "finfo_close" => array(
            "file"        => "f",
            "information" => "info",
            "close"       => "close"
        ),
        "finfo_open" => array(
            "file"        => "f",
            "information" => "info",
            "open"        => "open"
        ),
        "floatval" => array(
            "float" => "float",
            "value" => "val"
        ),
        "flock" => array(
            "file" => "f",
            "lock" => "lock"
        ),
        "fmod" => array(
            "float"  => "f",
            "modulo" => "mod"
        ),
        "fnmatch" => array(
            "file"  => "f",
            "name"  => "n",
            "match" => "match"
        ),
        "fopen" => array(
            "file" => "f",
            "open" => "open"
        ),
        "forward_static_call" => array(
            "forward" => "forward",
            "static"  => "static",
            "call"    => "call"
        ),
        "forward_static_call_array" => array(
            "forward" => "forward",
            "static"  => "static",
            "call"    => "call",
            "array"   => "array"
        ),
        "fpassthru" => array(
            "file" => "f",
            "pass" => "pass",
            "thru" => "thru"
        ),
        "fprintf" => array(
            "file"      => "f",
            "print"     => "print",
            "formatted" => "f"
        ),
        "fputcsv" => array(
            "file" => "f",
            "put"  => "put",
            "csv"  => "csv"
        ),
        "fputs" => array(
            "file" => "f",
            "puts" => "puts"
        ),
        "fread" => array(
            "file" => "f",
            "read" => "read"
        ),
        "fscanf" => array(
            "file"   => "f",
            "scan"   => "scan",
            "format" => "f"
        ),
        "fseek" => array(
            "file" => "f",
            "seek" => "seek"
        ),
        "fsockopen" => array(
            "file"   => "f",
            "socket" => "sock",
            "open"   => "open"
        ),
        "fstat" => array(
            "file"       => "f",
            "statistics" => "stat"
        ),
        "ftell" => array(
            "file" => "f",
            "tell" => "tell"
        ),
        "ftok" => array(
            "file"  => "f",
            "token" => "tok"
        ),
        "ftruncate" => array(
            "file"     => "f",
            "truncate" => "truncate"
        ),
        "function_exists" => array(
            "function" => "function",
            "exists"   => "exists"
        ),
        "func_get_arg" => array(
            "function" => "func",
            "get"      => "get",
            "argument" => "arg"
        ),
        "func_get_args" => array(
            "function"  => "func",
            "get"       => "get",
            "arguments" => "args"
        ),
        "func_num_args" => array(
            "function"  => "func",
            "number"    => "num",
            "arguments" => "args"
        ),
        "fwrite" => array(
            "file"  => "f",
            "write" => "write"
        ),
        "getallheaders" => array(
            "get"     => "get",
            "all"     => "all",
            "headers" => "headers"
        ),
        "getcwd" => array(
            "get"       => "get",
            "current"   => "c",
            "working"   => "w",
            "directory" => "d"
        ),
        "getdate" => array(
            "get"  => "get",
            "date" => "date"
        ),
        "getenv" => array(
            "get"         => "get",
            "environment" => "env",
            "variable"    => ""
        ),
        "gethostbyaddr" => array(
            "get"     => "get",
            "host"    => "host",
            "by"      => "by",
            "address" => "addr"
        ),
        "gethostbyname" => array(
            "get"  => "get",
            "host" => "host",
            "by"   => "by",
            "name" => "name"
        ),
        "gethostbynamel" => array(
            "get"  => "get",
            "host" => "host",
            "by"   => "by",
            "name" => "name",
            "list" => "l"
        ),
        "gethostname" => array(
            "get"  => "get",
            "host" => "host",
            "name" => "name"
        ),
        "getimagesize" => array(
            "get"   => "get",
            "image" => "image",
            "size"  => "size"
        ),
        "getimagesizefromstring" => array(
            "get"    => "get",
            "image"  => "image",
            "size"   => "size",
            "from"   => "from",
            "string" => "string"
        ),
        "getlastmod" => array(
            "get"          => "get",
            "last"         => "last",
            "modification" => "mod"
        ),
        "getmygid" => array(
            "get"   => "get",
            "owner" => "my",
            "gid"   => "gid"
        ),
        "getmyinode" => array(
            "get"    => "get",
            "owner"  => "my",
            "inode"  => "inode"
        ),
        "getmypid" => array(
            "get"           => "get",
            "owner"         => "my",
            "process"       => "p",
            "identificator" => "id"
        ),
        "getmyuid" => array(
            "get"   => "get",
            "owner" => "my",
            "uid"   => "uid"
        ),
        "getopt" => array(
            "get"    => "get",
            "option" => "opt"
        ),
        "getprotobyname" => array(
            "get"      => "get",
            "protocol" => "proto",
            "by"       => "by",
            "name"     => "name"
        ),
        "getprotobynumber" => array(
            "get"      => "get",
            "protocol" => "protocol",
            "by"       => "by",
            "number"   => "number"
        ),
        "getrandmax" => array(
            "get"    => "get",
            "random" => "rand",
            "max"    => "max",
            "value"  => ""
        ),
        "getrusage" => array(
            "get"      => "get",
            "resource" => "r",
            "usage"    => "usage"
        ),
        "getservbyname" => array(
            "get"     => "get",
            "service" => "serv",
            "by"      => "by",
            "name"    => "name"
        ),
        "gettext" => array(
            "get"  => "get",
            "text" => "text"
        ),
        "gettimeofday" => array(
            "get"  => "get",
            "time" => "time",
            "of"   => "of",
            "day"  => "day"
        ),
        "gettype" => array(
            "get"  => "get",
            "type" => "type"
        ),
        "get_browser" => array(
            "get"     => "get",
            "browser" => "browser"
        ),
        "get_called_class" => array(
            "get"    => "get",
            "called" => "called",
            "class"  => "class"
        ),
        "get_cfg_var" => array(
            "get"           => "get",
            "configuration" => "cfg",
            "variable"      => "var"
        ),
        "get_class" => array(
            "get"   => "get",
            "class" => "class"
        ),
        "get_class_methods" => array(
            "get"     => "get",
            "class"   => "class",
            "methods" => "methods"
        ),
        "get_class_vars" => array(
            "get"       => "get",
            "class"     => "class",
            "variables" => "vars"
        ),
        "get_current_user" => array(
            "get"     => "get",
            "current" => "current",
            "user"    => "user"
        ),
        "get_declared_classes" => array(
            "get"      => "get",
            "declared" => "declared",
            "classes"  => "classes"
        ),
        "get_declared_interfaces" => array(
            "get"        => "get",
            "declared"   => "declared",
            "interfaces" => "interfaces"
        ),
        "get_declared_traits" => array(
            "get"      => "get",
            "declared" => "declared",
            "traits"   => "traits"
        ),
        "get_defined_constants" => array(
            "get"       => "get",
            "defined"   => "define",
            "constants" => "constants"
        ),
        "get_defined_functions" => array(
            "get"       => "get",
            "defined"   => "defined",
            "functions" => "functions"
        ),
        "get_defined_vars" => array(
            "get"     => "get",
            "defined" => "defined",
            "vars"    => "vars"
        ),
        "get_extensions_funcs" => array(
            "get"        => "get",
            "extensions" => "extensions",
            "functions"  => "funcs"
        ),
        "get_headers" => array(
            "get"     => "get",
            "headers" => "headers"
        ),
        "get_html_translation_table" => array(
            "get"         => "get",
            "html"        => "html",
            "translation" => "translation",
            "table"       => "table"
        ),
        "get_included_files" => array(
            "get"      => "get",
            "included" => "included",
            "files"    => "files"
        ),
        "get_loaded_extensions" => array(
            "get"        => "get",
            "loaded"     => "loaded",
            "extensions" => "extensions"
        ),
        "get_include_path" => array(
            "get"     => "get",
            "include" => "include",
            "path"    => "path"
        ),
        "get_magic_quotes_gpc" => array(
            "get"    => "get",
            "magic"  => "magic",
            "quotes" => "quotes",
            "gpc"    => "gpc"
        ),
        "get_magic_quotes_runtime" => array(
            "get"     => "get",
            "magic"   => "magic",
            "quotes"  => "quotes",
            "runtime" => "runtime"
        ),
        "get_meta_tags" => array(
            "get"  => "get",
            "meta" => "meta",
            "tags" => "tags"
        ),
        "get_object_vars" => array(
            "get"       => "get",
            "object"    => "object",
            "variables" => "vars"
        ),
        "get_parent_class" => array(
            "get"    => "get",
            "parent" => "parent",
            "class"  => "class"
        ),
        "get_required_files" => array(
            "get"      => "get",
            "required" => "required",
            "files"    => "files"
        ),
        "get_resources" => array(
            "get"       => "get",
            "resources" => "resources"
        ),
        "get_resource_type" => array(
            "get"      => "get",
            "resource" => "resource",
            "type"     => "type"
        ),
        "headers_list" => array(
            "headers" => "headers",
            "list"    => "list"
        ),
        "headers_sent" => array(
            "headers" => "headers",
            "sent"    => "sent"
        ),
        "header_register_callback" => array(
            "header"   => "header",
            "register" => "register",
            "callback" => "callback"
        ),
        "header_remove" => array(
            "header" => "header",
            "remove" => "remove"
        ),
        "hebrev" => array(
            "hebrew"     => "hebre",
            "_WILDCARD_" => "",
            "visual"     => "v"
        ),
        "hebrevc" => array(
            "hebrew"     => "hebre",
            "_WILDCARD_" => "",
            "visual"     => "v",
            "conversion" => "c"
        ),
        "hex2bin" => array(
            "hexadecimal" => "hex",
            "_WILDCARD_"  => "2",
            "binary"      => "bin"
        ),
        "hexdec" => array(
            "hexadecimal" => "hex",
            "_WILDCARD_"  => "",
            "decimal"     => "dec"
        ),
        "htmlentities" => array(
            "html"     => "html",
            "entities" => "entities"
        ),
        "htmlspecialchars" => array(
            "html"         => "html",
            "special"      => "special",
            "characters"   => "chars"
        ),
        "htmlspecialchars_decode" => array(
            "html"       => "html",
            "special"    => "special",
            "characters" => "chars",
            "decode"     => "decode"
        ),
        "html_entity_decode" => array(
            "html"   => "html",
            "entity" => "entity",
            "decode" => "decode"
        ),
        "hypot" => array(
            "hypotenuse" => "hypot"
        ),
        "ini_alter" => array(
            "ini"   => "ini",
            "alter" => "alter"
        ),
        "init_get" => array(
            "ini" => "ini",
            "get" => "get"
        ),
        "ini_get_all" => array(
            "ini" => "ini",
            "get" => "get",
            "all" => "all"
        ),
        "ini_restore" => array(
            "ini"     => "ini",
            "restore" => "restore"
        ),
        "ini_set" => array(
            "ini" => "ini",
            "set" => "set"
        ),
        "intdiv" => array(
            "integer"  => "int",
            "division" => "div"
        ),
        "interface_exists" => array(
            "interface" => "interface",
            "exists"    => "exists"
        ),
        "intval" => array(
            "integer" => "int",
            "value"   => "val"
        ),
        "in_array" => array(
            "in"    => "in",
            "array" => "array"
        ),
        "ip2long" => array(
            "ip"         => "ip",
            "_WILDCARD_" => "2",
            "long"       => "long"
        ),
        "isset" => array(
            "is"  => "is",
            "set" => "set"
        ),
        "is_a" => array(
            "is" => "is",
            "a"  => "a"
        ),
        "is_array" => array(
            "is"    => "is",
            "array" => "array"
        ),
        "is_bool" => array(
            "is"      => "is",
            "boolean" => "bool"
        ),
        "is_callable" => array(
            "is"       => "is",
            "callable" => "callable"
        ),
        "is_dir" => array(
            "is"        => "is",
            "directory" => "dir"
        ),
        "is_double" => array(
            "is"     => "is",
            "double" => "double"
        ),
        "is_executable" => array(
            "is"         => "is",
            "executable" => "executable"
        ),
        "is_file" => array(
            "is"   => "is",
            "file" => "file"
        ),
        "is_finite" => array(
            "is"     => "is",
            "finite" => "finite"
        ),
        "is_float" => array(
            "is"    => "is",
            "float" => "float"
        ),
        "is_infinite" => array(
            "is"       => "is",
            "infinite" => "infinite"
        ),
        "is_int" => array(
            "is"      => "is",
            "integer" => "int"
        ),
        "is_link" => array(
            "is"   => "is",
            "link" => "link"
        ),
        "is_nan" => array(
            "is"     => "is",
            "not"    => "n",
            "a"      => "a",
            "number" => "n"
        ),
        "is_null" => array(
            "is"   => "is",
            "null" => "null"
        ),
        "is_numeric" => array(
            "is"      => "is",
            "numeric" => "numeric"
        ),
        "is_object" => array(
            "is"     => "is",
            "object" => "object"
        ),
        "is_readable" => array(
            "is"       => "is",
            "readable" => "readable"
        ),
        "is_real" => array(
            "is"   => "is",
            "real" => "real"
        ),
        "is_resource" => array(
            "is"       => "is",
            "resource" => "resource"
        ),
        "is_scalar" => array(
            "is"     => "is",
            "scalar" => "scalar"
        ),
        "is_soap_fault" => array(
            "is"    => "is",
            "soap"  => "soap",
            "fault" => "fault"
        ),
        "is_subclass_of" => array(
            "is"       => "is",
            "subclass" => "subclass",
            "of"       => "of"
        ),
        "is_tainted" => array(
            "is"      => "is",
            "tainted" => "tainted"
        ),
        "is_uploaded_file" => array(
            "is"       => "is",
            "uploaded" => "uploaded",
            "file"     => "file"
        ),
        "is_writable" => array(
            "is"       => "is",
            "writable" => "writable"
        ),
        "is_writeable" => array(
            "is"        => "is",
            "writeable" => "writeable"
        )
    );
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // End stupidly huge array with function names 'cause it's the easiest way to gather all functions and their aliases //
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Adds a function alias
     *
     * @param string $old The function that we will aliase
     * @param string $new The new name of the function
     *
     * @return mixed Old function result
     */
    public static function alias($old, $new)
    {
        if(function_exists($new)) {
            return;
        }

        eval("function {$new}() {
            \$args = func_get_args();

            return call_user_func_array(
                {$old},
                \$args
            );
        }");
    }

    /**
     * Inits PHPConsitentor
     *
     * @param array $configuration Array containing configuration
     */
    public static function init($configuration = array())
    {
        // Assure that configuration array is properly set
        $configuration = self::_checkConfiguration($configuration);

        foreach(self::$_functions as $old => $function) {
            $new = "";

            foreach($function as $key => $value) {
                if($key == "_WILDCARD_") {
                    if($configuration["to_2"] == PHPConsistentor::TO_2_TO) {
                        $key   = "to";
                        $value = "to";
                    } else if($configuration["to_2"] == PHPConsistentor::TO_2_2) {
                        $key   = "2";
                        $value = "2";
                    } else {
                        $key = $value;
                    }
                }

                if($configuration["word_separator"] == PHPConsistentor::WORD_SEPARATION_UNDERSCORE) {
                    if($configuration["word_cut"] == PHPConsistentor::WORD_CUT_NO_CUT) {
                        $word = $key;
                    } else {
                        $word = $value;
                    }

                    if(!empty($word)) {
                        if(empty($new)) {
                            $new .= $word;
                        } else{
                            $new .= "_{$word}";
                        }
                    }
                } else if($configuration["word_separator"] == PHPConsistentor::WORD_SEPARATION_CAMEL_CASE) {
                    if($configuration["word_cut"] == PHPConsistentor::WORD_CUT_NO_CUT) {
                        $word = $key;
                    } else {
                        $word = $value;
                    }

                    if(!empty($word)) {
                        if(empty($new)) {
                            $new .= $word;
                        } else {
                            $new .= ucfirst($word);
                        }
                    }
                } else {
                    if($configuration["word_cut"] == PHPConsistentor::WORD_CUT_NO_CUT && !empty($key)) {
                        $new .= $key;
                    } else if(!empty($value)){
                        $new .= $value;
                    }
                }
            }

            self::alias($old, $new);
        }
    }

    /**
     * Checks that the array is a valid configuration array
     *
     * @param array $configuration Configuration array to check
     *
     * @return array Validated configuration array
     */
    private static function _checkConfiguration($configuration)
    {
        if(
            empty($configuration) ||
            !is_array($configuration)
        ) {
            $configuration["word_separator"] = PHPConsistentor::WORD_SEPARATION_UNDERSCORE;
            $configuration["word_cut"]       = PHPConsistentor::WORD_CUT_NO_CUT;
            $configuration["to_2"]           = PHPConsistentor::TO_2_TO;
        } else {
            if(
                empty($configuration["word_separator"]) ||
                !in_array($configuration["word_separator"], array(
                    PHPConsistentor::WORD_SEPARATION_UNDERSCORE,
                    PHPConsistentor::WORD_SEPARATION_CAMEL_CASE,
                    PHPConsistentor::WORD_SEPARATION_NO_SEPARATION
                ))
            ) {
                $configuration["word_separator"] = PHPConsistentor::WORD_SEPARATION_UNDERSCORE;
            }

            if(
                empty($configuration["word_cut"]) ||
                !in_array($configuration["word_cut"], array(
                    PHPConsistentor::WORD_CUT_CUT,
                    PHPConsistentor::WORD_CUT_NO_CUT
                ))
            ) {
                $configuration["word_cut"] = PHPConsistentor::WORD_CUT_NO_CUT;
            }

            if(
                empty($configuration["to_2"]) ||
                !in_array($configuration["to_2"], array(
                    PHPConsistentor::TO_2_TO,
                    PHPConsistentor::TO_2_2,
                    PHPConsistentor::TO_2_DEFAULT
                ))
            ) {
                $configuration["to_2"] = PHPConsistentor::TO_2_TO;
            }
        }

        return $configuration;
    }
}
