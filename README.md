# Ellestmanuelle

Website i build for a friend.
I try to experiment MVC, routing and 'CMS' in php and i'm pretty satisfied with this home made version ;)

## Build instructions

You need composer (https://getcomposer.org/download/) to get dependancies

To install package

`composer install`

Then you could run on any PHP Server, i love this extension for VScode : https://marketplace.visualstudio.com/items?itemName=brapifra.phpserver

## Deploy instructions

If you want to deploy this on production, its better to secure access to admin folder (I do this with apache AuthType Basic)

Here is my apache conf 

```
<VirtualHost *:80>
        ServerAdmin contact@ellestmanuelle.fr
        DocumentRoot /var/www/ellestmanuelle
        ServerName www.ellestmanuelle.fr
        ServerAlias ellestmanuelle.fr

        RewriteEngine On

        #First rewrite any request to the wrong domain to use the correct one (here www.)
        RewriteCond %{HTTP_HOST} !^www\.
        RewriteRule ^(.*)$ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

        #Now, rewrite to HTTPS:
        RewriteCond %{HTTPS} off
        RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

        FallbackResource /index.php

        <Directory "/var/www/ellestmanuelle/admin">
                AuthType Basic
                AuthName "Restricted Content"
                AuthUserFile /etc/apache2/.htpasswd
                Require valid-user
        </Directory>
</VirtualHost>
```