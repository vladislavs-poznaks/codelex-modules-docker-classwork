FROM alpine:latest

RUN apk add imagemagick

RUN mkdir images

ADD script.sh .

CMD ["docker.jpg", "-flip"]

ENTRYPOINT ["/bin/sh", "script.sh"]
