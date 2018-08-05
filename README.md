## Installation
# Laravel Test Blog
This is the first attempt to write something on Laravel.

## Installation

1. This blog is tested with homestead machine. You need [Vagrant](https://www.vagrantup.com/) and [VirtualBoox](https://www.virtualbox.org). You may use other VM, but it was not tested on them.
2. configure your hometstead.yaml:
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
3. Then just run `` composer install && vagrant up `` inside project directory.
4. Add ``192.168.10.10  testb.local`` to your hosts file
5. Go inside  by `` vagrant ssh `` and run ``composer install`` inside blog directory.
6. *.env* file remains standard for homestead
7. Finally run migrations ``artisan migrate``
8. Use http://testb.local to open thesite.

## Tests
Some basic tests are available:

1. Run ``phpunit`` to test how Post model works.
2. Run ``artisan dusk`` to test how Posts are displaying