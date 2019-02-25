升级指南


## v1.0.2 升级到 v1.0.3 指南

1. 下载补丁包  https://github.com/gopeak/masterlab/releases/download/v1.0.3/patch-v1.0.2tov1.0.3.zip ，覆盖代码
2. 在数据库中找到表user_main，删除重复（字段 email 和 username）的用户数据
3. 在数据库中执行以下SQL语句
```sql
SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `issue_description_template` ADD COLUMN `created`  int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间' AFTER `content`;
ALTER TABLE `issue_description_template` ADD COLUMN `updated`  int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间' AFTER `created`;
CREATE TABLE `issue_effect_version` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`issue_id`  int(11) UNSIGNED NULL DEFAULT NULL ,
`version_id`  int(11) UNSIGNED NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
ROW_FORMAT=Compact;
UPDATE `permission` SET `name` = '访问事项列表（已废弃）' WHERE `permission`.`id` = 10005;
DROP INDEX `email` ON `user_main`;
CREATE UNIQUE INDEX `email` ON `user_main`(`email`) USING BTREE ;
DROP INDEX `username` ON `user_main`;
CREATE UNIQUE INDEX `username` ON `user_main`(`username`) USING BTREE ;
SET FOREIGN_KEY_CHECKS=1;
```

4. 修改 app/config/deploy/app.cfg.php MASTERLAB_VERSION 为 1.0.3

5. 清除浏览器缓存
