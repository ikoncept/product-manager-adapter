# Product manager adapter

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


### Routes
This package comes with a couple of different controller methods to make interacting with the products api easier.

> Note
> You need to register the routes yourself

#### Recommended public routes

```php

// Get a tree node by ID. Usually when retrieving navigation on the front end
Route::get('/tree-nodes/{id}', [TreeNodeController::class, 'show']);

// Get a tree node via slug, usefull when retrieving a tree node from an url parameter
Route::get('/tree-nodes/{slug}/slug', [TreeNodeSlugsController::class, 'show']);

// Get a product with a specific SKU
Route::get('/products/{sku}', [ProductController::class, 'show']);
```

#### Recommended private routes

```php
// Get a list of all available product trees
Route::get('/product-trees', [ProductTreeController::class, 'index']);

// Get a tree representation of a specific node
Route::get('/node-trees/{id}', [NodeTreeController::class, 'index']);
```

### Specifying language
The product api has support for multiple languages. The required language is set via the `X-LOCALE` header. See below example
```javascript
const payload = {
    params: {
        include: 'content',
    },
    headers: {
        'X-LOCALE': this.$i18n.locale,
    },
}
const { data } = await this.$axios.get('/api/products', payload)
```

### Filter out products for the active product tree
To prevent products from other trees to be included in various api calls the `X-PRODUCT-TREES` header can be used:

```javascript
const payload = {
    params: {
        include: 'content',
    },
    headers: {
        'X-PRODUCT-TREES':  3
    },
}
const { data } = await this.$axios.get('/api/products', payload)
```

#### Complete example using the search filter:
```javascript
const payload = {
    params: {
        include: 'content',
        number: 10,
        'filter[nodeIds]': this.nodeRootIds.join(','),
        'filter[search]': this.searchQuery,
    },
    headers: {
        'X-LOCALE': this.$i18n.locale,
        'X-PRODUCT-TREES': this.$store.getters['nav/productTreeRootIds'].join(',')
    },
}
const { data } = await this.$axios.get('/api/products', payload)
```


## Testing

```bash
composer test
```

