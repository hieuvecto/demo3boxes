#!/usr/bin/env bash

sudo yum update 
sudo yum install -y sshpass git
sudo yum install -y ansible

cd /home/vagrant/
cp ssh/insecure_private_key /home/vagrant/.ssh/id_rsa
cp ssh/ssh_config /home/vagrant/.ssh/config
cd ansible-playbook
chmod -R og-rwx /home/vagrant/.ssh
chown -R vagrant.vagrant /home/vagrant/.ssh
