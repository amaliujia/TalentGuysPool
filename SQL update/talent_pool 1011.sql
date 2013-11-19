-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 10 月 11 日 19:42
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `talent_pool`
--

-- --------------------------------------------------------

--
-- 表的结构 `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `cid` varchar(20) NOT NULL,
  `cname` varchar(60) NOT NULL COMMENT '���˵�λ����',
  `password` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL COMMENT '���˵�λ��ַ',
  `tel` varchar(30) NOT NULL COMMENT '���˵�λ�绰',
  `img` varchar(100) DEFAULT NULL COMMENT '���˵�λ��Ƭ',
  `profile` text COMMENT '���˵�λ���',
  `email` varchar(35) NOT NULL COMMENT '���˵�λ����',
  `eid` varchar(20) NOT NULL COMMENT '��ҵID',
  `class` varchar(20) NOT NULL COMMENT '���˵�λ����',
  `net_addr` varchar(40) DEFAULT NULL,
  `reg_time` datetime NOT NULL,
  PRIMARY KEY (`cid`,`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='���˵�λ��Ϣ��';

--
-- 转存表中的数据 `company`
--

INSERT INTO `company` (`cid`, `cname`, `password`, `address`, `tel`, `img`, `profile`, `email`, `eid`, `class`, `net_addr`, `reg_time`) VALUES
('COM_BOC', '中国银行', 'e10adc3949ba59abbe56e057f20f883e', '中国北京', '22222222', NULL, '骗钱的地方', 'boc@sss.com', 'ENT_IBM', '银行', 'www.boc.cn', '2012-09-10 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `delete`
--

CREATE TABLE IF NOT EXISTS `delete` (
  `usertype` varchar(20) NOT NULL DEFAULT 'student',
  `sid` varchar(30) NOT NULL,
  `tid` varchar(30) NOT NULL,
  `reason` text,
  PRIMARY KEY (`sid`,`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `enterprise`
--

CREATE TABLE IF NOT EXISTS `enterprise` (
  `eid` varchar(20) NOT NULL COMMENT '��ҵID',
  `ename` varchar(60) NOT NULL COMMENT '��ҵ����',
  `password` varchar(80) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='��ҵ��Ϣ��';

--
-- 转存表中的数据 `enterprise`
--

INSERT INTO `enterprise` (`eid`, `ename`, `password`) VALUES
('ENT_ibm', 'IBM', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `ibmprize`
--

CREATE TABLE IF NOT EXISTS `ibmprize` (
  `sid` varchar(30) NOT NULL,
  `prizename` varchar(50) NOT NULL COMMENT 'IBM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='���IBM�����';

--
-- 转存表中的数据 `ibmprize`
--

INSERT INTO `ibmprize` (`sid`, `prizename`) VALUES
('SYSU_10389392', '获IBM全球专业认证');

-- --------------------------------------------------------

--
-- 表的结构 `itskill`
--

CREATE TABLE IF NOT EXISTS `itskill` (
  `sid` varchar(30) NOT NULL,
  `skillname` varchar(20) NOT NULL COMMENT 'IT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='IT���ܱ�';

--
-- 转存表中的数据 `itskill`
--

INSERT INTO `itskill` (`sid`, `skillname`) VALUES
('SYSU_10389392', 'HTML'),
('SYSU_10389392', 'JavaScript');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(30) NOT NULL COMMENT '������ID',
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL COMMENT '�ʼ���Ϣ����',
  `receiver_id` varchar(30) NOT NULL COMMENT '������ID',
  `unread` tinyint(1) NOT NULL,
  `sendtime` datetime NOT NULL COMMENT '发送时间',
  `sender_type` varchar(20) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='�ʼ���' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`msg_id`, `sender_id`, `title`, `content`, `receiver_id`, `unread`, `sendtime`, `sender_type`) VALUES
(1, 'ENT_ibm', 'This is a test msg.', 'Can you see me? I''m the content of this msg!', 'SYSU_wangbq', 0, '2012-09-12 00:00:00', 'enterprise'),
(2, 'ENT_ibm', 'Wow! I love U!', 'Happy ! asdasdasdasdasdasdasddsfdasgasdfasdfajhsJSDGHASFTFETFTFSFEAYTFTYAFRT', 'SYSU_wangbq', 0, '2012-09-12 20:00:00', 'enterprise'),
(10, 'SYSU_wangbq', '撒旦撒大概是电饭锅的分公司的分公司的', ' 阿斯顿发水电费撒的发生的鬼地方华国锋更好地附加费江铠同', 'SYSU_10389393', 1, '2012-09-14 14:30:00', 'teacher'),
(11, 'COM_boc', '给IBM的一封信', '你好！我是中国银行！ ', 'ENT_ibm', 1, '2012-09-23 12:00:40', 'company'),
(12, 'COM_boc', 'ibm！！！', 'submitBTNlhfcws 助理小编　二级|私信|我的百科|百度首页\n\n新闻网页贴吧知道MP3图片视频地图百科文库\n\n帮助\n首页自然文化地理历史生活社会艺术人物经济科技体育图片数字博物馆核心用户百科商城欢度国庆\n请按义项进行编辑\n信\n\n添加义项 这是一个多义词，请在下列义项中选择浏览 （共15个义项）\n1．汉字 2．书信的格式 3．姓氏 4．儒家五常之一 5．刘一祯单曲 6．圣经中的说法 7．日本作家东野圭吾的小说 8．玉山铁二主演的日本电影 9．艺人苏见信的艺名 10．动漫《火影忍者》中的人物 11．动漫《高达Seed Destiny》中的人物 12．郑秀文音乐专辑 13．曹方演唱的歌曲 14．陈明的演唱歌曲 15．(阿信的故事香港版主题曲\n \n1.汉字 编辑本义项\n求助编辑\n信\n\n目录\n\n结构\n形容词\n动词\n名词\n副词\n《康熙字典》\n相关成语\n编辑本段\n结构\n\n　　[信]读音：xìn\n　　笔画数：9\n　　部首：亻\n　　结构：左右\n　　笔顺编号：324111251\n　　郑码：NSVV\n　　五笔：WY、WYG\n　　U：4FE1\n　　GBK：D0C5\n　　主要释义：\n　　(a) 诚实，不欺骗：～用。～守。～物。～货。～誓旦旦。\n　　(b) 不怀疑，认为可靠：～任。～托。～心。～念。\n　　(c) 崇奉：～仰。～徒。\n　　(d) 消息：～息。杳无音～。\n　　(e) 函件：～件。～笺。～鸽。～访。\n　　(f) 随便，放任：～手（随手）。～步（随意走动，散步）。～笔。～意。\n　　(g) 同“芯2”。(h) 姓。\n编辑本段\n形容词\n\n　　(1) 会意。从人，从言。人的言论应当是诚实的。本义：真心诚意。\n　　(2) 同本义 信，诚也。\n　　《说文》有诸已之谓信。\n　　《孟子》 信，言合于意也。\n　　《墨子经》 信者，诚也。专一不移也。\n　　《白虎通·情性》 定身以行事谓之信。\n　　《国语·晋语》期果言当谓之信。\n　　《贾子道术》 民不求其所欲而得之谓之信。\n　　《礼记·经解》 信誓旦旦。\n　　《诗·卫风·氓》反贼无信！吾不幸误中汝奸计也！\n　　《三国演义》 牺牲玉帛，弗敢加也，必以信。\n　　《左传·曹刿论战》 信而见疑。\n　　《史记·屈原贾生列传》则是无信。\n　　《世说新语·方正》\n　　(3) 又如：信行（信用；守诺言）；信人（讲守信用的人）。\n　　(4) 真实，不虚伪信言不美，美言不信。\n　　《老子》 谓为信然。——《三国志·诸葛亮传》 其事信。\n　　清·薛福成《观巴黎油画记》 。\n　　(5) 又如：信官（诚实不欺的官员）；信赏（悬赏）；信赏钱（悬赏金）；信人（诚实的人）。\n编辑本段\n动词\n\n　　(1) 相信；信任不我信兮。——《诗·邶风·击鼓》 且单于信女，使昫人死生。——《史记·苏武传》 不自信。——《战国策·齐策》 亲之信之。——诸葛亮《出师表》犹信。——唐·柳宗元《捕蛇者说》 笑而不信。——宋·苏轼《石钟山记》\n　　(2) 又如：信不及（不能相信；不敢相信）；不信邪；信得过；信爱（信任喜爱）；信纳（相信采纳）；信不信由你；听其言而信其行。\n　　(3) 守信用 [keep one’s word；keep one’s credit] 已诺不信则兵弱。\n　　《荀子·富国》 小信未孚。\n　　《左传·庄公十年》此四君者，皆明智而忠信。\n　　贾谊《过秦论》 信义著于四海。\n　　晋·陈寿《三国志·诸葛亮传》 信义安所见。\n　　《汉书·李广苏建传》虏帅失信。\n　　宋·文天祥《指南录·后序》\n　　(4) 住宿两夜 有客宿宿，有客信信。\n　　《诗·周颂·有客》子庚门于纯门，信于城下而还。\n　　《左传·襄公十八年》\n　　(5) 证实；应验 其精甚真，其中有信。\n　　《老子》\n　　(6) 知晓我父母皆仙人，何可以貌信其年岁乎?\n　　《聊斋志异》 早信此生终不遇，当年悔草《长杨赋》。\n　　陆游《蝶恋花》\n　　(7) 又如：信道。（知道；料道）。\n编辑本段\n名词\n\n　　(1) 信约；盟约 以继好结信。——《左传·襄公元年》\n　　(2) 符契；凭证 行而无信。——《战国策·燕策》\n　　(3) 又如：信笼（内盛物品后封口加盖印信的箱笼）；刻木为信。\n　　(4) 持有信物的外交使臣或传送函件或口头消息的人，宜急追信改书。\n　　《资治通鉴》越绝粮，使素忠为信，告粜于吴。\n　　《越绝书》 司空郑冲驰遣信就阮籍求文。\n　　《世说新语·文学》\n　　(5) 又如：信使（使者）。\n　　(6) 通“讯”。音讯 不见眼中人，天长音信断。——李白《大堤曲》\n　　(7) 又如：信耗（信息；消息）；信炮（按约定信号所放之炮）；信音（音信；消息）；通风报信；凶信；信鸽；信鸿；信鸟；信问（信息）。\n　　(8) 书信，信件（晚起义。先秦两汉的书信又用“书”字表示）函使报信。——清·袁枚《祭妹文》\n　　(9) 又如：信局（投递信件的机构）；私信；挂号信；平信；死信；匿名信；信箱；信筒；信简（书信）。\n　　(10) 姓。\n编辑本段\n副词\n\n　　(1) 放任；随便 要不拿出纲纪来，信着他胡行乱做，就不成个人家。——《醒世姻缘传》低眉信手续续弹，说尽心中无限事。——白居易《琵琶行》\n　　(2) 又如：信口胡沁（信口胡吣。不顾事实，随便乱说）；信着（任着；任凭）；信手拈来；信步。\n　　(3) 果真，的确若妻信病，赐小豆四十斛，宽假限日。——《史记·华佗传》 烟涛微茫信难求。——唐·李白《梦游天姥吟留别》 信知生男恶，反是生女好。——唐·杜甫《兵车行》信造化之尤物。——宋·陆游《过小孤山大孤山》\n编辑本段\n《康熙字典》\n\n　　《子集中》《人字部》　\n　　信〔古文〕《唐韵》息晋切《集韵》《正韵》思晋切，音讯。悫也，不疑也，不差爽也。《易·系辞》人之所助者，信也。《左传·僖七年》守命共时之谓信。\n　　又《尔雅·释地》大蒙之人信。《注》地气使然也。　\n　　又《左传·庄三年》一宿为舍，再宿为信。《诗·豳风》于女信处。\n　　又《周颂》有客信信。《注》四宿也。　\n　　又符契曰信。《前汉·平帝纪》汉律，诸乗传者持尺五木转信。《注》两行书缯帛，分持其一。出入关，合之乃得过。或用木为之。《後汉·窦武传》取棨信闭诸禁门。《注》棨，有衣戟也。　\n　　又古人谓使者曰信。与讯通。《史记·韩世家》轸说楚王，发信臣，多其车，重其币。《司马相如·谕巴蜀檄》故遣信，使晓谕百姓。　\n　　又州名。唐置信州，卽今广信府。　又姓。信陵君无忌之後。\n　　又复姓。《何氏姓苑》有信都，信平二氏。　\n　　又《集韵》《正韵》升人切。与申同。《易·系辞》往者，屈也。来者，信也。《诗·邶风》于嗟洵兮，不我信兮。　\n　　又同身。《周礼·春官》侯执信圭，伯执躬圭。《注》信圭，刻人形伸也。躬圭，刻人形屈也。　\n　　又叶斯邻切，音新。《诗·小雅》庶民弗信。叶上亲。\n　　按《正韵》云：韩王信本与淮隂侯同名，嫌误读作新。今《叙传》韩信音新，是信本有平、去两音，其读平者亦音，而非叶矣。[1]\n编辑本段\n相关成语\n\n　　信口开河\n　　信口雌黄\n　　信手拈来\n　　信笔涂鸦\n　　信而好古\n　　信而有征\n　　信誓旦旦\n　　信赏必罚\n　　信马由缰\n　　偏信则暗\n　　偏听偏信\n　　兼听则明，偏信则暗\n　　半信半疑\n　　取信于民\n　　善男信女\n　　威信扫地\n　　将信将疑\n　　尾生之信\n　　杳无音信\n　　果于自信\n　　民保于信\n　　深信不疑\n　　疑信参半\n　　破除迷信\n　　笃信好学\n　　背信弃义\n　　自信不疑\n　　言必信，行必果\n　　言而无信\n　　言而有信\n　　讲信修睦\n　　谓予不信\n　　轻诺寡信\n　　通风报信\n　　难以置信\n　　韩信将兵，多多益善\n　　风信年华\n参考资料\n1．  康熙字典记载 ．\n扩展阅读：\n1\n信氏宗亲网http://www.xinhome.com.cn/\n2\n信仰的“信”：http://blog.sina.com.cn/s/blog_513639db0100cciz.html\n开放分类：\n汉字\n \n2.书信的格式 编辑本义项\n \n3.姓氏 编辑本义项\n \n4.儒家五常之一 编辑本义项\n \n5.刘一祯单曲 编辑本义项\n \n6.圣经中的说法 编辑本义项\n \n7.日本作家东野圭吾的小说 编辑本义项\n \n8.玉山铁二主演的日本电影 编辑本义项\n \n9.艺人苏见信的艺名 编辑本义项\n \n10.动漫《火影忍者》中的人物 编辑本义项\n \n11.动漫《高达Seed Destiny》中的人物 编辑本义项\n \n12.郑秀文音乐专辑 编辑本义项\n \n13.曹方演唱的歌曲 编辑本义项\n \n14.陈明的演唱歌曲 编辑本义项\n \n15.(阿信的故事香港版主题曲 编辑本义项\n信资料库：\n热门单曲：1.你存在2.回来3.你的背包4.我期待5.魂6.火烧的寂寞7.我记得8.不能没有你\n所有专辑：1.《我记得》2.《黎明之前·新歌发表会 live》3.《华丽的挑战电视原声带》4.《黎明之前》5.《恋花》6.《降龙乐章》7.《趁我》8.《集乐星球》\n更多音乐\n相关视频：\n\n热情仲夏\n\n再见\n\n我期待\n\n如果还有明天\n更多视频\n“信”在汉英词典中的解释(来源：百度词典)：\n1.honest\n2.to trust; to believe\n3.to believe in\n4.a letter\n5.a message\n6.at will\n我来完善 “信”相关词条：\n百度百科中的词条正文与判断内容均由用户提供，不代表百度百科立场。如果您需要解决具体问题（如法律、医学等领域），建议您咨询相关领域专业人士。\n本词条对我有帮助\n添加到搜藏\n分享到:\n更多\n合作编辑者\n美丽大地 ，市阁凌霄 ，liyqwish ，野蛮大爷 ，酸柠檬上的蝈蝈 ，高达爱好者lhb ，水吻涟漪 更多\n如果您认为本词条还需进一步完善，百科欢迎您也来参与编辑词条。在开始编辑前，您还可以先学习如何编辑词条\n如想投诉，请到百度百科投诉中心；如想提出意见、建议，请到百度百科吧。\n\n\nlhfcws\n00\n\n去兑换>>您尚无道具可使用\n成长任务\n加速升级，快速成长。我要去参加>>\n日常任务\n本月累计点亮0天。今日笑脸还没点亮哦。\n大展宏图：参加任务，拿点亮任务日历获得额外财富值\n热词推送\n词条动态\n进入我的百科\n词条统计\n浏览次数：约 1112606次\n编辑次数：89次 历史版本\n最近更新：2012-09-21\n创建者：thinkou\n更多贡献光荣榜\n辛勤贡献者：\nRambleCafe		  展开\n安迪布兰顿大人		  版本\nqgyyje		  版本\n百科拆分专员		  版本\n0910707		  版本\n查看更多贡献者\n最新动态\n粉碎海鲜流言：\n\n百科消息：\n百科android客户端升级1.1版\n中国孔庙——数字博物馆新馆上线\n百科学术顾问李开复谈中概股做空\n百度文库：2013考研必备材料\n百度校园看见你的光芒\n百科航海日志-船长分享成长点滴\n© 2012 Baidu 使用百度前必读 | 百科协议 | 百度百科合作平台\n ', 'ENT_ibm', 1, '2012-10-05 15:20:22', 'company');

-- --------------------------------------------------------

--
-- 表的结构 `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `sid` varchar(30) NOT NULL,
  `cet4` int(10) DEFAULT NULL COMMENT 'CET4',
  `cet6` int(10) unsigned DEFAULT NULL COMMENT 'CET6',
  `fellowship` text,
  `gpa` double(3,1) unsigned NOT NULL COMMENT 'GPA',
  `rank` int(7) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�񽱡��������ɼ���';

--
-- 转存表中的数据 `scores`
--

INSERT INTO `scores` (`sid`, `cet4`, `cet6`, `fellowship`, `gpa`, `rank`) VALUES
('SYSU_10389392', 600, 700, '国家奖学金', 3.2, 2),
('SYSU_10389393', 639, 616, '无', 3.8, 30);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` varchar(30) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `std_no` varchar(20) NOT NULL,
  `birthday` date NOT NULL COMMENT '����',
  `sex` tinyint(1) NOT NULL COMMENT '�Ա� true-�� false-Ů',
  `major` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  `tid` varchar(30) NOT NULL,
  `uid` varchar(20) NOT NULL COMMENT '������ѧID',
  `graduation_year` char(4) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `reg_time` datetime NOT NULL,
  `profile` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�ѵ����ѧ����Ϣ��';

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`sid`, `sname`, `password`, `email`, `tel`, `std_no`, `birthday`, `sex`, `major`, `img`, `tid`, `uid`, `graduation_year`, `degree`, `reg_time`, `profile`) VALUES
('SYSU_10389393', '吴文杰', 'e10adc3949ba59abbe56e057f20f883e', 'lhfcws@gmail.com', '15800010588', '10389393', '1992-08-10', 1, '软件工程', '', 'SYSU_wangbq', 'SYSU', '2014', '本科', '2012-09-13 00:00:00', '我是学生。测试！'),
('SYSU_10389392', '陈学家', 'e10adc3949ba59abbe56e057f20f883e', 'chenxj@gmail.com', '13800013800', '10389392', '1990-08-11', 1, '计算机应用', '', 'SYSU_wangbq', 'SYSU', '2014', '本科', '2012-09-12 15:00:00', '我是陈学家大神！前端无所不能！');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `tid` varchar(20) NOT NULL COMMENT '��ʦID',
  `tname` varchar(20) NOT NULL COMMENT '��ʦ����',
  `password` varchar(80) NOT NULL,
  `reg_time` datetime NOT NULL,
  `profile` text NOT NULL COMMENT '��ʦ���',
  `uid` varchar(20) NOT NULL COMMENT '������ѧID',
  `img` varchar(100) NOT NULL COMMENT '��ʦ��Ƭ',
  `position` varchar(20) NOT NULL COMMENT '��ʦְλ',
  `address` varchar(60) NOT NULL COMMENT '��ʦ�칫��ַ',
  `tel` varchar(30) NOT NULL COMMENT '��ʦ�绰',
  `email` varchar(35) NOT NULL COMMENT '��ʦ����',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='������ѧ��ʦ��Ϣ��';

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`tid`, `tname`, `password`, `reg_time`, `profile`, `uid`, `img`, `position`, `address`, `tel`, `email`) VALUES
('SYSU_chenxj', '陈学家老师', 'e10adc3949ba59abbe56e057f20f883e', '2012-09-11 17:13:28', '精通 JS HTML CSS 等前端技术，无所不能。', 'SYSU', '', '高级前端大神', '至善园', '10086', 'chenxj@163.com'),
('SYSU_wangbq', '王变琴', 'e10adc3949ba59abbe56e057f20f883e', '2012-08-26 08:33:37', ' 我校System i教育中心是IBM公司重点支持的教育中心之一，在我校的专业教学及人才培养上起了良好的作用。此前，受我校IBM System i教育中心邀请，IBM中国公司System i 系统的资深专家曾专程到东校区，为软件学院2005级选修《System i 系统概论》课程的学生授课。我校东校区实验中心主任刘树郁老师还获得了“教育部——IBM高校合作项目”2007年度优秀教师奖，王变琴老师的“System i系统概论”课程获得“教育部－IBM精品课程”资助。 \r\n陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛陈学家是大牛', 'SYSU', '', '高级工程师', '广州市番禺区大学城中山大学南实验楼D301A', '15900112323', 'wbq@mail.sysu.edu.cn');

-- --------------------------------------------------------

--
-- 表的结构 `temp_ibmprize`
--

CREATE TABLE IF NOT EXISTS `temp_ibmprize` (
  `sid` varchar(30) NOT NULL,
  `prizename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `temp_ibmprize`
--

INSERT INTO `temp_ibmprize` (`sid`, `prizename`) VALUES
('SYSU_10389011', '参加SUR项目');

-- --------------------------------------------------------

--
-- 表的结构 `temp_itskill`
--

CREATE TABLE IF NOT EXISTS `temp_itskill` (
  `sid` varchar(30) NOT NULL,
  `skillname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `temp_itskill`
--

INSERT INTO `temp_itskill` (`sid`, `skillname`) VALUES
('SYSU_10389011', 'C++'),
('SYSU_10389011', ' HTML');

-- --------------------------------------------------------

--
-- 表的结构 `temp_scores`
--

CREATE TABLE IF NOT EXISTS `temp_scores` (
  `sid` varchar(30) NOT NULL,
  `cet4` int(10) NOT NULL,
  `cet6` int(10) NOT NULL,
  `fellowship` text NOT NULL,
  `gpa` float(3,1) NOT NULL,
  `rank` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `temp_scores`
--

INSERT INTO `temp_scores` (`sid`, `cet4`, `cet6`, `fellowship`, `gpa`, `rank`) VALUES
('SYSU_10389011', 600, 606, '专项奖学金', 3.0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `temp_student`
--

CREATE TABLE IF NOT EXISTS `temp_student` (
  `sid` varchar(30) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `std_no` varchar(20) NOT NULL,
  `birthday` date NOT NULL COMMENT '����',
  `sex` tinyint(1) NOT NULL COMMENT '�Ա� true-�� false-Ů',
  `major` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL,
  `uid` varchar(20) NOT NULL COMMENT '������ѧID',
  `tid` varchar(30) NOT NULL,
  `graduation_year` char(4) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `temp_reg_time` datetime NOT NULL,
  `profile` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = create ; 2 = modify ; -1 = reject',
  `reason` text NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='��ʱѧ����Ϣ��';

--
-- 转存表中的数据 `temp_student`
--

INSERT INTO `temp_student` (`sid`, `sname`, `email`, `tel`, `std_no`, `birthday`, `sex`, `major`, `img`, `uid`, `tid`, `graduation_year`, `degree`, `temp_reg_time`, `profile`, `status`, `reason`) VALUES
('SYSU_10389011', '王瑞', 'wangrui@gmail.com', '1300000000', '10389011', '2012-10-23', 1, '统计学', '', 'SYSU', 'SYSU_wangbq', '2014', '本科', '2012-10-11 10:58:50', '你猜猜看我是谁', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `uid` varchar(20) NOT NULL COMMENT '������ѧID',
  `uname` varchar(50) NOT NULL COMMENT '������ѧ����',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='������ѧ��Ϣ��';

--
-- 转存表中的数据 `university`
--

INSERT INTO `university` (`uid`, `uname`) VALUES
('SYSU', '中山大学');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
