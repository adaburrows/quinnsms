<?php

/*
 * Main class
 * ----------
 * Demo of a standard dynamis controller
 * =============================================================================
 */
class account extends controller {

    /*
     * index()
     * -------
     * Main function called when no other method is specified in the route.
     *
     * All functions MUST return an array. This array contains key value pairs
     * used to populate variables in the view.
     * =========================================================================
     */
    public function login() {
        return array();
    }

    public function edit() {
        layout::addScript('jquery', site_url('js/jquery-1.5.1.min.js'));
        layout::addScript('jqueryui', site_url('js/jquery-ui-1.8.13.custom.min.js'));
        layout::addScript('edit', site_url('js/edit.js'));
        return array();
    }
}
