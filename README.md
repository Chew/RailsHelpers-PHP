# RailsHelpers for PHP

A collection of Rails-esque helper functions for use in your PHP project.

This project will attempt to bring over some useful helper methods from Rails (specifically ActionView)

## Installing

In your `composer.json`, add this:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/Chew/RailsHelpers-PHP.git"
    }
  ]
}
```

Then add the dependency:

```json
{
  "require": {
    "chew/rails-helpers": "dev-main"
  }
}
```

Finally, `composer update` (or `composer update chew/rails-helpers`)