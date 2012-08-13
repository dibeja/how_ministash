<?php

$plugin_info = array(
  'pi_name' => 'HOW Ministash',
  'pi_version' => '1.0',
  'pi_author' => 'Dibeja',
  'pi_author_url' => 'https://github.com/dibeja/how_ministash',
  'pi_description' => 'A "Stash Like" plugin for EE 1.x',
  'pi_usage' => Ministash::usage()
  );

class Ministash
{
  global $SESS;
  global $TMPL;
  var $return_data = "";

  function Ministash()
  {
    $this->EE->session->cache['ministash']
  }

  function set()
  {
    $name = $TMPL->fetch_param('name');
    $this->EE->session->cache['ministash'][$name] = $TMPL->tagdata;
  }

  function append()
  {
    $name = $TMPL->fetch_param('name');
    if(isset(this->EE->session->cache['ministash'][$name]))
    {
      $this->EE->session->cache['ministash'][$name] .= $TMPL->tagdata;
    } else {
      $this->EE->session->cache['ministash'][$name] = $TMPL->tagdata;
    }
  }

  function get()
  {
    $name = $TMPL->fetch_param('name');
    if(isset(this->EE->session->cache['ministash'][$name]))
    {
      $this->return_data = $this->EE->session->cache['ministash'][$name];
    }
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