CodeZeus
========

- Prefer a Vagrant setup? [phalcon/vagrant](https://github.com/phalcon/vagrant)

###Phalcon DevTools

- Locally get: [Phalcon DevTools](https://github.com/phalcon/phalcon-devtools)
- Run in CLI:

    $ phalcon


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
<VirtualHost 127.0.0.1:82>
    ServerName codezeus
    DocumentRoot "C:\workspace\codezeus\public"
</VirtualHost>

<Directory "C:\workspace\codezeus\public">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```


---
CodeZues.com
