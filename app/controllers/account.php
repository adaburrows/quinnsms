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
        if(isset($_POST['login'])){
            $phone = $_POST['phone_number'];
            $code = $_POST['code'];
            $group = $this->Group->verify($phone, $code);
            if(db::num_results() > 0){
                $_SESSION['phone'] = $phone;
                $_SESSION['code'] = $code;
                header('Location: '. site_url('account/edit'));
            }

        }

        return array();
    }

    public function edit() {
        //print_r($_POST); die;
        $phone = $_SESSION['phone'];
        $code = $_SESSION['code'];
        $group = $this->Group->verify($phone, $code);
        if (db::num_results() === 0){
            header('Location: '. site_url('main/index'));
        }

        if(isset($_POST['update'])){
            $this->Group->set(array('id' => $group['id'], 'name' => $_POST['name']));

            foreach($_POST['user'] as $id => $name){
                $result = $this->User->set(array('id' => $id, 'name' => $name));
            }
        }

        if (isset($_POST['id'])){
            $this->User->delete($_POST['id']);
        }

        layout::addScript('jquery', site_url('js/jquery-1.5.1.min.js'));
        layout::addScript('jqueryui', site_url('js/jquery-ui-1.8.13.custom.min.js'));
        layout::addScript('edit', site_url('js/edit.js'));

        return array(
          'users' => $this->User->get_by_group_id($group['id'])
          ,'name' => $group['name']
        );
    }
}
