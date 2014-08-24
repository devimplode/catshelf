# ---> up

ALTER TABLE `shelf_base`
MODIFY COLUMN `type`  enum('conversation','chat','poll','file','file_document_text','file_document_table','file_document_list','file_music','file_image','file_video','file_collection','file_collection_music') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL AFTER `id`,
ADD COLUMN `contributionscount`  int(11) NOT NULL DEFAULT 0 AFTER `contributors`,
ADD COLUMN `starcount`  int(11) NOT NULL DEFAULT 0 AFTER `contributionscount`,
ADD COLUMN `hide`  tinyint(1) NOT NULL DEFAULT 0 AFTER `starcount`,
ADD COLUMN `deleted_by`  int(11) NOT NULL AFTER `deleted`,
ADD COLUMN `deleted_at`  int(11) NOT NULL AFTER `deleted_by`;

# ---> down

ALTER TABLE `shelf_base`
MODIFY COLUMN `type`  enum('conversation','chat','poll','file','file_music','file_image','file_video') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL AFTER `id`,
DROP COLUMN `contributionscount`,
DROP COLUMN `starcount`,
DROP COLUMN `hide`,
DROP COLUMN `deleted_by`,
DROP COLUMN `deleted_at`;

