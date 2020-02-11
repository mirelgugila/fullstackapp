FROM node:13.2.0-alpine3.10 as base
WORKDIR /app
RUN apk add --no-cache tini
COPY front/package*.json ./
RUN npm install --silent \
    && npm cache clean --force

#DEV STAGE
FROM base as dev
ENV NODE_ENV=development
ENTRYPOINT [ "tini", "--" ]
CMD ["npm", "start"]

# #PROD STAGE
# FROM base as prod
# ENV NODE_ENV=production
# COPY . .
# RUN ["node", "scripts/build"]

# #NGINX STAGE
# FROM nginx:1.17.6-alpine as nginx-build
# RUN apk add --no-cache curl
# COPY --from=prod /app/build /usr/share/nginx/html
# HEALTHCHECK CMD curl http://127.0.0.1:80/ || exit 1

# CMD ["nginx", "-g", "daemon off;"]
# # USER node