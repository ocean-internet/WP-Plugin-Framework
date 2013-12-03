WP-Plugin-Template
==================

(yet another) OOP Wordpress Plugin Template

Install
-------

Place the following composer.json in wp-content/mu-plugins:

    {
        "require": {
            "ocean-internet/wp-plugin-framework": "1.0.2"
        },
        "scripts": {
            "post-install-cmd": [
                "sh vendor/ocean-internet/wp-plugin-framework/scripts/install"
            ],
            "post-update-cmd":  [
                "sh vendor/ocean-internet/wp-plugin-framework/scripts/update"
            ]
        }
    }

then run:

    composer install
