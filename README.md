CodeZeus
========

Apache VHost

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

Locally get: https://github.com/phalcon/phalcon-devtools
In CLI:

    $ phalcon


---

Server Has:

- PHP 5
- Git
- Python
- PIP: Fabric
- Phalcon

---
CodeZues.com
