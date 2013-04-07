MicroViC is a web app framework so small, it has only a view and controller.

The aim is to provide the smallest footprint possible, while still giving 
users some of the power and flexibility of a full fledged mvc framework.

It doesnt try to be db agnostic and aims to have the sql in the controller 
(abstracted with relevant db helper methods whenever possible).

It is not meant to replace existing framework and cmses like: 
cakephp, codeigniter, wordpress and asp mvc.

It should (in due course) however support crud operations (with validations and form helpers)
cms like features such as creating pages with wysiwig html editors.
Another nice to have would be page generation (think output caching for mostly static pages).

