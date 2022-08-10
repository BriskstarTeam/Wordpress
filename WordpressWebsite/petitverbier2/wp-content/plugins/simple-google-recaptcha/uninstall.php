<?php

use SimpleGoogleRecaptchaEntity as Entity;


if (!defined('WP_UNINSTALL_PLUGIN')) {
    die('Direct access not allowed');
}

include sprintf('%s/entity.php', dirname(__FILE__));

/**
 * Class SimpleGoogleRecaptchaUninstall
 */
class SimpleGoogleRecaptchaUninstall
{
    /** @var string */
    const OPTIONS_PREFIX = 'sgr_';

    public function __construct()
    {
        $constants = (new ReflectionClass(Entity::class))->getConstants();

        foreach ($constants as $constant) {
            if (substr($constant, 0, strlen(self::OPTIONS_PREFIX)) === self::OPTIONS_PREFIX) {
                delete_option($constant);

            }
        }
    }
}

new SimpleGoogleRecaptchaUninstall();
