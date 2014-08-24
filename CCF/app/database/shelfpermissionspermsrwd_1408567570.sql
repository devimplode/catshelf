# ---> up

ALTER TABLE `shelf_permissions`
ADD COLUMN `perm_read`  tinyint(1) NOT NULL AFTER `user_id`,
ADD COLUMN `perm_write`  tinyint(1) NOT NULL AFTER `perm_read`,
ADD COLUMN `perm_download`  tinyint(1) NOT NULL AFTER `perm_write`;

# ---> down

ALTER TABLE `shelf_permissions`
DROP COLUMN `perm_read`,
DROP COLUMN `perm_write`,
DROP COLUMN `perm_download`;