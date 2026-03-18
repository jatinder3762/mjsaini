# Virtual Host Setup (WAMP)

## 1) Apache vhost entry

Add this inside your Apache vhosts file:

```apache
<VirtualHost *:80>
    ServerName mjsaini.local
    DocumentRoot "C:/wamp64/www/mjsainidotcom/backend/public"
    <Directory "C:/wamp64/www/mjsainidotcom/backend/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## 2) Hosts file entry

Add this line in your hosts file:

```text
127.0.0.1    mjsaini.local
```

## 3) Restart services

- Restart Apache from WAMP.
- Open: `http://mjsaini.local`

## 4) Laravel backend command check

From `backend/`:

```powershell
C:\wamp64\bin\php\php8.3.28\php.exe C:\composer\composer.phar install
C:\wamp64\bin\php\php8.3.28\php.exe artisan key:generate
C:\wamp64\bin\php\php8.3.28\php.exe artisan migrate
```
