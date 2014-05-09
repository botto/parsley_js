#parsley_js

Drupal module to provide integration of the parsley.js form validation with 
Drupal's FAPI

This is not an end-user module, it relies on a hook to know which forms it 
should act on, however future integration with 

At it's core it's simply injects the correct attributes into the relevant FAPI 
field using hook_form_alter
It expects the same syntax as FAPI validation using the rules attribute.


##Usage

###Telling parsley_js which forms to parse
To enable a form to be picked up you will have to implement a hook
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

```php
<?php

$form['my-field'] = array(
  '#title' => t('My Field'),
  '#description' => t('It\'s my field, only I get to fill it in'),
  '#required' => TRUE,
  '#rules' => array(
    '

##Why
The main motivation behind this is that the clientside validation uses jquery_validate which I personally don't like  
