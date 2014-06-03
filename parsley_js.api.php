<?php

/**
 * @file
 * Documents the hooks that parsley_js module exposes
 */

/**
 * Hook to set which forms will have the parsleyjs validation on them.
 *
 * @return array
 *   An array whose keys are the form ids that parsley.js will validate
 */
function hook_parsley_js_forms() {
  return array(
    'example_form_1',
    'example_form_2',
  );
}
