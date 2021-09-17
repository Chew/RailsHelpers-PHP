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

## Using

Once installed, the functions are global, so reference them as you would Rails.

Ruby:
```ruby
link_to "Rory!", "https://rory.cat"
```

PHP:
```php
link_to("Rory!", "https://rory.cat")
```

## Named Arguments?

PHP 8.0 introduced Named Arguments, which seem a lot like Ruby:

```php
function my_func(string $name, string $data = null, string $extra = []) {
    // fanciness
}

my_func("Hello!", data: "Interesting", extra: ["woah"]);
```

Unfortunately, unlike Ruby, we could not utilize this in a dynamic variadic way:

```php
function my_tag(string $name, string $body = null, array $options = [], ...$variadic) {
    // tag code here!
}

my_tag("span", "Woah there", id: "Calm down!");
```

While PHP would let us run this, we are unable to utilize the extra objects. In fact, their values don't even show up.

The closest we can get is using the $options as an array, as such:

```php
tag("span", "Woah there!", ["id" => "Calm down!"]);
```
results in
```html
<span id="Calm down!">Woah there!</span>
```
whereas Ruby would look like:
```ruby
tag.span, "Woah there", id: "Calm down!"
```

Unfortunately, it makes the PHP code longer than its HTML counterpart, but this is currently unavoidable.