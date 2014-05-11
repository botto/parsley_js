#parsley_js

Drupal module that provides integration with the parsley.js library.
Parsley.js performs client side form validation.
Currently this module only integrates on the FAPI layer.

This is not an end-user module, it relies on a hook to know which forms it 
should act on.

At it's core it's simply injects the correct attributes into the relevant FAPI 
field using hook_form_alter
It expects the same syntax as FAPI validation module using the rules attribute.


##Requirments

1. Libraries module
2. Parsley.js 1.2.4


##Installation

1. Download the parsley.js library https://github.com/guillaumepotier/Parsley.js/archive/1.2.4.tar.gz
to your libraries location (usually sites/all/libraries)
2. Expand the contents of the archive in to parsleyjs, so that the folder 
structure reads libraries/parsleyjs and parsley.js is directly under parsleyjs folder
3. Enable the module under admin/modules

##Configuration
Currently there are no configuration options

##Usage

To enable a form to be validated you will have to implement a hook
```php
<?php
example_parsley_js_forms() {
  return array(
    'example_form',
    'another_form'
  );
}
?>
```

When the form is generated it will then check all the declared hooks and inject
the necessary markup so parsley.js will do it's magic.
The return of this hook is cached so you will have to clear cache once you have
implemented the hook.

```php
<?php

$form['my-field'] = array(
  '#title' => t('My Field'),
  '#description' => t('It\'s my field, only I get to fill it in'),
  '#required' => TRUE,
  '#rules' => array(
    'length[3,10]',
  ),
);
```

###Rules

* notblank
* email
* url
* urlstrict
* digit
* numeric
* alpha_numeric
* date_iso
* phone
* length
* range

The syntax is the same as FAPI Validation, so length[3, 10]

Further details can be found https://parsleyjs.github.io/Parsley-1.x/

##Troubleshooting
The module relies on a cache entry for the forms that have been declared in a
hook, therefor you will have to clear the cache once you have declared new 
forms in the hook
