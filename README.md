# demo3boxes

#Create VM
vagrant up

vagrant ssh ci

cd ansible-playbook/

#Install roles
ansible-galaxy --ignore-errors install -p roles -r requirements.yml

#run provision
ansible-playbook -i hosts playbook.yml --user=vagrant --become
