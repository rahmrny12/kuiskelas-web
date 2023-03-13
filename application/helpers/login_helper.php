<?php

function is_logged_in() {
    $ci = &get_instance();
    return $ci->session->userdata('logged_in');
}