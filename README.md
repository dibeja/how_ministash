how_ministash
=============

The Ministash Plugin is aimed to give EE1 users the opportunity to use partials and layouts (more info about in this very good article by John D Wells: http://johndwells.com/blog/homegrown-plugin-to-create-template-partials-for-expressionengine)

It's MINI so you have only three funcions:

__SET:__  
	{exp:ministash:set name="YOURSTASHNAME"}
  		content
	{/exp:ministash}

To set a "one time" stash

__APPEND:__  
	{exp:ministash:append name="YOURSTASHNAME"}
  		content
	{/exp:ministash}

To add content at the bottom of a stash

__GET:__  
	{exp:ministash:get name="YOURSTASHNAME"}

To retrieve the content previously set

__IMPORTANT!__
In EE1 the pagination is appended at the bottom of the resultset, so you cannot stash it! Sorry folks, it's not my fault :)

__THANKS TO:__
Mark Croxton: for the wonderful and original Stash plugin
Max Lazar: for the MX Jumper plugin wich give me a good starting point

Happy templating!