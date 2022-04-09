FROM alpine:latest

RUN apk update && apk upgrade

RUN apk add bash

RUN apk add git

ENTRYPOINT ["/bin/bash", "-c", "git --version && tail -f /dev/null"]
