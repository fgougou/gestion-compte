#May the magic be!

## Prérequis

* PHP (version 7+)
* [Composer](https://getcomposer.org/)
* Mysql (ou mariadb)
* php-mysql (ou php-pdo_mysql)
* php-xml
* php-gd

## Installation

Clone code
<pre>git clone https://github.com/elefan-grenoble/gestion-compte.git</pre>
<pre>cd gestion-compte</pre>
Lancer la configuration
<pre>composer install</pre>
Creer la base de donnée
<pre>php bin/console doctrine:database:create</pre>
Migrer : creation du schema
<pre>php bin/console doctrine:migration:migrate</pre>
Installer les medias
<pre>php bin/console assetic:dump</pre>
Lancer le serveur (si pas de serveur web)
<pre>php bin/console server:start</pre>
add ``127.0.0.1 membres.yourcoop.local`` to your _/etc/hosts_ file
visit [http://membres.yourcoop.local/user/install_admin](http://membres.yourcoop.local/user/install_admin) to create the super admin user (admin:password are default values)


### En Prod
Avec nginx, ligne necessaire pour avoir les images dynamiques de qr et barecode (au lieu de 404) 
<pre>location ~* ^/sw/(.*)/(qr|br)\.png$ {
		rewrite ^/sw/(.*)/(qr|br)\.png$ /app.php/sw/$1/$2.png last;
	}
</pre>


## <a name="crontab"></a>crontab

<pre>
#generate shifts in 27 days (same weekday as yesterday)
55 5 * * * php YOUR_INSTALL_DIR_ABSOLUTE_PATH/bin/console app:shift:generate $(date -d "+27 days" +\%Y-\%m-\%d)
#free pre-booked shifts
55 5 * * * php YOUR_INSTALL_DIR_ABSOLUT_PATH/bin/console app:shift:free $(date -d "+21 days" +\%Y-\%m-\%d)
#send reminder 2 days before shift
0 6 * * * php YOUR_INSTALL_DIR_ABSOLUT_PATH/bin/console app:shift:reminder $(date -d "+2 days" +\%Y-\%m-\%d)
#execute routine for cycle_end/cycle_start, everyday
5 6 * * * php YOUR_INSTALL_DIR_ABSOLUT_PATH/bin/console app:user:cycle_start
#send alert on shifts booking (low)
0 10 * * * php YOUR_INSTALL_DIR_ABSOLUT_PATH/bin/console app:shift:send_alerts $(date -d "+2 days" +\%Y-\%m-\%d) 1
#send a reminder mail to the user who generate the last code but did not validate the change.
45 21 * * * php YOUR_INSTALL_DIR_ABSOLUT_PATH/bin/console app:code:verify_change --last_run 24
</pre>

## mise en route

* Suivez le [guide de mise en route](start.md)
