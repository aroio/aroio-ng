################################################################################
#
# perl-io-interface
#
################################################################################

PERL_IO_INTERFACE_VERSION = 1.09
PERL_IO_INTERFACE_SOURCE = IO-Interface-$(PERL_IO_INTERFACE_VERSION).tar.gz
PERL_IO_INTERFACE_SITE = $(BR2_CPAN_MIRROR)/authors/id/L/LD/LDS
PERL_IO_INTERFACE_DEPENDENCIES = host-perl-module-build
PERL_IO_INTERFACE_LICENSE = Artistic or GPL-1.0+
PERL_IO_INTERFACE_LICENSE_FILES = LICENSE

$(eval $(perl-package))
