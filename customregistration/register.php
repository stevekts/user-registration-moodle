<?php
require_once('../../config.php');
require_once($CFG->dirroot . '/local/customregistration/classes/registration_form.php');

$PAGE->set_url(new moodle_url('/local/customregistration/register.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('registrationtitle', 'local_customregistration'));
$PAGE->set_heading(get_string('registrationtitle', 'local_customregistration'));

// No need to display the form if user is logged in
if (isloggedin() && !isguestuser()) {
    redirect(new moodle_url('/'));
}

$mform = new \local_customregistration\registration_form();

echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
