WP-Plugin-Template
==================

(yet another) OOP Wordpress Plugin Template

Install
-------

Place the following composer.json in wp-content/mu-plugins:

    {
        "require": {
            "ocean-internet/wp-plugin-framework": "1.0.*"
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
    
To Create a Plugin
---------------

copy vendor/ocean-internet/wp-plugin-framework/plugin-template:

    cp -r mu-plugins/vendor/ocean-internet/wp-plugin-framework/plugin-template plugins/new-plugin-name

enter the folder and edit settings.cfg:

    cd plugins/new-plugin-name && nano settings.cfg

make the install script executable:

    chmod +x install
 
run the install script:

    ./install
    
License
-------

Copyright (C) 2013 Andy Weir

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
