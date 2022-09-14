# Usage in conjunction with the product register api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ikoncept/product-manager-adapter.svg)](https://packagist.org/packages/ikoncept/product-manager-adapter)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ikoncept/product-manager-adapter/run-tests?label=tests)](https://github.com/ikoncept/product-manager-adapter/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ikoncept/product-manager-adapter/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/ikoncept/product-manager-adapter/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)

## Installation

You can install the package via composer:

```bash
composer require ikoncept/product-manager-adapter
```


```bash
php artisan vendor:publish --tag="product-manager-adapter-config"
```

This is the contents of the published config file:

```php
return [
    'api_key' => env('PRODUCT_MANAGER_ADAPTER_KEY'),
    'endpoint' => env('PRODUCT_MANAGER_ADAPTER_ENDPOINT', 'https://products.malmsten.com')
];
```


## Usage

```php
$productManagerAdapter = new Ikoncept\ProductManagerAdapter();
echo $productManagerAdapter->echoPhrase('Hello, Ikoncept!');
```

## Testing

```bash
composer test
```

