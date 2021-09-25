<?php

$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => true,
        'cast_spaces' => true,
        'combine_consecutive_unsets' => true,
        'concat_space' => ['spacing' => 'one'],
        'general_phpdoc_annotation_remove' => true,
        'linebreak_after_opening_tag' => true,
        'list_syntax' => ['syntax' => 'short'],
        'method_argument_space' => ['keep_multiple_spaces_after_comma' => false],
        'native_constant_invocation' => true,
        'new_with_braces' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_break_comment' => false,
        'no_spaces_around_offset' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_unused_imports' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line' => true,
        'normalize_index_brace' => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_align' => true,
        'phpdoc_indent' => true,
        'phpdoc_separation' => true,
        'phpdoc_to_comment' => true,
        'phpdoc_trim' => true,
        'phpdoc_no_empty_return' => false,
        'protected_to_private' => false,
        'single_quote' => true,
        'no_superfluous_phpdoc_tags' => false,
        'ternary_to_null_coalescing' => true,
        'trim_array_spaces' => true,
        'yoda_style' => false,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->in(__DIR__)
    );
