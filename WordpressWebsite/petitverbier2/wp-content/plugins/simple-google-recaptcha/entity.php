<?php

use SimpleGoogleRecaptchaEntity as Entity;


if (!defined('ABSPATH')) {
    die();
}

/**
 * Class SimpleGoogleRecaptchaEntity
 */
class SimpleGoogleRecaptchaEntity
{
    /** @var int */
    const INT = 1;

    /** @var int */
    const STRING = 2;

    /** @var string */
    const PAGE_QUERY = '?page=sgr_options';

    /** @var string */
    const VERSION = 'sgr_version';

    /** @var string */
    const LOGIN_DISABLE = 'sgr_login_disable';

    /** @var string */
    const BADGE_HIDE = 'sgr_badge_hide';

    /** @var string */
    const SITE_KEY = 'sgr_site_key';

    /** @var string */
    const SECRET_KEY = 'sgr_secret_key';

    /** @var string */
    const HASH = 'sgr_hash';

    /** @var string */
    private $name;

    /** @var int */
    private $type;

    /** @var string|int */
    private $value;

    /**
     * @param string $name
     * @param int $type
     * @param string|int $value
     */
    public function __construct($name, $type, $value = '')
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Entity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return Entity
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int|string $value
     * @return Entity
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
