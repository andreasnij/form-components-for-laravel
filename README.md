# Form components for Laravel

Blade form components for Laravel. 

This package is currently in a pre-release stage so use at your own risk. Things might change.

## Installation
Add the package as a requirement to your `composer.json`:
```bash
$ composer require andreasnij/form-components-for-laravel
```

## Usage
```php
<x-form method="PATCH" action="{{ route('products.update', $product) }}" :model="$product">
    
    <x-input label="Name" name="name" />
    
    <button type="submit">Save</button>
    
</x-form>
```

## Author
Andreas Nilsson (<https://github.com/andreasnij>)

## License
This software is licensed under the MIT License - see the [LICENSE](LICENSE.md) file for details.
