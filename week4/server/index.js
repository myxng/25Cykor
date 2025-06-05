const express = require("express");
const mongoose = require("mongoose");
const cors = require("cors");

const app = express();
const PORT = 5000;

// 미들웨어
app.use(cors());
app.use(express.json());

// MongoDB 연결
const mongoURI = process.env.MONGO_URI || "mongodb://localhost:27017/crudboard";

mongoose.connect(mongoURI, {
  useNewUrlParser: true,
  useUnifiedTopology: true
}).then(() => {
  console.log("✅ MongoDB 연결 성공");
}).catch((err) => {
  console.error("❌ MongoDB 연결 실패:", err.message);
  process.exit(1);
});

// 테스트용 기본 라우터
app.get("/", (req, res) => {
  res.send("서버 실행 중!");
});

// 서버 시작
app.listen(PORT, () => {
  console.log(`🚀 서버가 포트 ${PORT}에서 실행 중`);
});