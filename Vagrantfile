# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  
  # config.vm.box = "bento/centos-7.4"
  # config.vm.box_version = "201802.02.0"

  server_configs = [
    {"hostname" => "ci", "ip" => "192.168.33.20", "port" => 2250, "memory_size" => "1024", "execute_script" => true},
    {"hostname" => "web", "ip" => "192.168.33.21", "port" => 2251, "memory_size" => "1024", "execute_script" => false, "sync_web" => true},
    {"hostname" => "db", "ip" => "192.168.33.22", "port" => 2252, "memory_size" => "1024", "execute_script" => false},
  ]

  server_configs.each do |server_config|
    config.vm.define "#{server_config['hostname']}" do |server|
      server.vm.hostname = server_config['hostname']
      server.vm.box = "bento/centos-7.4"
      server.vm.box_version = "201803.24.0"
      server.vm.network :private_network, ip: server_config['ip']
      # server.vm.network :forwarded_port, guest: 22, host: server_config['port'], id: "ssh"
      server.vm.provider "virtualbox" do |v|
        v.customize ["modifyvm", :id, "--memory", server_config['memory_size']]
        # v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        # v.customize ["setextradata", :id, "VBoxInternal/Devices/VMMDev/0/Config/GetHostTimeDisabled", 0]
      end
   
      server.vm.synced_folder '.', '/vagrant', disabled: true
      if server_config['sync_web'] then
        server.vm.synced_folder './web', '/home/vagrant/web', owner: "vagrant", group: "vagrant", create: true
      end
      
      if server_config['execute_script'] then
        server.vm.synced_folder "ansible-playbook/", "/home/vagrant/ansible-playbook", owner: "vagrant", group: "vagrant", create: true
        server.vm.synced_folder "ssh/", "/home/vagrant/ssh", owner: "vagrant", group: "vagrant", create: true
        server.vm.provision :shell, path: "bootstrap.sh"
      end
      server.ssh.private_key_path = "ssh/insecure_private_key"
      server.ssh.insert_key = false
    end
  end
end
