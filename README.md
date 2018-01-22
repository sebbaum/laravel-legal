# Legal

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