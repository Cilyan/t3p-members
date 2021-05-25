<p align="center"><img src="public/svg/trail3pics-logo-2020.svg"></p>

## About T3P Members

This website is designed to manage the members of the Trail des 3 Pics. By
members, we mean for the moment all the volunteered helpers. It was planned
to also register participants, so basic scaffolding was layed out to support
this, but decision was made to halt this part of the application until further
notice.

The website runs on PHP 7 starting from 7.3 and up, or PHP 8. It uses the
[Laravel Framework](https://laravel.com/), so you will need to get familiar
with this framework if you are not already.

Theme is derived from
[SB Admin 2](https://startbootstrap.com/theme/sb-admin-2).
## Setting up the development environment

<ol>
<li>Clone this repository.</li>

<li>

Install the development tools

- [PHP](https://www.php.net/) version 7.3+ or 8.0+
- [Yarn](https://yarnpkg.com/)
- [Vagrant](https://www.vagrantup.com/)

</li>

<li>

Install [Composer](https://getcomposer.org):

```
curl -L -o composer-setup.php https://getcomposer.org/installer
php composer-setup.php --install-dir=vendor/bin --filename=composer
```

You may choose to use your distribution's package for Composer. In this case, it will probably be installed in `/usr/bin/composer`, so use this
path in the next step instead of `vendor/bin/composer`.
</li>

<li>

Setup the projet's dependencies:

```
php vendor/bin/composer install
php vendor/bin/homestead make
yarn install
```
</li>

<li>

Edit `Homestead.yaml`. Change the `sites` configuration to customize the
hostname.

```yaml
sites:
    -
        map: <hostname, e.g. test.example.org>
        to: /home/vagrant/code/public
    -
        map: phpmyadmin.example.org
        to: /usr/share/phpmyadmin
```

Note that `.test` and `.local` TLDs are not accepted as valid domains for some
OAuth APIs like Google's, so you will not be able to test OAuth with such
a domain. That's why you should use a "real-like" domain and then use you
system's `hosts` file to bypass the normal name resolution and point to the
virtual machine instead. See
[Homestead documentation](https://laravel.com/docs/8.x/homestead#hostname-resolution).

Linux users may check
[libnss-homehosts](https://github.com/bAndie91/libnss_homehosts) as a way not
to pollute the system's `/etc/hosts` too much.

The `phpmyadmin.example.org` part is optional.
</li>

<li>

Copy `.env.example` to `.env` and edit it

- Edit `APP_URL=` to match the host name in `Homestead.yaml`
- To use OAuth, you will need to set `GOOGLE_CLIENT_*`, `FACEBOOK_CLIENT_*` 
  and/or `MICROSOFT_CLIENT_*` variables. See later how to setup OAuth.

</li>

<li>

Setup the application key

```
php artisan key:generate
```
</li>

<li>

*(Optional)* Update the frontend

```
yarn run production
```
</li>

<li>

Start the development environment

```
vagrant up
```
</li>

<li>

Bootstrap the database

### Method 1

If you want a copy of the official website to work on, export the official
database to an SQL file. Then, point your browser to `phpmyadmin.example.org` (or
the hostname you configured for phpMyAdmin if you changed it) and log
using the usual Homestead's credentials (`homestead`/`secret`). Import the
entire SQL file.

### Method 2

Log into the Vagrant machine and run the database migration to prepare all
tables.

```
vagrant ssh
cd code
php artisan migrate:fresh
```

Point your browser to your application's URL (`https://test.example.org`) and
register a new user, as any other user would do. (Default configuration uses
Mailhog to catch emails. So check http://localhost:8025/ instead of your usual
email address for email validation.)

Start a MySQL client from inside the Vagrant machine (default password is
`secret`)

```
mysql -u homestead -p homestead
```

and issue the SQL statement

```sql
UPDATE `mbrs_users` SET `is_admin` = 1 WHERE `id` = 1;
```

so that this new user is now administrator of the website.

</li>

</ol>

## General Organization

The main object is a `User`, which has a unique email address (as well as a
unique ID for simplicity). It represents an entity that can log into the
website and undertake operations.

Each `User` has 0, 1 or more `SocialLogin` instance attached to it. This
stores the necessary information for a user to log to the website using an
external OAuth provider. If the user has 0 `SocialLogin`, it can only log
using its email and password. On the contrary, a user may link its account
to several OAuth providers. The email address is used to match a user to its
providers.

Each `User` has 0, 1 or more `Profile`s. Each profile represent a physical
individual that can participate to the trail (currently as helper, but it was
designed to be able to represent participants too). A single user can register
different profiles so that for example you can register an entire family with
a single login account, or you can also register individuals that do not have
easy access to the Internet. It was also designed such that when participants
register to a relay trail, one person can register its entire team with a
single login.

An `Edition` is the entity that represents a single happening of a trail event.
Usually, there is one per year.

A `Profile` can become an helper for a specific `Edition` through the `Helper`
entity. As such, a `Profile` may have 0 or 1 `Helper` instance per `Edition`
instance.

Additionally, `PasswordReset` and `Session` entities are created and managed
internally by Laravel for the needs of the framework.

## Copyrights and Licenses

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

SB Admin 2 is copyright 2013-2021 Start Bootstrap LLC. Code released under the [MIT license](https://opensource.org/licenses/MIT).

The Trail des 3 Pics logo is copyright Association Les Trois Pics. All
rights reserved.
