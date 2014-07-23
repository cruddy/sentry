If your application uses [Sentry](http://github.com/cartalyst/sentry) for authentication,
you can it's power to control which entities the user can have access to.

Each entity has following actions that can be performed: view, create, update, delete.
A user needs to have `{entity}.{action}` permission to perform an action on specified
entity. For example, in order to be able to view items of `products` entity, authenticated
user needs to have `products.view` permission.

## Installation

Install the package using a Composer:

```
composer require cruddy/sentry:dev-master@dev
```

Add a service provider:

```php
'Kalnoy\Cruddy\Sentry\SentryServiceProvider',
```

Set the permissions driver in Cruddy's configuration:

```php
'permissions' => 'sentry',
```