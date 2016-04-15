FOSREST-User-OAuth-Skeleton
========

Complete Symfony3 REST Skeleton w/ FOSRESTBundle, FOSUserBundle, FOSOAuthBundle Pre-Installed.

Simple Install:

git clone \<RepoURL> \<ProjectName>

composer install <br/>
php bin/console doctrine:database:create<br/>
php bin/console doctrine:Schema:update --force

PreConfigs:
=====
To return JSON set Accept Header to application/json.  Will return an HTML view by default.  Does not return XML.  To return XML check the FOSRESTBundle docs and set in config.yml.


//TODO
====
<ul>
<li>Unit Testing</li>
<li>Refactor registration controller to use FOSUserBundle Service - UserManager::updateUser()</li>
<li>Update User Entity to return Unique Value Exception for problem property.</li>
</ul>





