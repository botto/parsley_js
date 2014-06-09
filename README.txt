#parsley_js

Drupal module that provides integration with the client side validation library
parsley.js.
Currently this module only integrates on the FAPI layer.

At it's core it's simply injects the correct attributes into the relevant FAPI
field using hook_form_alter
It expects the same syntax as FAPI validation module using the rules attribute.


##Requirements

1. Libraries module
2. jQuery Update (Tested with jQuery 1.6, mileage may vary with earlier
versions of jQuery)
3. Parsley.js 1.2.4


##Installation

1. Download the parsley.js library
https://github.com/guillaumepotier/Parsley.js/archive/1.2.4.tar.gz to your
libraries location (usually sites/all/libraries)
2. Expand the contents of the archive in to parsleyjs, so that the folder
structure reads libraries/parsleyjs and parsley.js is directly under parsleyjs
folder
3. Enable the module under admin/modules
4. Set jQuery update to 1.9 or later under
admin/config/development/jquery_update

##Configuration
Currently there are no configuration options.

##Usage

To enable a form to be validated, simply set #parsley_js in the form array
to true.

```php
<?php
$form['#parsley_js'] = TRUE;
```

Set the #rules key on each field you want validated

```php
<?php

$form['my-field'] = array(
  '#title' => t('My Field'),
  '#description' => t("It's my field, only I get to fill it in"),
  '#required' => TRUE,
  '#rules' => array(
    'length[3,10]',
    'email',
  ),
);
```

###Rules
Currently only the following rules are implemented.
Where possible the rule names will follow the FAPI validation name, otherwise it
will have the same rule name as the parsley.js documentation
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

Details of these rules can be found at
https://parsleyjs.github.io/Parsley-1.x/documentation.html#validators

####Exceptions

**dateIso**:
Parsley.js calls it dateIso, use date_iso instead to keep consistency

**Length**:
The length rules supports both specific length, min length and max length.
A set length is indicated bu ```length[2,9]``` meaning any string
between 2 and 9 characters long
A min length is indicated by ```length[3, *]```
A max length is indicated by ```length[*, 6]```

**Range**:
The range follows the same syntax, except this checks the numeric length of the 
value. ```range[3, 8]``` validates the input is between 3 and 8
