# Custom User Registration Plugin for Moodle

## Overview
Note: This is not a complete plugin, it needs proper implementation of registration_manager class. Steps that I would have followed are included in the create_user method. 

## Installation
1. Copy the `customregistration` folder to `/local/` directory in your Moodle installation
2. Navigate to Site Administration → Notifications
3. Click "Upgrade Moodle database now"

## Usage
Direct users to: `https://yourmoodle.site/local/customregistration/register.php`

## Requirements
- Moodle 4.0 or higher
- PHP 7.4 or higher
- Properly configured email settings in Moodle
