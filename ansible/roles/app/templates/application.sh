#!/usr/bin/env bash

#/etc/profile.d/app.sh
sudo mkdir /dev/shm/{{ application_name }}/cache -m 0777 -p
sudo mkdir /dev/shm/{{ application_name }}/logs -m 0777 -p
sudo chmod -R 0777 /dev/shm/{{ application_name }}/logs
sudo chmod -R 0777 /dev/shm/{{ application_name }}/cache
SYMFONY_ASSETS_INSTALL="hard"; export SYMFONY_ASSETS_INSTALL
