<?php
namespace local_customregistration;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class registration_form extends \moodleform {

    public function definition() {
        $mform = $this->_form;

        $mform->addElement('header', 'registrationheader', 
            get_string('registrationtitle', 'local_customregistration'));

        // Email
        $mform->addElement('text', 'email', 
            get_string('email', 'local_customregistration'), 
            array('size' => '50'));
        $mform->setType('email', PARAM_EMAIL);
        $mform->addRule('email', get_string('required'), 'required', null, 'client');
        $mform->addRule('email', get_string('invalidemail', 'local_customregistration'), 
            'email', null, 'client');

        // First name
        $mform->addElement('text', 'firstname', 
            get_string('firstname', 'local_customregistration'), 
            array('size' => '50'));
        $mform->setType('firstname', PARAM_TEXT);
        $mform->addRule('firstname', get_string('required'), 'required', null, 'client');

        // Last name
        $mform->addElement('text', 'lastname', 
            get_string('lastname', 'local_customregistration'), 
            array('size' => '50'));
        $mform->setType('lastname', PARAM_TEXT);
        $mform->addRule('lastname', get_string('required'), 'required', null, 'client');

        // Country
        $countries = get_string_manager()->get_list_of_countries();
        $mform->addElement('select', 'country', 
            get_string('country', 'local_customregistration'), 
            $countries);
        $mform->addRule('country', get_string('required'), 'required', null, 'client');

        // Mobile
        $mform->addElement('text', 'mobile', 
            get_string('mobile', 'local_customregistration'), 
            array('size' => '20'));
        $mform->setType('mobile', PARAM_TEXT);
        $mform->addRule('mobile', get_string('required'), 'required', null, 'client');
        $mform->addRule('mobile', get_string('invalidmobile', 'local_customregistration'), 
            'regex', '/^[0-9+\-\s()]+$/', 'client');

        $this->add_action_buttons(false, get_string('register', 'local_customregistration'));
    }

    public function validation($data, $files) {
        global $DB;
        $errors = parent::validation($data, $files);

        // Check existing email
        if ($DB->record_exists('user', array('username' => $data['email'])) || 
            $DB->record_exists('user', array('email' => $data['email']))) {
            $errors['email'] = get_string('emailexists', 'local_customregistration');
        }

        return $errors;
    }
}