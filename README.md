<p align="center">
	<img height="60px" width="60px" src="https://plugins.vdlp.nl/octobercms/icons/Vdlp.Phast.svg" >
	<h1 align="center">Vdlp.Redirect</h1>
</p>

<p align="center">
	<em>Boost your OctoberCMS powered website load speed and rank better in search engines!</em>
</p>

<p align="center">
	<img src="https://badgen.net/packagist/php/vdlp/oc-phast-plugin">
	<img src="https://badgen.net/packagist/license/vdlp/oc-phast-plugin">
	<img src="https://badgen.net/packagist/v/vdlp/oc-phast-plugin/latest">
	<img src="https://badgen.net/badge/cms/October%20CMS">
	<img src="https://badgen.net/badge/type/plugin">
	<img src="https://plugins.vdlp.nl/octobercms/badge/installations.php?plugin=vdlp-phast">
</p>

> **DISCLAIMER**: This is a wrapper plugin for the awesome `kiboit/phast` package. All credits go to Kibo IT for creating this.
The only thing we did is wrap it into a OctoberCMS plugin. If you have any issues with having this plugin to work, please go to the official GitHub repository: https://github.com/kiboit/phast

## Features

- Image Compression
- Asynchronous CSS and JS Loading
- Critical CSS Optimization
- Resources Request Bundling
- Leverage Browser Caching
- Optimized for Google PageSpeed

More information can be found at: https://www.phast.io/

## Configuration

* For the **Phast** engine to work you need to white-list a php file. To do so add the following lines to the `.htaccess` sections:

```
    ##
    ## White listed folders
    ##
    RewriteCond %{REQUEST_FILENAME} -f
    RewriteCond %{REQUEST_URI} !^/plugins/vdlp/phast/phast\.php*
    ...
    ...
```

```
    ##
    ## Block all PHP files, except index
    ##
    RewriteCond %{REQUEST_FILENAME} -f
    RewriteCond %{REQUEST_URI} !^/plugins/vdlp/phast/phast\.php*
    ...
    ...
```

To configure this plugin execute the following command:

```
php artisan vendor:publish --provider="Vdlp\Phast\ServiceProvider" --tag="config"
```

This will create a `config/phast.php` file in your app where you can modify the configuration.

Please check the default configuration in `vendor/kiboit/phast/src/Environment/config-default.php`.
