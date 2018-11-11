set names utf8;
set foreign_key_checks=0;

drop database if exists original_ecsite_php;
create database original_ecsite_php;
use original_ecsite_php;

create table user_info(
id int primary key not null auto_increment,
user_id varchar(16) not null unique,
password varchar(16) not null,
family_name varchar(32) not null,
first_name varchar(32) not null,
family_name_kana varchar(32) not null,
first_name_kana varchar(32) not null,
sex tinyint default 0 not null,
email varchar(32) not null,
status tinyint default 0 not null,
logined tinyint default 0 not null,
regist_date datetime not null,
update_date datetime
)
default charset=utf8
;

insert into user_info values
(1,"guest","guest","一般","一郎","いっぱん","いちろう",0,"guest@gmail.com",0,0,now(),now()),
(2,"guest2","guest2","一般","二郎","いっぱん","じろう",0,"guest2@gmail.com",0,0,now(),now()),
(3,"guest3","guest3","一般","三郎","いっぱん","さぶろう",0,"guest3@gmail.com",0,0,now(),now()),
(4,"guest4","guest4","一般","四郎","いっぱん","しろう",0,"guest4@gmail.com",0,0,now(),now()),
(5,"guest5","guest5","一般","五郎","いっぱん","ごろう",0,"guest5@gmail.com",0,0,now(),now()),
(6,"admin","admin","管理者","一郎","かんりしゃ","いちろう",0,"admin@gmail.com",1,0,now(),now()),
(7,"admin2","admin2","管理者","二郎","かんりしゃ","じろう",0,"admin2@gmail.com",1,0,now(),now()),
(8,"admin3","admin3","管理者","三郎","かんりしゃ","さぶろう",0,"admin3@gmail.com",1,0,now(),now()),
(9,"admin4","admin4","管理者","四郎","かんりしゃ","しろう",0,"admin4@gmail.com",1,0,now(),now()),
(10,"admin5","admin5","管理者","五郎","かんりしゃ","ごろう",0,"admin5@gmail.com",1,0,now(),now())
;

create table m_category(
id int primary key not null auto_increment,
category_id int not null unique,
category_name varchar(20) not null unique,
category_description varchar(100),
insert_date datetime not null,
update_date datetime
)
default charset=utf8
;

insert into m_category values
(1,1,"全て","全地方が対象",now(),now()),
(2,2,"北海道","北海道が対象",now(),now()),
(3,3,"東北","東北地方が対象",now(),now()),
(4,4,"関東甲信越","関東甲信越が対象",now(),now()),
(5,5,"東海、北陸、近畿","東海地方、北陸地方、近畿地方が対象",now(),now()),
(6,6,"中国、四国","中国地方、四国地方が対象",now(),now()),
(7,7,"九州、沖縄","九州地方、沖縄が対象",now(),now())
;

create table product_info(
id int primary key not null auto_increment,
product_id int not null unique,
product_name varchar(100) not null unique,
product_name_kana varchar(100) not null unique,
product_description varchar(255) not null,
category_id int not null,
price int,
image_file_path varchar(100),
image_file_name varchar(50),
release_date datetime not null,
release_company varchar(50),
status tinyint default 0 not null,
regist_date datetime not null,
update_date datetime,
foreign key(category_id) references m_category(category_id)
)
default charset=utf8
;

insert into product_info values
(1,1,"北海道","ほっかいどう","北海道",2,1100,"./images","sample1.jpg",now(),"札幌",0,now(),now()),
(2,2,"東北","とうほく","東北",3,1200,"./images","sample2.jpg",now(),"仙台",0,now(),now()),
(3,3,"関東甲信越","かんとうこうしんえつ","関東甲信越",4,1300,"./images","sample3.jpg",now(),"銀座",0,now(),now()),
(4,4,"東海、北陸、近畿","とうほくきん","東海、北陸、近畿",5,1400,"./images","sample4.jpg",now(),"名古屋",0,now(),now()),
(5,5,"中国、四国","ちゅうごくしこく","中国、四国",6,1500,"./images","sample5.jpg",now(),"下関",0,now(),now()),
(6,6,"九州、沖縄","きゅうしゅうおきなわ","九州、沖縄",7,1600,"./images","sample6.jpg",now(),"博多",0,now(),now()),
(7,7,"北海道2","ほっかいどうに","北海道",2,2100,"./images","sample7.jpg",now(),"帯広",0,now(),now()),
(8,8,"東北2","とうほくに","東北",3,2200,"./images","sample8.jpg",now(),"由利本荘",0,now(),now()),
(9,9,"関東甲信越2","かんとうこうしんえつに","関東甲信越",4,2300,"./images","sample9.jpg",now(),"横浜",0,now(),now()),
(10,10,"東海、北陸、近畿2","とうほくきんに","東海、北陸、近畿",5,2400,"./images","sample10.jpg",now(),"金沢",0,now(),now()),
(11,11,"中国、四国2","ちゅうごくしこくに","中国、四国",6,2500,"./images","sample11.jpg",now(),"松江",0,now(),now()),
(12,12,"九州、沖縄2","きゅうしゅうおきなわに","九州、沖縄",7,2600,"./images","sample12.jpg",now(),"奄美",0,now(),now()),
(13,13,"北海道3","ほっかいどうさん","北海道",2,3100,"./images","sample13.jpg",now(),"稚内",0,now(),now()),
(14,14,"東北3","とうほくさん","東北",3,3200,"./images","sample14.jpg",now(),"津軽",0,now(),now()),
(15,15,"関東甲信越3","かんとうこうしんえつさん","関東甲信越",4,3300,"./images","sample15.jpg",now(),"大宮",0,now(),now()),
(16,16,"東海、北陸、近畿3","とうほくきんさん","東海、北陸、近畿",5,3400,"./images","sample16.jpg",now(),"神戸",0,now(),now()),
(17,17,"中国、四国3","ちゅうごくしこくさん","中国、四国",6,3500,"./images","sample17.jpg",now(),"今治",0,now(),now()),
(18,18,"九州、沖縄3","きゅうしゅうおきなわさん","九州、沖縄",7,3600,"./images","sample18.jpg",now(),"那覇",0,now(),now())
;

create table cart_info(
id int primary key not null auto_increment,
user_id varchar(16) not null,
temp_user_id varchar(16),
product_id int not null,
product_count int not null,
price int not null,
regist_date datetime not null,
update_date datetime
)
default charset=utf8
;

create table purchase_history_info(
id int primary key not null auto_increment,
user_id varchar(16) not null,
product_id int not null,
product_count int not null,
price int not null,
destination_id int not null,
regist_date datetime not null,
update_date datetime,
foreign key(product_id) references product_info(product_id)
)
default charset=utf8
;

create table destination_info(
id int primary key not null auto_increment,
user_id varchar(16) not null,
family_name varchar(32) not null,
first_name varchar(32) not null,
family_name_kana varchar(32) not null,
first_name_kana varchar(32) not null,
email varchar(32) not null,
tel_number varchar(13) not null,
user_address varchar(50) not null,
regist_date datetime not null,
update_date datetime
)
default charset=utf8
;
insert into destination_info values
(1,"guest","一般","一郎","いっぱん","いちろう","guest@gmail.com","080-1234-5678","東京",now(),now()),
(2,"guest2","一般","二郎","いっぱん","じろう","guest2@gmail.com","080-2234-5678","東京2",now(),now()),
(3,"guest3","一般","三郎","いっぱん","さぶろう","guest3@gmail.com","080-3234-5678","東京3",now(),now()),
(4,"guest4","一般","四郎","いっぱん","しろう","guest4@gmail.com","080-4234-5678","東京4",now(),now()),
(5,"guest5","一般","五郎","いっぱん","ごろう","guest5@gmail.com","080-5234-5678","東京5",now(),now()),
(6,"admin","管理者","一郎","かんりしゃ","いちろう","guest@gmail.com","080-6234-5678","東京6",now(),now()),
(7,"guest2","管理者","二郎","かんりしゃ","じろう","guest2@gmail.com","080-7234-5678","東京7",now(),now()),
(8,"guest3","管理者","三郎","かんりしゃ","さぶろう","guest3@gmail.com","080-8234-5678","東京8",now(),now()),
(9,"guest4","管理者","四郎","かんりしゃ","しろう","guest4@gmail.com","080-9234-5678","東京9",now(),now()),
(10,"guest5","管理者","五郎","かんりしゃ","ごろう","guest5@gmail.com","080-0234-5678","東京0",now(),now())
;
