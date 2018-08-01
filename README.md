## Installation
# Laravel Test Blog
This is the first attempt to write something on Laravel.

## Installation

1. This blog is tested with homestead machine. You need [Vagrant](https://www.vagrantup.com/) and [VirtualBoox](https://www.virtualbox.org). You may use other VM, but it was not tested on them.
2. Then just run `` vagrant up `` inside project directory.
3. Go inside  by `` vagrant ssh `` and run ``composer install`` inside blog directory.
4. *.env* file remains standard for homestead
5. Finally run migrations ``artisan migrate``
**Homestead.yaml** 
````
ip: 192.168.10.10
memory: 2048
cpus: 1
provider: virtualbox
authorize: ~/.ssh/id_rsa.pub
keys:
    - ~/.ssh/id_rsa
folders:
    -
        map: /home/dekar/projects/test_blog
        to: /home/vagrant/code
sites:
    -
        map: testb.local
        to: /home/vagrant/code/blog/public
databases:
    - homestead
name: test-blog
hostname: test-blog
mongodb: true

````