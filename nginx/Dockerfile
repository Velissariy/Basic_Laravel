FROM nginx:latest

COPY ./hosts/mysite.local.conf /etc/nginx/conf.d/mysite.local.conf

WORKDIR /code

VOLUME /code

EXPOSE 8000

CMD ["nginx", "-g", "daemon off;"]