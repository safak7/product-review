FROM rabbitmq:3.7-management

ENV RABBITMQ_ERLANG_COOKIE "SWQOKODSQALRPCLNMEQG"
ENV RABBITMQ_DEFAULT_USER "rabbitmq"
ENV RABBITMQ_DEFAULT_PASS "rabbitmq"
ENV RABBITMQ_DEFAULT_VHOST "/product-review"

COPY ./rabbitmq_delayed_message_exchange-20171201-3.7.x.ez /plugins

RUN rabbitmq-plugins enable rabbitmq_delayed_message_exchange