################################################################################
#
# perl-class-accessor
#
################################################################################

PERL_CLASS_ACCESSOR_VERSION = 0.51
PERL_CLASS_ACCESSOR_SOURCE = Class-Accessor-$(PERL_CLASS_ACCESSOR_VERSION).tar.gz
PERL_CLASS_ACCESSOR_SITE = $(BR2_CPAN_MIRROR)/authors/id/K/KA/KASEI
PERL_CLASS_ACCESSOR_LICENSE = Artistic or GPL-1.0+
PERL_CLASS_ACCESSOR_LICENSE_FILES = README

$(eval $(perl-package))
