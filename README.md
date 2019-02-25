# concrete5-image_file

concrete5 8.4.4 has a problem;
When you use image_file attribute with html input mote, you will find that updating attributes will clear the images.

This repository tentatively fix this problem

Two elements for form.php, and createAttributeValueFromRequest in controller.php will handle these elements.
+ hidden input which stores the current image's id
+ checkbox which determines to keep the current image or clear it

# How to Use
Copy this repository into your concrete5's application folder.

# License
MIT