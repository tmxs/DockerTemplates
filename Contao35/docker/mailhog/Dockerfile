FROM mailhog/mailhog:latest

ENV MAILHOG_USER mhog
ENV MAILHOG_PWD mhogpw

ENTRYPOINT echo $MAILHOG_USER:$(MailHog bcrypt $MAILHOG_PWD) > htaccess && MailHog -auth-file=htaccess
