# Node 이미지를 기반으로 설정
FROM node:18

# 작업 디렉토리 설정
WORKDIR /app

# package.json 복사 및 의존성 설치
COPY package*.json ./
RUN npm install

# 나머지 파일 복사
COPY . .

# 개발용으로 nodemon 설치 및 실행
RUN npm install -g nodemon

# 앱 실행 (개발 시)
CMD ["nodemon", "index.js"]

# 5000번 포트 노출
EXPOSE 5000