# Vdlp.Phast

**Boost your OctoberCMS powered website load speed and rank better in search engines!**

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

## Requirements

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
