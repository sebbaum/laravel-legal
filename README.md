# Legal

## Usage
### Include the legal footer
In order to show links to your legal documents, you can include the `legal::footer` template in your own templates
(e.g. in `layouts/app.blade.php`)
```
@include('legal::footer')
```

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