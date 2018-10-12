################################################################################
#
# perl-role-tiny
#
################################################################################

PERL_ROLE_TINY_VERSION = 2.000006
PERL_ROLE_TINY_SOURCE = Role-Tiny-$(PERL_ROLE_TINY_VERSION).tar.gz
PERL_ROLE_TINY_SITE = $(BR2_CPAN_MIRROR)/authors/id/H/HA/HAARG
PERL_ROLE_TINY_LICENSE = Artistic or GPL-1.0+
PERL_ROLE_TINY_LICENSE_FILES = README

$(eval $(perl-package))
