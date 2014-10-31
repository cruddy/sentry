<?php

namespace Kalnoy\Cruddy\Sentry;

use Cartalyst\Sentry\Sentry;
use Kalnoy\Cruddy\Entity;
use Kalnoy\Cruddy\Contracts\Permissions;

/**
 * Permissions for handling sentry users.
 *
 * The user is checked to have `entityId.action` permission, i.e. `users.update`.
 *
 * @since 1.0.0
 */
class SentryPermissions implements Permissions {

    /**
     * The sentry instance.
     *
     * @var Sentry
     */
    protected $sentry;

    /**
     * Init permissions.
     *
     * @param Sentry $sentry
     */
    public function __construct(Sentry $sentry)
    {
        $this->sentry = $sentry;
    }

    /**
     * @param string $action
     * @param Entity $entity
     *
     * @return bool
     */
    public function isPermitted($action, Entity $entity)
    {
        $key = "{$entity->getId()}.{$action}";

        return ($user = $this->sentry->getUser()) && $user->hasAccess($key);
    }
}