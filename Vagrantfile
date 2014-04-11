
Vagrant.configure("2") do |config|
  # Variables to Change
  project = 'normansglass'
  box_ip = '172.16.10.24'
  #box_memory = 2048
  box_memory = 1024
  # Define the top level domain (ex. .com, .org, .net)
  project_tld = '.com'
  # End Variables To Change

  # Building variables
  site_address = "dev.#{project}#{project_tld}"
  project_db = "#{project}DB"
  project_db_username = "#{project}DBA"
  project_db_password = "#{project}PASS"

  # Standard variables
  mysql_server_root_password = 'rootpass'
  mysql_server_debian_password = 'debpass'
  mysql_server_repl_password = 'replpass'
  php_memory_limit = '256M'


  # End script to post message to shell for user
  endscript = "********************************************************************************\n"
  endscript = "#{endscript}" + "********************************************************************************\n"
  endscript = "#{endscript}" + "********************************************************************************\n"
  endscript = "#{endscript}" + "Project: #{project}\n"
  endscript = "#{endscript}" + "Site Address: #{site_address}\n"
  endscript = "#{endscript}" + "Project DB: #{project_db}\n"
  endscript = "#{endscript}" + "Project DB User: #{project_db_username}\n"
  endscript = "#{endscript}" + "Project DB Pass: #{project_db_password}\n"
  endscript = "#{endscript}" + "\n"
  endscript = "#{endscript}" + "Box IP: #{box_ip}\n"
  endscript = "#{endscript}" + "Box Memory: #{box_memory}\n"
  endscript = "#{endscript}" + "PHP Memory Limit: #{php_memory_limit}\n"
  endscript = "#{endscript}" + "\n"
  endscript = "#{endscript}" + "MySql Server Root Pass: #{mysql_server_root_password}\n"
  endscript = "#{endscript}" + "MySql Server Debian Pass: #{mysql_server_debian_password}\n"
  endscript = "#{endscript}" + "MySql Server Repl Pass: #{mysql_server_repl_password}\n"
  endscript = "#{endscript}" + "\n"
  endscript = "#{endscript}" + "********************************************************************************\n"
  endscript = "#{endscript}" + "********************************************************************************\n"
  endscript = "#{endscript}" + "********************************************************************************\n"

  # Chef Omnibus Version
  config.omnibus.chef_version = :latest

  config.berkshelf.enabled = true
  # The path to the Berksfile to use with Vagrant Berkshelf
  config.berkshelf.berksfile_path = "./Berksfile"
   # An array of symbols representing groups of cookbook described in the Vagrantfile
  # to skip installing and copying to Vagrant's shelf.
  # config.berkshelf.only = []

  # An array of symbols representing groups of cookbook described in the Vagrantfile
  # to skip installing and copying to Vagrant's shelf.
  # config.berkshelf.except = []

  config.vm.box = "squeeze"
  config.vm.box_url = "https://s3.amazonaws.com/wa.milton.aws.bucket01/sqeeze.box"

  config.vm.network :private_network, ip: "#{box_ip}" #"10.33.10.16"

  config.vm.provider :virtualbox do |vb|
    vb.customize ["modifyvm", :id, "--memory", box_memory]
  end

  # Forward a port from the guest to the host, which allows for outside
  # computers to access the VM, whereas host only networking does not.
  # config.vm.network :forwared_port, guest: 80, host: 8080,
  #   auto_correct: true
  # config.vm.network :forwared_port, guest: 22, host: 2201,
  #   auto_correct: true

  #config.vm.hostname = "vdev-#{project}"

  config.vm.synced_folder ".", "/var/drupals/#{project}", :nfs => true

  config.vm.provision :chef_solo do |chef|
    chef.json = {
      :mysql => {
        :server_root_password => "#{mysql_server_root_password}",
        :server_debian_password => "#{mysql_server_debian_password}",
        :server_repl_password => '#{mysql_server_repl_password}'
      },
      :apache => {
        :prefork => {
          :startservers => 5,
          :minspareservers => 5,
          :maxspareservers => 5,
          :serverlimit => 10,
          :maxclients => 10
        }
      },
      :postfix => {
        :main => {
          :mydomain => "example.com"
        }
      },
      :drupal => {
        :sites => {
          "#{site_address}" => {
            :owner => "vagrant",
            :group => "www-data",
            :root => "/var/drupals/#{project}",
            :doc_root => "www",
            :db => "#{project_db}",
            :db_username => "#{project_db_username}",
            :db_password => "#{project_db_password}",
            :db_init => true
          }
        }
      },
      :promet_php => {
          :memory_limit => "#{php_memory_limit}",
      },
      :solr =>{
          :core_name => "#{project}"
      }
    }
    chef.add_recipe "apt"
    chef.add_recipe "solo-helper"
    chef.add_recipe "drupal::default"
    chef.add_recipe "drupal::node_sites"
    chef.add_recipe "drupal::drush"
    # chef.add_recipe "oci8-instantclient-cookbook::zip"
    # chef.add_recipe "oci8-instantclient-cookbook::libaio"
    # chef.add_recipe "oci8-instantclient-cookbook::default"
    # chef.add_recipe "oci8-instantclient-cookbook::module_oci8"
    # chef.add_recipe "oci8-instantclient-cookbook::phpinfo"
    chef.add_recipe "tomcat-solr"
    # chef.add_recipe "ah-vpn"
    chef.add_recipe "promet_php::apache2"
    # chef.add_recipe "promet_php::module_apc"
    chef.add_recipe "phpsysinfo::default"
  end
  config.vm.provision "shell", inline: "printf '#{endscript}'"
end
