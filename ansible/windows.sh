#!/usr/bin/env bash

# Add Ansible Repository & Install Ansible
sudo apt-get install -y python-software-properties
sudo add-apt-repository -y ppa:ansible/ansible
#sudo apt-get update
sudo apt-get install -y ansible

# Setup Ansible for Local Use and Run
cp /vagrant/ansible/inventories/dev /etc/ansible/hosts -f
chmod 666 /etc/ansible/hosts

cat /vagrant/ansible/files/id_rsa >> /home/vagrant/.ssh/id_rsa
ansible-playbook /vagrant/ansible/playbook.yml  -c local -i /etc/ansible/hosts
