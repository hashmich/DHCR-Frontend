FROM chialab/php:7.2-apache

ARG CI_COMMIT_REF_SLUG

ENV HTTPDUSER=www-data \
    WEBROOT=/var/www/html \
    CI_COMMIT_REF_SLUG=${CI_COMMIT_REF_SLUG}

RUN apt-get update && apt-get install -y vim curl nano links git 

COPY --chown=${HTTPDUSER}:${HTTPDUSER} . ${WEBROOT}
COPY .${CI_COMMIT_REF_SLUG}.env /etc/profile.d/${CI_COMMIT_REF_SLUG}.env.sh

WORKDIR /var/www/html

RUN /bin/bash -c "source .${CI_COMMIT_REF_SLUG}.env" && \
    chmod +x /etc/profile.d/${CI_COMMIT_REF_SLUG}.env.sh && \
    git submodule sync --recursive && \
    git submodule update --init --recursive && \
    mkdir tmp logs && \
    chown -R ${HTTPDUSER}:${HTTPDUSER} ${WEBROOT} && \
    php composer.phar update && \
    cp ${WEBROOT}/composer.phar ${WEBROOT}/api/v1 && cd ${WEBROOT}/api/v1 && php composer.phar update && \
    cp ${WEBROOT}/composer.phar ${WEBROOT}/ops/app && cd ${WEBROOT}/ops/app && php composer.phar update && \
    cd ${WEBROOT} && \
    chown -R ${HTTPDUSER}:${HTTPDUSER} ${WEBROOT}

CMD [ "/bin/bash", "-c", "source ", ".${CI_COMMIT_REF_SLUG}.env"]
