<?php

/*
 * Main class
 * ----------
 * Demo of a standard dynamis controller
 * =============================================================================
 */
class main extends controller {

    /*
     * index()
     * -------
     * Main function called when no other method is specified in the route.
     *
     * All functions MUST return an array. This array contains key value pairs
     * used to populate variables in the view.
     * =========================================================================
     */
    public function index() {
        $data = array();
        $data['paragraph'] = "That you for trying out my framework. Enjoy building some awesome apps!";
        return $data;
    }
}
