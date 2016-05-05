FOSREST-User-OAuth-Skeleton
==========

Complete Symfony3 REST Skeleton w/ FOSRESTBundle, FOSUserBundle, FOSOAuthBundle Pre-Installed.

Installation:
================
```
git clone <RepoURL> <ProjectName>
composer install
php bin/console doctrine:database:create
php bin/console doctrine:Schema:update --force
```

Create An OAuth Client
======================
Only use the grant-type you intend to use.

```    
php bin/console acme:oauth-server:client:create --redirect-uri="http://127.0.0.1:8000/" --grant-type="authorization_code" --grant-type="password" --grant-type="refresh_token" --grant-type="token" --grant-type="client_credentials"
```

Create A User
=============
```
curl -X POST -H "Content-Type: application/json" -H "Accept: application/json" -d '{"user":{"username": "zac", "password": "1qaz", "email": "test@test.com"}}' http://127.0.0.1:8000/app_dev.php/users
```

### Get User Access & Refresh Tokens
Browse to the following URL while Rrplacing **CLIENTID**, **CLIENTSECRET**, **USERNAME**, & **PASSWORD** with your values:

```
http://127.0.0.1:8000/app_dev.php/oauth/v2/token?client_id=__CLIENTID__&client_secret=__CLIENTSECRET__&grant_type=password&username=USERNAME&password=PASSWORD 
```

### See Authorization Failure:
The following will return a access_denied error:
```
curl http://127.0.0.1:8000/app_dev.php/users
```

### See Authorization Success:
The following will return successful set of users (json).
```
curl -H "Authorization: Bearer ACCESS_TOKEN" -H "Accept: application/json" http://127.0.0.1:8000/app_dev.php/users
```

PreConfigs:
=====
To return JSON set Accept Header to *application/json*.  Will return an HTML view by default.  Does not return XML.  To return XML check the FOSRESTBundle docs and set in config.yml.



//TODO
====

- Unit Testing