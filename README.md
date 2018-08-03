## Installation
# Laravel Test Blog
This is the first attempt to write something on Laravel.

## Installation

1. This blog is tested with homestead machine. You need [Vagrant](https://www.vagrantup.com/) and [VirtualBoox](https://www.virtualbox.org). You may use other VM, but it was not tested on them.
2. Then just run `` composer install && vagrant up `` inside project directory.
3. Add ``192.168.10.10  testb.local`` to your hosts file
3. Go inside  by `` vagrant ssh `` and run ``composer install`` inside blog directory.
4. *.env* file remains standard for homestead
5. Finally run migrations ``artisan migrate``
6. Use http://testb.local to open thesite.

## Tests
Some basic tests are available:

1. Run ``phpunit`` to test how Post model works.
2. Run ``artisan dusk`` to test how Posts are displaying