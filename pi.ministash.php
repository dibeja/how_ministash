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
The Ministash Plugin ....

  <?php
  $buffer = ob_get_contents();
	
  ob_end_clean(); 

  return $buffer;
  }
  // END

}

?>