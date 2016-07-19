Input:

```php
<?php
require_once("../src/PHPConsistentor.php");

PHPConsistentor::init();
```

Output:

    Alias created: absolute_value -> abs
    Alias created: arc_cosine -> acos
    Alias created: arc_cosine_hyperbolic -> acosh
    Alias created: add_c_slashes -> addcslashes
    Alias created: add_slashes -> addslashes
    Alias created: array_column -> array_column
    Alias created: array_difference -> array_diff
    Alias created: array_difference_associative -> array_diff_assoc
    Alias created: array_difference_key -> array_diff_key
    Alias created: array_difference_user_associative -> array_diff_uassoc
    Alias created: array_difference_user_key -> array_diff_ukey
    Alias created: array_fill_keys -> array_fill_keys
    Alias created: array_intersect_associative -> array_intersect_assoc
    Alias created: array_intersect_key -> array_intersect_key
    Alias created: array_intersect_user_associative -> array_intersect_uassoc
    Alias created: array_intersect_user_key -> array_intersect_ukey
    Alias created: array_multi_sort -> array_multisort
    Alias created: array_product -> array_product
    Alias created: array_random -> array_rand
    Alias created: array_replace -> array_replace
    Alias created: array_replace_recursive -> array_replace_recursive
    Alias created: array_sumatory -> array_sum
    Alias created: array_user_difference -> array_udiff
    Alias created: array_user_difference_associative -> array_udiff_assoc
    Alias created: array_user_intersect -> array_uintersect
    Alias created: array_user_intersect_associative -> array_uintersect_assoc
    Alias created: array_reverse_sort -> arsort
    Alias created: arc_sine -> asin
    Alias created: arc_sine_hyperbolic -> asinh
    Alias created: array_sort -> asort
    Alias created: arc_tangent -> atan
    Alias created: arc_tangent_two -> atan2
    Alias created: arc_tangent_hyperbolic -> atanh

Input:

```php
<?php
require_once("../src/PHPConsistentor.php");

PHPConsistentor::init([
    "word_cut" => PHPConsistentor::WORD_CUT_CUT
]);
```

Output:

    Alias created: a_cos -> acos
    Alias created: a_cos_h -> acosh
    Alias created: add_c_slashes -> addcslashes
    Alias created: add_slashes -> addslashes
    Alias created: array_column -> array_column
    Alias created: array_diff_key -> array_diff_key
    Alias created: array_diff_u_assoc -> array_diff_uassoc
    Alias created: array_diff_u_key -> array_diff_ukey
    Alias created: array_fill_keys -> array_fill_keys
    Alias created: array_intersect_key -> array_intersect_key
    Alias created: array_intersect_u_assoc -> array_intersect_uassoc
    Alias created: array_intersect_u_key -> array_intersect_ukey
    Alias created: array_multi_sort -> array_multisort
    Alias created: array_product -> array_product
    Alias created: array_replace -> array_replace
    Alias created: array_replace_recursive -> array_replace_recursive
    Alias created: array_u_diff -> array_udiff
    Alias created: array_u_diff_assoc -> array_udiff_assoc
    Alias created: array_u_intersect -> array_uintersect
    Alias created: array_u_intersect_assoc -> array_uintersect_assoc
    Alias created: a_r_sort -> arsort
    Alias created: a_sin -> asin
    Alias created: a_sin_h -> asinh
    Alias created: a_sort -> asort
    Alias created: a_tan -> atan
    Alias created: a_tan_2 -> atan2
    Alias created: a_tan_h -> atanh

Input:

```php
<?php
require_once("../src/PHPConsistentor.php");

PHPConsistentor::init([
    "word_cut" => PHPConsistentor::WORD_CUT_CUT,
    "word_separator" => PHPConsistentor::WOR_SEPARATOR_CAMEL_CASE
]);
```

Output:

    Alias created: arrayChangeKeyCase -> array_change_key_case
    Alias created: arrayChunk -> array_chunk
    Alias created: arrayColumn -> array_column
    Alias created: arrayCombine -> array_combine
    Alias created: arrayCountValues -> array_count_values
    Alias created: arrayDiff -> array_diff
    Alias created: arrayDiffAssoc -> array_diff_assoc
    Alias created: arrayDiffKey -> array_diff_key
    Alias created: arrayDiffUAssoc -> array_diff_uassoc
    Alias created: arrayDiffUKey -> array_diff_ukey
    Alias created: arrayFill -> array_fill
    Alias created: arrayFillKeys -> array_fill_keys
    Alias created: arrayFlip -> array_flip
    Alias created: arrayIntersect -> array_intersect
    Alias created: arrayIntersectAssoc -> array_intersect_assoc
    Alias created: arrayIntersectKey -> array_intersect_key
    Alias created: arrayIntersectUAssoc -> array_intersect_uassoc
    Alias created: arrayIntersectUKey -> array_intersect_ukey
    Alias created: arrayKeys -> array_keys
    Alias created: arrayKeyExists -> array_key_exists
    Alias created: arrayMap -> array_map
    Alias created: arrayMerge -> array_merge
    Alias created: arrayMergeRecursive -> array_merge_recursive
    Alias created: arrayMultiSort -> array_multisort
    Alias created: arrayPad -> array_pad
    Alias created: arrayPop -> array_pop
    Alias created: arrayProduct -> array_product
    Alias created: arrayPush -> array_push
    Alias created: arrayRand -> array_rand
    Alias created: arrayReduce -> array_reduce
    Alias created: arrayReplace -> array_replace
    Alias created: arrayReplaceRecursive -> array_replace_recursive
    Alias created: arrayReverse -> array_reverse
    Alias created: arraySearch -> array_search
    Alias created: arrayShift -> array_shift
    Alias created: arraySlice -> array_slice
    Alias created: arraySplice -> array_splice
    Alias created: arraySum -> array_sum
    Alias created: arrayUDiff -> array_udiff
    Alias created: arrayUDiffAssoc -> array_udiff_assoc
    Alias created: arrayUIntersect -> array_uintersect
    Alias created: arrayUIntersectAssoc -> array_uintersect_assoc
    Alias created: arrayUnique -> array_unique
    Alias created: arrayUnshift -> array_unshift
    Alias created: arrayValues -> array_values
    Alias created: arrayWalk -> array_walk
    Alias created: arrayWalkRecursive -> array_walk_recursive
    Alias created: assertOptions -> assert_options


Input:

```php
<?php
require_once("../src/PHPConsistentor.php");

PHPConsistentor::init([
    "word_separator" => PHPConsistentor::WOR_SEPARATOR_CAMEL_CASE
]);
```

Output:

    Alias created: absoluteValue -> abs
    Alias created: arcCosine -> acos
    Alias created: arcCosineHyperbolic -> acosh
    Alias created: arrayChangeKeyCase -> array_change_key_case
    Alias created: arrayChunk -> array_chunk
    Alias created: arrayColumn -> array_column
    Alias created: arrayCombine -> array_combine
    Alias created: arrayCountValues -> array_count_values
    Alias created: arrayDifference -> array_diff
    Alias created: arrayDifferenceAssociative -> array_diff_assoc
    Alias created: arrayDifferenceKey -> array_diff_key
    Alias created: arrayDifferenceUserAssociative -> array_diff_uassoc
    Alias created: arrayDifferenceUserKey -> array_diff_ukey
    Alias created: arrayFill -> array_fill
    Alias created: arrayFillKeys -> array_fill_keys
    Alias created: arrayFlip -> array_flip
    Alias created: arrayIntersect -> array_intersect
    Alias created: arrayIntersectAssociative -> array_intersect_assoc
    Alias created: arrayIntersectKey -> array_intersect_key
    Alias created: arrayIntersectUserAssociative -> array_intersect_uassoc
    Alias created: arrayIntersectUserKey -> array_intersect_ukey
    Alias created: arrayKeys -> array_keys
    Alias created: arrayKeyExists -> array_key_exists
    Alias created: arrayMap -> array_map
    Alias created: arrayMerge -> array_merge
    Alias created: arrayMergeRecursive -> array_merge_recursive
    Alias created: arrayMultiSort -> array_multisort
    Alias created: arrayPad -> array_pad
    Alias created: arrayPop -> array_pop
    Alias created: arrayProduct -> array_product
    Alias created: arrayPush -> array_push
    Alias created: arrayRandom -> array_rand
    Alias created: arrayReduce -> array_reduce
    Alias created: arrayReplace -> array_replace
    Alias created: arrayReplaceRecursive -> array_replace_recursive
    Alias created: arrayReverse -> array_reverse
    Alias created: arraySearch -> array_search
    Alias created: arrayShift -> array_shift
    Alias created: arraySlice -> array_slice
    Alias created: arraySplice -> array_splice
    Alias created: arraySumatory -> array_sum
    Alias created: arrayUserDifference -> array_udiff
    Alias created: arrayUserDifferenceAssociative -> array_udiff_assoc
    Alias created: arrayUserIntersect -> array_uintersect
    Alias created: arrayUserIntersectAssociative -> array_uintersect_assoc
    Alias created: arrayUnique -> array_unique
    Alias created: arrayUnshift -> array_unshift
    Alias created: arrayValues -> array_values
    Alias created: arrayWalk -> array_walk
    Alias created: arrayWalkRecursive -> array_walk_recursive
    Alias created: arrayReverseSort -> arsort
    Alias created: arcSine -> asin
    Alias created: arcSineHyperbolic -> asinh
    Alias created: arraySort -> asort
    Alias created: assertOptions -> assert_options
    Alias created: arcTangent -> atan
    Alias created: arcTangentTwo -> atan2
    Alias created: arcTangentHyperbolic -> atanh
