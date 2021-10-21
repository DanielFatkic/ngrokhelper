//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class ngrokhelper_hook_request extends _HOOK_CLASS_
{

  
  	public function url()
	{
		if ( $this->_url === NULL )
		{
            // let's change the header to use HTTP_X_ORIGINAL_HOST ( which is set by  ngrok )
			if ( isset( $_SERVER['HTTP_X_ORIGINAL_HOST'] ) AND !isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) )
			{
                $_SERVER['HTTP_X_FORWARDED_HOST'] = $_SERVER['HTTP_X_ORIGINAL_HOST'];
			}
		}
		return parent::url();
	}

}
