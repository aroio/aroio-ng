################################################################################
#
# python-gobject
#
################################################################################

PYTHON_GOBJECT_VERSION_MAJOR = 3.36
PYTHON_GOBJECT_VERSION = $(PYTHON_GOBJECT_VERSION_MAJOR).0
PYTHON_GOBJECT_SOURCE = pygobject-$(PYTHON_GOBJECT_VERSION).tar.xz
PYTHON_GOBJECT_SITE = http://ftp.gnome.org/pub/gnome/sources/pygobject/$(PYTHON_GOBJECT_VERSION_MAJOR)
PYTHON_GOBJECT_LICENSE = LGPL-2.1+
PYTHON_GOBJECT_LICENSE_FILES = COPYING
PYTHON_GOBJECT_DEPENDENCIES = python3 host-python3 host-pkgconf libglib2 gobject-introspection
PYTHON_GOBJECT_CONF_OPTS = -Dpycairo=false -Dtests=false
# for 0001-add-PYTHON_INCLUDES-override.patch
PYTHON_GOBJECT_AUTORECONF = YES

PYTHON_GOBJECT_CONF_ENV = \
	PYTHON=$(HOST_DIR)/bin/python3 \
	PYTHON_INCLUDES="`$(STAGING_DIR)/usr/bin/python3-config --includes`" \
	_PYTHON_SYSCONFIGDATA_NAME=$(PKG_PYTHON_SYSCONFIGDATA_NAME) \
	PYTHONPATH=$(PYTHON3_PATH)

ifeq ($(BR2_PACKAGE_LIBFFI),y)
PYTHON_GOBJECT_CONF_OPTS += -Dffi=true
PYTHON_GOBJECT_DEPENDENCIES += libffi
else
PYTHON_GOBJECT_CONF_OPTS += -Dffi=false
endif

$(eval $(meson-package))