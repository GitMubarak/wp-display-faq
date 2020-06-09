<?php
/**
 * General action, hooks loader
*/
class WFP_Loader {

	protected $wfp_actions;
	protected $wfp_filters;

	/**
	 * Class Constructor
	*/
	function __construct(){
		$this->wfp_actions = array();
		$this->wfp_filters = array();
	}

	function add_action( $hook, $component, $callback ){
		$this->wfp_actions = $this->add( $this->wfp_actions, $hook, $component, $callback );
	}

	function add_filter( $hook, $component, $callback ){
		$this->wfp_filters = $this->add( $this->wfp_filters, $hook, $component, $callback );
	}

	private function add( $hooks, $hook, $component, $callback ){
		$hooks[] = array( 'hook' => $hook, 'component' => $component, 'callback' => $callback );
		return $hooks;
	}

	public function wfp_run(){
		foreach( $this->wfp_filters as $hook ){
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
		foreach( $this->wfp_actions as $hook ){
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
	}
}
?>