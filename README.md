# Legal

<p align="center">
<a href="https://packagist.org/packages/laravel/horizon"><img src="https://poser.pugx.org/laravel/horizon/license.svg" alt="License"></a>
</p>

## Introduction
In most projects you have to link legal documents (e.g. Terms of Service and Privacy Policy).
This package integrates a legal footer and an admin section into your Laravel app.

### Benefits of this package
* Highly customizable
* Legal documents are maintainable by non developers.
* Inform your customers about important changes of legal issues.
* Let your customers reject these changes, if they are not happy with it.
* Version your legal documents.
* Edit your legal documents with a simple to use editor.
* ...

## Installation
You may use Composer to install this package into your Laravel application:
```
composer require sebbaum/laravel-legal
```

## Usage
### Configuration
There are several aspects of this package, that can be configured:
* Which legal documents should be shown in the footer.
* The names of database tables.

In order to customize the configuration you can publish and override the settings.
```
php artisan vendor:publish --tag=legal-config
```

This will publish `legal.php` into your main Laravel application: `config/legal.php`.
There you can change the following settings:
* uri - URI of this package. 
* api - URI of the API.
* tos - Show Terms Of Service (default: true).
* pripol- Show Privacy Policy (default: true).
* imprint - Show an imprint (default: true).
* documents_table - Table name of the Document model (default: documents).
* lawyers_table - Table name of the lawyers table (default: lawyers).
This table is used to store lawyers which are considered to be admins for the legal documents.
Only these lawyer Users are authorized to edit legal documents.

### Authentication
In order to protect the management UI you have to add the following in your main Laravel's `config/auth.php`
```
'guards' => [
        
        // ...

        'legal' => [
            'driver' => 'session',
            'provider' => 'lawyers'
        ]
    ],

    'providers' => [
        
        // ...

        'lawyers' => [
            'driver' => 'eloquent',
            'model' => Sebbaum\Legal\Models\Lawyer::class,
        ],
    ],
    
    // ...
```

And in your main Laravel's `app/Http/Kernel.php` file add this to your route middleware:
```
protected $routeMiddleware = [
        // ...
        
        'legal.auth' => LegalBasicAuth::class,
```

### Include the legal footer
In order to show links to your legal documents, you can include the `legal::footer` template in your own templates
(e.g. in `layouts/app.blade.php`)
```
@include('legal::footer')
```

## Translations
This package currently supports three languages:
* English
* German
* French

You can use one of the languages by setting `locale` in your `config/app.php` file or by settings the locale on 
the App facade:
```
App::setLocale($locale)
```

If you want to override the translations simply publish the translations:
```
php artisan vendor:publish --tag=legal-lang
```

You will find the language files in `resources/lang/vendor/legal` and you can override only the keys you want
to change.

## Development Integration
In order to use this package for development purpose add the following to composer.json
```
"require": {
    "php": ">=7.0.0",
    "fideloper/proxy": "~3.3",
    "laravel/framework": "5.5.*",
    "laravel/tinker": "~1.0",
    "sebbaum/legal": "*"
  },
  "repositories": [
    {
      "type":"path",
      "url":"/path/to/legal"
    }
  ],
```

### Folder structure for development
* laravel-packages/
    * laravel
    * packages
        * legal

## Security
If you discover a security vulnerability within this package, please send an e-mail to
Sebastian Baum at seb.baum@googlemail.com. All security vulnerabilities will be promptly addressed.

## Credits
* [SimpleMDE](https://www.npmjs.com/package/simplemde)
* [GrahamCampbell/Laravel-Markdown](https://github.com/GrahamCampbell/Laravel-Markdown)