-- 회원 DB 테이블 생성 파일
CREATE TABLE members (
  num INT NOT NULL AUTO_INCREMENT,
  id CHAR(15) NOT NULL,
  pass VARCHAR(255) NOT NULL,  -- 비밀번호를 안전하게 해시하기 위해 VARCHAR로 변경
  email CHAR(80),
  phone VARCHAR(15),           -- 전화번호를 VARCHAR로 변경
  regist_day CHAR(20),
  PRIMARY KEY (num)
);
