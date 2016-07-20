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
         * If the index is a string, PHPConsistentor will assume is the function name with full words in snake_case (e.g. any of `is_*` functions)
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
        "array_change_key_case",
        "array_chunk",
        "array_column",
        "array_combine",
        "array_count_values",
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
        "array_fill",
        "array_fill_keys",
        "array_flip",
        "array_intersect",
        "array_intersect_assoc" => array(
            "array"       => "array",
            "intersect"   => "intersect",
            "associative" => "assoc"
        ),
        "array_intersect_key",
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
        "array_keys",
        "array_key_exists",
        "array_map",
        "array_merge",
        "array_merge_recursive",
        "array_multisort" => array(
            "array" => "array",
            "multi" => "multi",
            "sort"  => "sort"
        ),
        "array_pad",
        "array_pop",
        "array_product",
        "array_push",
        "array_rand" => array(
            "array"  => "array",
            "random" => "rand"
        ),
        "array_reduce",
        "array_replace",
        "array_replace_recursive",
        "array_reverse",
        "array_search",
        "array_shift",
        "array_slice",
        "array_splice",
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
        "array_unique",
        "array_unshift",
        "array_values",
        "array_walk",
        "array_walk_recursive",
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
        "assert_options",
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
        "base64_decode",
        "base64_encode",
        "basename" => array(
            "base" => "base",
            "name" => "name"
        ),
        "base_convert",
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
        "bson_decode",
        "bson_encode",
        "call_user_func" => array(
            "call"     => "call",
            "user"     => "user",
            "function" => "func"
        ),
        "call_user_func_array" => array(
            "call"     => "call",
            "user"     => "user",
            "function" => "func",
            "array"    => "array"
        ),
        "call_user_method",
        "call_user_method_array",
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
        "chunk_split",
        "class_alias",
        "class_exists",
        "class_implements",
        "class_parents",
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
        "create_function",
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
        "disk_free_space",
        "disk_total_space",
        "doubleval" => array(
            "double" => "double",
            "value"  => "val"
        ),
        "easter_date",
        "easter_days",
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
        "file_exists",
        "file_get_contents",
        "file_put_contents",
        "filter_has_var" => array(
            "filter"   => "filter",
            "hash"     => "has",
            "variable" => "var"
        ),
        "filter_id" => array(
            "filter"     => "filter",
            "identifier" => "id"
        ),
        "filter_input",
        "filter_input_array",
        "filter_list",
        "filter_var",
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
        "forward_static_call",
        "forward_static_call_array",
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
        "function_exists",
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
        "get_browser",
        "get_called_class",
        "get_cfg_var" => array(
            "get"           => "get",
            "configuration" => "cfg",
            "variable"      => "var"
        ),
        "get_class",
        "get_class_methods",
        "get_class_vars" => array(
            "get"       => "get",
            "class"     => "class",
            "variables" => "vars"
        ),
        "get_current_user",
        "get_declared_classes",
        "get_declared_interfaces",
        "get_declared_traits",
        "get_defined_constants",
        "get_defined_functions",
        "get_defined_vars" => array(
            "get"        => "get",
            "defined"    => "defined",
            "variabless" => "vars"
        ),
        "get_extensions_funcs" => array(
            "get"        => "get",
            "extensions" => "extensions",
            "functions"  => "funcs"
        ),
        "get_headers",
        "get_html_translation_table",
        "get_included_files",
        "get_loaded_extensions",
        "get_include_path",
        "get_magic_quotes_gpc",
        "get_magic_quotes_runtime",
        "get_meta_tags",
        "get_object_vars",
        "get_parent_class",
        "get_required_files",
        "get_resources",
        "get_resource_type",
        "headers_list",
        "headers_sent",
        "header_register_callback",
        "header_remove",
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
        "html_entity_decode",
        "hypot" => array(
            "hypotenuse" => "hypot"
        ),
        "ini_alter",
        "init_get",
        "ini_get_all",
        "ini_restore",
        "ini_set",
        "intdiv" => array(
            "integer"  => "int",
            "division" => "div"
        ),
        "interface_exists",
        "intval" => array(
            "integer" => "int",
            "value"   => "val"
        ),
        "in_array",
        "ip2long" => array(
            "ip"         => "ip",
            "_WILDCARD_" => "2",
            "long"       => "long"
        ),
        "isset" => array(
            "is"  => "is",
            "set" => "set"
        ),
        "is_a",
        "is_array",
        "is_bool" => array(
            "is"      => "is",
            "boolean" => "bool"
        ),
        "is_callable",
        "is_dir" => array(
            "is"        => "is",
            "directory" => "dir"
        ),
        "is_double",
        "is_executable",
        "is_file",
        "is_finite",
        "is_float",
        "is_infinite",
        "is_int",
        "is_link",
        "is_nan" => array(
            "is"     => "is",
            "not"    => "n",
            "a"      => "a",
            "number" => "n"
        ),
        "is_null",
        "is_numeric",
        "is_object",
        "is_readable",
        "is_real",
        "is_resource",
        "is_scalar",
        "is_soap_fault",
        "is_subclass_of",
        "is_tainted",
        "is_uploaded_file",
        "is_writeable"
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

            if(is_string($function)) {
                $old      = $function;
                $function = explode("_", $function);
            }

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
