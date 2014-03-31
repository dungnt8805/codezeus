CodeZeus
========

This setup allows you to have multiple phalcon projects in one Vagrant Box.
I suggest calling it **Playground** :)

- Prefer a Vagrant setup? [phalcon/vagrant](https://github.com/phalcon/vagrant)

###Phalcon DevTools

- Locally get: [Phalcon DevTools](https://github.com/phalcon/phalcon-devtools)
- Run in CLI: `$ phalcon`


---

###Current Server Has:

- PHP 5
- Apache2
- Composer
- Git
- Python
- PIP: Fabric
- Phalcon
- Phalcon Dev Tools

---

###WAMP/XAMPP/MAMP

- Just change your paths
- Mod Rewrite ON
- Phalcon Extension Installed

```
<VirtualHost 127.0.0.1>
    ServerName codezeus
    DocumentRoot "/vagrant/www/codezeus/public
    ServerPath /codezeus
</VirtualHost>

<Directory "/vagrant/www/codezeus/public">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

###Check your BaseURI
When you access http://playground/codezeus/ if things don't look right, check
your baseURI.

---
CodeZues.com
