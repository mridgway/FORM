Overview
--------
FORM is a tool to create forms for Doctrine 2 models with as little effort as possible.  We will use
a manager style factory for forms and form elements, similar to Doctrine 2's EntityManager and
EntityRepository classes.  The form elements will be generated using Doctrine's metadata/annotations
along with our own custom annotation parser that allows you to specify form validators, getters, and
setters, and form element classes.

Zend_Form will be used for the initial implementation of this library, as it is what I am familiar
most with. I will try to abstract any functionality so that it can be converted to use a different
form library.

Roadmap
-------
1. Retrieve simple form elements simple data types (text, string, integer, boolean, etc.)
2. Retrieve form object for model
3. Implement mapping from object properties to form elements
4. Implement mapping from form elements to object properties
5. Implement validators on form elements
6. Implement object association fields
x. ...