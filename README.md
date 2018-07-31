## Installation

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