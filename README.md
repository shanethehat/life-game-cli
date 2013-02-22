Life Game CLI Interface
=======================

Simple CLI interface for my version of Conway's Life game

Installation
------------

Dependancies must be installed with composer:

    curl -s https://getcomposer.org/installer | php
    php composer.phar install

Once the dependancies are installed give the _life_ script execute permissions

    chmod +x life


Usage
-----

Run the application using the generate command. 

You must specify either a file that lays out a game grid:

    life generate --file=MyFile.txt

or a width and height so that a random grid can be used:

    life generate --width=5 --height=5
