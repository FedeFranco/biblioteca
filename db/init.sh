#!/bin/sh

sudo -u postgres dropuser biblioteca
sudo -u postgres dropdb biblioteca
sudo -u postgres psql -c "create user biblioteca password 'biblioteca' superuser;"
sudo -u postgres createdb -O biblioteca biblioteca
