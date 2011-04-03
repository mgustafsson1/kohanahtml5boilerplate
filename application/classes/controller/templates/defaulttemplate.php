<?php defined('SYSPATH') or die('No direct script access.');
  
class Controller_Templates_Defaulttemplate extends Controller_Template{
  	
  	/*
     * The template file to use
     */
    public $template = '_templates/html5boilerplate';
    
    /*
     * Store the config
     */
    protected $config;

	/**
	* The before() method is called before your controller action.
	* In our template controller we override this method so that we can
	* set up default values. These variables are then available to our
	* controllers if they need to be modified.
	*/
	public function before(){
      
		parent::before();		
		        
  	    if ($this->auto_render){
  	    	// Initialize empty values
            $this->template->title   = '';
            $this->template->canonical = '';
            $this->template->content = '';
            $this->template->documentready = '';
            $this->template->metatags = array();
  	    	
            // Add robots index, follow to all pages
            $this->template->metatags['robots'] = 'index, follow';
            
  	    	// Set the config
            $this->config = Kohana::config('appconfig');
  	    	$this->template->gacode = $this->config->gacode;
  	    	
			// Prepare for dynamic styles and scripts
	  		$this->template->styles = array();
	  		$this->template->scripts = array();
          			
		}
  	} // End before()
        	
	/**
	* The after() method is called after your controller action.
	* In our template controller we override this method so that we can
	* make any last minute modifications to the template before anything
	* is rendered.
	*/
	public function after() {
		if ($this->auto_render){
			// Append site name to the title
			$this->template->title.= $this->config->appendtotitle;			
            
            $styles = array();
            $scripts = array();
            
			$this->template->styles = array_merge( $this->template->styles, $styles );
			$this->template->scripts = array_merge( $this->template->scripts, $scripts );
		}
		
		parent::after();
	
	} // End after()
}