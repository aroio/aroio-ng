Aroio Buildroot


To initialize this buildroot:

Note: replace "/output/" with a path of your choice.

```
git clone --recurse-submodules git@github.com:unicap/aroio-ng.git
cd aroio-ng
mkdir output
cd buildroot
make BR2_EXTERNAL=../aroio O=../output/aroio aroio_defconfig
```

Build image:

```
cd ../output/aroio
make -j // -j is to use all available cou cores
```

Image is stored in:
```
output/aroio/images/sdcard.img
```


Save a new defconfig:

```
cd output/aroio
make savedefconfig
```
