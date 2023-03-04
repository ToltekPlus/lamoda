FROM node:alpine

WORKDIR /home/app

COPY package*.json ./

RUN npm install

RUN npm install -g @vue/cli

COPY . .

CMD ["npm", "start"]
