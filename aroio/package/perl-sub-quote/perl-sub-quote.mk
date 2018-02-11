################################################################################
#
# perl-sub-quote
#
################################################################################

PERL_SUB_QUOTE_VERSION = 2.005000
PERL_SUB_QUOTE_SOURCE = Sub-Quote-$(PERL_SUB_QUOTE_VERSION).tar.gz
PERL_SUB_QUOTE_SITE = $(BR2_CPAN_MIRROR)/authors/id/H/HA/HAARG
PERL_SUB_QUOTE_LICENSE = Artistic or GPL-1.0+
PERL_SUB_QUOTE_LICENSE_FILES = README

$(eval $(perl-package))
