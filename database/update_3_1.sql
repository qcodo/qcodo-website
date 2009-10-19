UPDATE _version SET version='3.1';

ALTER TABLE package_version ADD COLUMN `changed_file_count` INTEGER unsigned AFTER notes;
ALTER TABLE package_version ADD COLUMN `new_file_count` INTEGER unsigned AFTER notes;
ALTER TABLE package_version ADD COLUMN `qcodo_version` VARCHAR(40) AFTER notes;
