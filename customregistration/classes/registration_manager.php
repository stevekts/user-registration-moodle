<?php
namespace local_customregistration;

defined('MOODLE_INTERNAL') || die();

class registration_manager {

    public static function create_user($data) {
        // Generate temporary password & hash it

        // Insert user into database
        
        // Set the force password change preference

        // Store temporary password verification record

        // Send email with credentials

        
        return mt_rand(1, 100);// Just return a random numberthat imitates new user id
    }
}
