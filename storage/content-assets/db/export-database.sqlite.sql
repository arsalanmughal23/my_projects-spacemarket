BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "account_types" ("id" integer not null primary key autoincrement, "account_name" varchar not null, "minimum" varchar not null, "spread" varchar not null, "commission" varchar not null, "bonus" varchar not null, "platform" varchar not null, "leverage" varchar not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "blogs" ("id" integer not null primary key autoincrement, "title" varchar not null, "description" text not null, "banner_image" varchar not null, "image" varchar not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "cms" ("id" integer not null primary key autoincrement, "page_slug" varchar not null, "section_slug" varchar not null, "key" varchar not null, "value" text not null, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "data_lists" ("id" integer not null primary key autoincrement, "type" varchar not null, "detail" varchar not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "departments" ("id" integer not null primary key autoincrement, "name" varchar not null, "email" varchar not null, "created_at" datetime, "updated_at" datetime, "deleted_at" datetime);
CREATE TABLE IF NOT EXISTS "failed_jobs" ("id" integer not null primary key autoincrement, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime default CURRENT_TIMESTAMP not null);
CREATE TABLE IF NOT EXISTS "faqs" ("id" integer not null primary key autoincrement, "title" varchar not null, "description" text not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "learning_videos" ("id" integer not null primary key autoincrement, "title" varchar not null, "video_key" text not null, "thumbnail" text not null, "embed_url" text not null, "video_link" text not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "legal_documents" ("id" integer not null primary key autoincrement, "name" varchar not null, "link" varchar, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "menus" ("id" integer not null primary key autoincrement, "name" varchar, "icon" varchar, "slug" varchar, "position" integer not null default '0', "status" integer not null default '1', "created_at" datetime, "updated_at" datetime, "deleted_at" datetime);
CREATE TABLE IF NOT EXISTS "migrations" ("id" integer not null primary key autoincrement, "migration" varchar not null, "batch" integer not null);
CREATE TABLE IF NOT EXISTS "model_has_permissions" ("permission_id" integer not null, "model_type" varchar not null, "model_id" integer not null, foreign key("permission_id") references "permissions"("id") on delete cascade, primary key ("permission_id", "model_id", "model_type"));
CREATE TABLE IF NOT EXISTS "model_has_roles" ("role_id" integer not null, "model_type" varchar not null, "model_id" integer not null, foreign key("role_id") references "roles"("id") on delete cascade, primary key ("role_id", "model_id", "model_type"));
CREATE TABLE IF NOT EXISTS "oauth_tokens" ("id" integer not null primary key autoincrement, "access_token" varchar not null, "refresh_token" varchar not null, "expires_in" integer not null, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "password_resets" ("email" varchar not null, "token" varchar not null, "created_at" datetime);
CREATE TABLE IF NOT EXISTS "payment_methods" ("id" integer not null primary key autoincrement, "name" varchar not null, "image" varchar not null, "is_deposit" tinyint(1) not null, "is_withdrawal" tinyint(1) not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "permissions" ("id" integer not null primary key autoincrement, "name" varchar not null, "guard_name" varchar not null default 'web', "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "personal_access_tokens" ("id" integer not null primary key autoincrement, "tokenable_type" varchar not null, "tokenable_id" integer not null, "name" varchar not null, "token" varchar not null, "abilities" text, "last_used_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "role_has_permissions" ("permission_id" integer not null, "role_id" integer not null, foreign key("permission_id") references "permissions"("id") on delete cascade, foreign key("role_id") references "roles"("id") on delete cascade, primary key ("permission_id", "role_id"));
CREATE TABLE IF NOT EXISTS "roles" ("id" integer not null primary key autoincrement, "name" varchar not null, "guard_name" varchar not null default 'web', "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "settings" ("id" integer not null primary key autoincrement, "logo" text not null, "login_link" text not null, "register_link" text not null, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "testimonials" ("id" integer not null primary key autoincrement, "title" varchar not null, "description" varchar not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "trading_options" ("id" integer not null primary key autoincrement, "title" varchar not null, "description" text not null, "link" varchar not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "user_requests" ("id" integer not null primary key autoincrement, "type" varchar not null, "department_id" integer, "full_name" varchar not null, "email" varchar not null, "contact_number" varchar not null, "ticket_number" varchar, "trade_number" varchar, "description" text not null, "status" tinyint(1) not null default '0', "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "users" ("id" integer not null primary key autoincrement, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime);
CREATE TABLE IF NOT EXISTS "white_labels" ("id" integer not null primary key autoincrement, "title" varchar not null, "description" text not null, "deleted_at" datetime, "created_at" datetime, "updated_at" datetime);
INSERT INTO "account_types" ("id","account_name","minimum","spread","commission","bonus","platform","leverage","deleted_at","created_at","updated_at") VALUES (1,'Standard Account','R50','1.5 Pips','$0','0%','MT5','1:2000',NULL,'2026-10-05 19:59:50','2026-10-05 19:59:50'),
 (2,'Pro Account','R50','0.0 Pips','$7','0%','MT5','1:500',NULL,'2026-10-05 20:01:12','2026-10-05 20:01:12'),
 (3,'Sniper Account','R50','0.0 Pips','$0','0%','MT5','1:1000',NULL,'2026-10-05 20:02:18','2026-10-05 20:02:18'),
 (4,'Ultra Micro Account','R50','0.5 Pips','$0','0%','MT5','1:500',NULL,'2026-10-05 20:03:02','2026-10-05 20:03:02'),
 (5,'Space 100','R50','0 Pips','$0','100%','MT5','1:500',NULL,'2026-10-05 20:04:07','2026-10-05 20:04:07'),
 (6,'Swap Free/Islamic ECN','R50','0 Pips','$10','0%','MT5','1:500',NULL,'2026-10-05 20:05:21','2026-10-05 20:05:21'),
 (7,'Synthetics','R50','0.1 Pips','$0','0%','MT5','1:10000',NULL,'2026-10-05 20:06:06','2026-10-05 20:06:06');
INSERT INTO "cms" ("id","page_slug","section_slug","key","value","created_at","updated_at") VALUES (1,'home','section_1','main_title','<h1><font color="#ffffff">Experience</font></h1><h1><b><font color="#ff5757">Interstellar FX</font> Trading</b></h1>','2026-10-05 19:42:52','2026-10-05 19:42:52'),
 (2,'home','section_1','sub_title','Propel Your Trades Into Another Galaxy.','2026-10-05 19:42:52','2026-10-05 19:42:52'),
 (3,'home','section_1','button_text','<p>Start <b>Trading</b></p>','2026-10-05 19:42:52','2026-10-05 19:42:52'),
 (4,'home','section_1','button_link','https://my.spacemarkets.io/auth/register?_gl=1*iwfafk*_gcl_au*MTU4ODY1NjcyMC4xNzkxMjI0MTY0*_ga*MjA4NTQ3MDE3NC4xNzkxMjI0MTY2*_ga_Z859HE8Z64*czE3OTEyMjQxNjUkbzEkZzEkdDE3OTEyMjkyNDIkajUkbDAkaDExNzAxNTM3OTY.','2026-10-05 19:42:52','2026-10-05 19:42:52'),
 (5,'home','section_2','main_title','<h2>Video <font color="#ff5757">Learning</font></h2>','2026-10-05 19:50:52','2026-10-05 19:53:06'),
 (6,'home','section_2','description','<p>Ready to improve your FX Trading skillsets? View our catalogue of video content to inspire, educate and motivate you to reach new heights in your Trading journey.</p>','2026-10-05 19:50:52','2026-10-05 19:50:52'),
 (7,'home','section_3','main_title','<h2><b>Innovative Trading</b></h2>','2026-10-05 19:56:23','2026-10-05 19:57:12'),
 (8,'home','section_3','sub_title','To Propel You Toward Success','2026-10-05 19:56:23','2026-10-05 19:56:23'),
 (9,'home','section_3','description','<p>Space Markets offers Traders access to a cutting-edge trading platform to ensure maximum performance when Trading the worldwide markets. Download MT4/MT5 today and sign in with your Space Markets Account to experience the best in FX Trading.</p>','2026-10-05 19:56:23','2026-10-05 19:56:23'),
 (10,'home','section_3','button_text','<p>Trade with <b>Innovation</b></p>','2026-10-05 19:56:23','2026-10-05 19:56:23'),
 (11,'home','section_3','button_link','https://my.spacemarkets.io/auth/register?_gl=1*b0peak*_gcl_au*MTU4ODY1NjcyMC4xNzkxMjI0MTY0*_ga*MjA4NTQ3MDE3NC4xNzkxMjI0MTY2*_ga_Z859HE8Z64*czE3OTEyMjQxNjUkbzEkZzEkdDE3OTEyMzAwNDkkajQwJGwwJGgxMTcwMTUzNzk2','2026-10-05 19:56:23','2026-10-05 19:56:23'),
 (12,'home','section_4','main_title','<h2><font color="#ff5757">Account Types</font></h2>','2026-10-05 20:08:19','2026-10-05 20:08:19'),
 (13,'home','section_4','sub_title','Tailored Options To Suit Your Trading Approach','2026-10-05 20:08:19','2026-10-05 20:08:19'),
 (14,'home','section_4','button_text','<p>Start Trading Now</p>','2026-10-05 20:08:19','2026-10-05 20:08:19'),
 (15,'home','section_4','button_link','https://my.spacemarkets.io/auth/register?_gl=1*1rv6zbi*_gcl_au*MTU4ODY1NjcyMC4xNzkxMjI0MTY0*_ga*MjA4NTQ3MDE3NC4xNzkxMjI0MTY2*_ga_Z859HE8Z64*czE3OTEyMjQxNjUkbzEkZzEkdDE3OTEyMzA4NDMkajUkbDAkaDExNzAxNTM3OTY.','2026-10-05 20:08:19','2026-10-05 20:08:19'),
 (16,'home','section_5','main_title','<h2><b><font color="#ffffff">We Offer You A World of Trading Choices</font><font color="#ff5757">.</font></b></h2><p><br></p>','2026-10-05 20:09:38','2026-10-05 20:09:38'),
 (17,'home','section_5','sub_title','<p>An Array of Endless FX Trading Options</p>','2026-10-05 20:09:38','2026-10-05 20:09:38'),
 (18,'marketplace_forex','section_1','main_title','<p>Forex</p>','2026-10-05 20:12:19','2026-10-05 20:12:19'),
 (19,'marketplace_forex','section_1','description','<p>Trade with ease on the world''s largest and most liquid financial market.</p>','2026-10-05 20:12:19','2026-10-05 20:12:19'),
 (20,'home','section_6','main_title','<h2>What the Innovators Say<font color="#ff5757">.</font></h2><p><br></p>','2026-10-05 20:13:55','2026-10-05 20:13:55'),
 (21,'layout_part_pre_footer','section_1','main_title','<h3>It''s Time to Trade the Space Markets Way.</h3>','2026-10-05 20:20:20','2026-10-05 20:20:37'),
 (22,'layout_part_pre_footer','section_1','sub_title','<h4>Join the Interstellar FX Revolution</h4>','2026-10-05 20:20:20','2026-10-05 20:20:37'),
 (23,'layout_part_pre_footer','section_1','button_text','<p>Register For Free</p>','2026-10-05 20:20:20','2026-10-05 20:20:20'),
 (24,'layout_part_pre_footer','section_1','button_link','https://my.spacemarkets.io/auth/register','2026-10-05 20:20:20','2026-10-05 20:20:20'),
 (25,'layout_part_footer','section_1','about_description','Space Markets (Pty) Ltd is an FSCA registered and regulated financial services provider with FSP #53183','2026-10-05 20:23:43','2026-10-05 20:24:28'),
 (26,'layout_part_footer','section_2','risk_disclosure_and_warning_notice','<b style=""><font color="#f12633">Risk Disclosure and Warning Notice:</font></b> Trading forex and CFD''s on margin carries a high level of risk, and may not be suitable for all investors. The high degree of leverage can work against you as well as for you. Before deciding to trade forex and CFD''s you should carefully consider your investment objectives, level of experience, and risk appetite. The possibility exists that you could sustain a loss of some or all of your initial investment and therefore you should not invest money that you cannot afford to lose. You should be aware of all the risks associated with forex and CFD trading, and seek advice from an independent financial advisor if you have any doubts.','2026-10-05 20:27:42','2026-10-05 20:29:11'),
 (27,'layout_part_footer','section_2','disclaimer','<div class="description risk_disclosure_and_warning_notice"><p></p></div>
                        <div class="description disclaimer"><p><b><font color="#f12633">Disclaimer:</font></b> Kindly note that Space Markets (Pty) Ltd does not offer services to US investors. Additionally, under no condition is scalping permissible.</p></div>','2026-10-05 20:27:42','2026-10-05 20:29:11'),
 (28,'layout_part_footer','section_2','legal_and_regulation','<b>LEGAL AND REGULATION:</b> Space Markets (Pty) Ltd is incorporated in South Africa with registration number <font color="#f12633">2023 / 651612 / 07</font> . Space Markets (PTY) LTD is an Authorized Financial Services Provider with the FSCA: FSP53183.','2026-10-05 20:27:42','2026-10-05 20:29:11'),
 (29,'layout_part_footer','section_2','registered_address','Registered address:&nbsp;<a href="https://maps.app.goo.gl/oKwv578yqVeHgU8VA" class="text-decoration-none" target="_blank" style="font-family: Montserrat, sans-serif; font-size: 20px; line-height: 28px;"><span style="color: rgb(241, 38, 51); font-family: var(--var-mont); font-size: 14px; line-height: 28px;">5th Floor Sasol Place, 50 Katherine Street, Wierda Valley, Sandton, Gauteng, South Africa, 2196</span></a>','2026-10-05 20:27:42','2026-10-05 20:29:11');
INSERT INTO "learning_videos" ("id","title","video_key","thumbnail","embed_url","video_link","deleted_at","created_at","updated_at") VALUES (1,'Can Trading Algorithms REALLY Make You Money? The Truth About Algo Trading','co-hkaK4x1w','https://img.youtube.com/vi/co-hkaK4x1w/maxresdefault.jpg','https://www.youtube.com/embed/co-hkaK4x1w','https://www.youtube.com/embed/co-hkaK4x1w',NULL,'2026-10-05 19:44:41','2026-10-05 19:44:41'),
 (2,'The Invisible Forex Market: Liquidity, Order Blocks & Price Action Explained | Smart Money Trading','dHQFQa4fFYM','https://img.youtube.com/vi/dHQFQa4fFYM/maxresdefault.jpg','https://www.youtube.com/embed/dHQFQa4fFYM','https://www.youtube.com/embed/dHQFQa4fFYM',NULL,'2026-10-05 19:45:30','2026-10-05 19:45:30'),
 (3,'Level Up: The Trader You’re Becoming | Master the Forex Mindset','XG7hV6KmY3o','https://img.youtube.com/vi/XG7hV6KmY3o/maxresdefault.jpg','https://www.youtube.com/embed/XG7hV6KmY3o','https://www.youtube.com/embed/XG7hV6KmY3o',NULL,'2026-10-05 19:46:23','2026-10-05 19:46:23'),
 (4,'How to Trade Forex from Anywhere: 5 Key Tips for Digital Nomads | Space Markets','5IiVyaQV6D0','https://img.youtube.com/vi/5IiVyaQV6D0/maxresdefault.jpg','https://www.youtube.com/embed/5IiVyaQV6D0','https://www.youtube.com/embed/5IiVyaQV6D0',NULL,'2026-10-05 19:47:02','2026-10-05 19:47:02'),
 (5,'How to Navigate the Changing FX Trading Landscape with AI | Space Markets','tNMyzLcYGQY','https://img.youtube.com/vi/tNMyzLcYGQY/maxresdefault.jpg','https://www.youtube.com/embed/tNMyzLcYGQY','https://www.youtube.com/embed/tNMyzLcYGQY',NULL,'2026-10-05 19:49:09','2026-10-05 19:49:09'),
 (6,'Sniper Entries & Exits: Master Precision Trading Like a Pro!','Rdpy6hOikEs','https://img.youtube.com/vi/Rdpy6hOikEs/maxresdefault.jpg','https://www.youtube.com/embed/Rdpy6hOikEs','https://www.youtube.com/embed/Rdpy6hOikEs',NULL,'2026-10-05 19:49:47','2026-10-05 19:49:47');
INSERT INTO "migrations" ("id","migration","batch") VALUES (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2019_08_19_000000_create_failed_jobs_table',1),
 (4,'2019_12_14_000001_create_personal_access_tokens_table',1),
 (5,'2023_01_10_083550_create_permission_tables',1),
 (6,'2023_01_16_121322_create_menus_table',1),
 (7,'2024_05_22_153605_create_settings_table',1),
 (8,'2024_05_22_183159_create_cms_table',1),
 (9,'2024_06_05_042715_create_departments_table',1),
 (10,'2024_06_05_080448_create_user_requests_table',1),
 (11,'2024_06_05_142128_create_data_lists_table',1),
 (12,'2024_06_05_144121_create_account_types_table',1),
 (13,'2024_06_05_145933_create_trading_options_table',1),
 (14,'2024_06_05_151848_create_testimonials_table',1),
 (15,'2024_06_05_152804_create_learning_videos_table',1),
 (16,'2024_06_05_155005_create_legal_documents_table',1),
 (17,'2024_06_05_160010_create_payment_methods_table',1),
 (18,'2024_06_05_172016_create_blogs_table',1),
 (19,'2024_06_06_214516_create_faqs_table',1),
 (20,'2024_06_06_221721_create_white_labels_table',1),
 (21,'2024_06_07_220223_create_oauth_tokens_table',1);
INSERT INTO "model_has_roles" ("role_id","model_type","model_id") VALUES (1,'App\Models\User',1);
INSERT INTO "roles" ("id","name","guard_name","created_at","updated_at") VALUES (1,'Super-Admin','web',NULL,NULL);
INSERT INTO "testimonials" ("id","title","description","deleted_at","created_at","updated_at") VALUES (1,'Pretty T.','10/10 Love this broker',NULL,'2026-10-05 20:14:57','2026-10-05 20:14:57'),
 (2,'Tumelo M.','Innovative broker with unique offerings.',NULL,'2026-10-05 20:15:23','2026-10-05 20:15:23'),
 (3,'Dana B.','Nothing better than the sniper account, trade entries are extremely precise.',NULL,'2026-10-05 20:16:19','2026-10-05 20:16:19');
INSERT INTO "users" ("id","name","email","email_verified_at","password","remember_token","created_at","updated_at") VALUES (1,'super-admin','super-admin@yopmail.com',NULL,'$2y$10$TIvS3y9QMO.jN4V8vGkBWunvAqraa5IwIh3uS/12WD7Yoh7Z.c/OG',NULL,'2026-10-05 17:48:53','2026-10-05 17:48:53');
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs" ("uuid");
CREATE INDEX "model_has_permissions_model_id_model_type_index" on "model_has_permissions" ("model_id", "model_type");
CREATE INDEX "model_has_roles_model_id_model_type_index" on "model_has_roles" ("model_id", "model_type");
CREATE INDEX "password_resets_email_index" on "password_resets" ("email");
CREATE UNIQUE INDEX "permissions_name_guard_name_unique" on "permissions" ("name", "guard_name");
CREATE UNIQUE INDEX "personal_access_tokens_token_unique" on "personal_access_tokens" ("token");
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" on "personal_access_tokens" ("tokenable_type", "tokenable_id");
CREATE UNIQUE INDEX "roles_name_guard_name_unique" on "roles" ("name", "guard_name");
CREATE UNIQUE INDEX "users_email_unique" on "users" ("email");
COMMIT;
