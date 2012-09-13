<?php

$plugin_info = array(
  'pi_name' => 'HOW Ministash',
  'pi_version' => '1.0',
  'pi_author' => 'Dibeja',
  'pi_author_url' => 'https://github.com/dibeja/how_ministash',
  'pi_description' => 'A Stash Like plugin for EE 1.x',
  'pi_usage' => Ministash::usage()
  );

class Ministash {
  
  	var $return_data = "";
	var $name;

  function Ministash()
  {
    global $SESS, $TMPL;
		
		$this->name = $TMPL->fetch_param('name');
		$this->data = $TMPL->tagdata;
		
		$SESS->cache['ministash'];
  }

  function set()
  {
		global $SESS;
		$SESS->cache['ministash'][$this->name] = $this->data;
  }

  function append()
  { 
	global $SESS;
	if(isset($SESS->cache['ministash'][$this->name])){
      $SESS->cache['ministash'][$this->name] .= $this->data;
    } else {
      $SESS->cache['ministash'][$this->name] = $this->data;
    }
  }

  function get()
  {
	global $SESS;
	if(isset($SESS->cache['ministash'][$this->name]))
    {
      $this->return_data = $SESS->cache['ministash'][$this->name];
    } else {
		$this->return_data = '';
	}
	return $this->return_data;
  }

  // ----------------------------------------
  //  Plugin Usage
  // ----------------------------------------

  // This function describes how the plugin is used.
  //  Make sure and use output buffering

  function usage()
  {
  ob_start(); 
  ?>
The Ministash Plugin is aimed to give EE1 users the opportunity to use partials and layouts 
(more info about in this very good article by John D Wells: http://johndwells.com/blog/homegrown-plugin-to-create-template-partials-for-expressionengine)

It's MINI so you have only three functions:

SET:
{exp:ministash:set name="YOURSTASHNAME"}
  content to be stashed
{/exp:ministash}

To set a "one time" stash

APPEND:
{exp:ministash:append name="YOURSTASHNAME"}
  content to be appended
{/exp:ministash}

To add content at the bottom of a stash

GET:
{exp:ministash:get name="YOURSTASHNAME"}

To retrieve the content previously set

IMPORTANT!
In EE1 the pagination is appended directly to the resultset, so you cannot stash it! Sorry folks, it's not my fault :)

THANKS TO:
Mark Croxton: for the wonderful and original Stash plugin
Max Lazar: for the MX Jumper plugin wich give me a good starting point

Happy templating!
  <?php
  $buffer = ob_get_contents();
	
  ob_end_clean(); 

  return $buffer;
  }
  // END

}

?>