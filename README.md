Aroio Buildroot


To initialize this buildroot:

Note: replace "/output/" with a path of your choice.

```
git clone --recurse-submodules git@github.com:unicap/aroio-ng.git
cd aroio-ng/buildroot
mkdir /output/
make BR2_EXTERNAL=../aroio O=/output/aroio aroio_defconfig
```

Build image:

```
cd /output/aroio
make
```

Save a new defconfig:

```
cd /output/aroio
make savedefconfig
```

## Troubleshooting:

```
Makefile.legacy:9: *** "You have legacy configuration in your .config! Please check your configuration.".  Stop.
Makefile:23: recipe for target '_all' failed
make: *** [_all] Error 2
```
->
comment out BR2_LEGACY in line 3487 in 'output/aroio/.config'
