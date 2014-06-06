myTaste Recipe Game
===================

myTaste Recipe Game


Console
-------
Showing a list of available commands:

> $ php bin/console


Vagrant
-------
To start the virtual machine:

> $ vagrant up

Sometimes it could be possible to happen an error: "SQLSTATE[HY000] [2002] Connection refused Error".
Then restart the VM in order to flush mysql privileges.

Edit your /et/hosts and add:

> 192.168.56.101 recipe-game.dev www.recipe-game.dev

Then you could access to the web on your browser:

> [http://recipe-game.dev](http://recipe-game.dev)


Doctrine
--------
It's interesting to validate if the mappings are sync with database to run, for example with stage database:

> $ php bin/console orm:validate-schema -- env stage

You could also generate the classes with the current mapping from database and to compare with your implementation on src/Tnt/Entity:

> $ php bin/console orm:convert-mapping --from-database --env stage annotation var/cache/doctrine/generated_entities --force


To see the changes in schema comparing to stage database:

> $ php bin/console orm:schema-tool:update --env stage --dump-sql
