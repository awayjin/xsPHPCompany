#1.0 创建表
CREATE TABLE if not exists users(
  userId int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  userName VARCHAR(50) NOT NULL,
  telNo VARCHAR(20) NOT NULL UNIQUE,
  sex ENUM('男','女')  NOT NULL DEFAULT '女',
  birthday DATE NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY(userId),
  INDEX username_jw(userName, telNo)
)type=MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

/*
  2.0 修改表
  #  2.1 增加新列 ALTER TABLE tableName ADD
      ALTER TABLE users ADD height DOUBLE NOT NULL DEFAULT '0.00' AFTER userId;

   # 2.2 改变列类型 ALTER TABLE tableName MODIFY
         #a.只改列类型 modify不能修改列名
           ALTER TABLE users MODIFY phone INT(13) UNSIGNED DEFAULT '0';

         #b. 改列类型和列名
           ALTER TABLE users CHANGE phones phone INT(12) UNSIGNED DEFAULT '00';

    # 2.3 删除表 DROP TABLE test


*/

#4.0 表类型
CREATE DATABASE IF NOT EXISTS testdb DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

/*
#2.7 创建索引

   2.7.1 创建主键索性
     CREATE TABLE tbl(tid int PRIMARY KEY)

   2.7.2 创建唯一索引 unique

   2.7.3 创建常规索引
        a.索引清单
          SHOW INDEX FROM tbl;
          显示mysql端口号 show variables like 'port'

        b. 创建索引
        CREATE INDEX ind ON tblTest(uid, tid);

        c. 删除索引
          DROP INDEX ind2 ON tbl;

*/
# 2.7.1 创建主键索性
CREATE TABLE IF NOT EXISTS categories(
  categoryId INT NOT NUll AUTO_INCREMENT PRIMARY KEY,
  categoryName VARCHAR(15) NOT NULL
);

# 2.7.2 创建唯一索引 unique
CREATE TABLE IF NOT EXISTS books(
  bookId INT(10) UNSIGNED AUTO_INCREMENT,
  categoryId MEDIUMINT(8) NOT NULL UNIQUE,
  price DOUBLE NOT NULL,
  detail TEXT NOT NULL,
  PRIMARY KEY(bookId)
);


#2.7.3 创建常规索引
CREATE INDEX ind ON tblTest(uid, tid);


