################################################################################
#
# perl-exporter-tiny
#
################################################################################

PERL_EXPORTER_TINY_VERSION = 1.000000
PERL_EXPORTER_TINY_SOURCE = Exporter-Tiny-$(PERL_EXPORTER_TINY_VERSION).tar.gz
PERL_EXPORTER_TINY_SITE = $(BR2_CPAN_MIRROR)/authors/id/T/TO/TOBYINK
PERL_EXPORTER_TINY_LICENSE = Artistic or GPL-1.0+
PERL_EXPORTER_TINY_LICENSE_FILES = COPYRIGHT LICENSE

$(eval $(perl-package))
$(eval $(host-perl-package))
