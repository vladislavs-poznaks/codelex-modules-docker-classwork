FROM alpine:latest

RUN apk update && apk upgrade

RUN apk add curl

ADD script.sh .

CMD ["readme.md", "codelex-io/pro-docker"]

ENTRYPOINT ["/bin/sh", "script.sh"]
