<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'local/customregistration:register' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'guest' => CAP_ALLOW
        )
    )
);