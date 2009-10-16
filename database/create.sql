/* SQLEditor (MySQL)*/


CREATE TABLE `email_queue`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`to_address` VARCHAR(255),
`from_address` VARCHAR(255),
`subject` TEXT,
`body` TEXT,
`html` TEXT,
`high_priority_flag` BOOLEAN,
`error_flag` BOOLEAN,
`error_message` VARCHAR(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `registry`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(80) NOT NULL UNIQUE,
`value` TEXT,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `topic_link_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `forum`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`order_number` INTEGER,
`name` VARCHAR(100) NOT NULL,
`announce_only_flag` BOOLEAN,
`description` VARCHAR(200),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `counter`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`filename` VARCHAR(100),
`token` VARCHAR(100) UNIQUE,
`counter` INTEGER,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `_version`
(
`version` VARCHAR(50)
);



CREATE TABLE `issue_status_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(60) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `person_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `wiki_item_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `image_file_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue_priority_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(60) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue_resolution_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(60) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `timezone`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50) UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `country`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255),
`code` VARCHAR(2) UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `package_category`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`parent_package_category_id` INTEGER unsigned,
`token` VARCHAR(80) NOT NULL UNIQUE,
`order_number` INTEGER,
`name` VARCHAR(255),
`description` TEXT,
`package_count` INTEGER unsigned,
`last_post_date` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `person`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`person_type_id` INTEGER unsigned  NOT NULL,
`username` VARCHAR(20) NOT NULL UNIQUE,
`password` VARCHAR(100),
`first_name` VARCHAR(100) NOT NULL,
`last_name` VARCHAR(100) NOT NULL,
`email` VARCHAR(150) NOT NULL UNIQUE,
`display_name` VARCHAR(255),
`password_reset_flag` BOOLEAN,
`display_real_name_flag` BOOLEAN,
`display_email_flag` BOOLEAN,
`opt_in_flag` BOOLEAN,
`donated_flag` BOOLEAN,
`location` VARCHAR(100),
`country_id` INTEGER unsigned,
`url` VARCHAR(100),
`timezone_id` INTEGER unsigned,
`registration_date` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `showcase_item`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`image_file_type_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
`name` VARCHAR(255),
`description` TEXT,
`url` VARCHAR(255),
`live_flag` BOOLEAN NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `login_ticket`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`person_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue_field`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255),
`token` VARCHAR(50) NOT NULL UNIQUE,
`order_number` INTEGER unsigned,
`required_flag` BOOLEAN,
`mutable_flag` BOOLEAN,
`active_flag` BOOLEAN,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue_field_option`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`issue_field_id` INTEGER unsigned  NOT NULL,
`name` VARCHAR(255) NOT NULL,
`token` VARCHAR(255) NOT NULL,
`order_number` INTEGER unsigned,
`active_flag` BOOLEAN,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`issue_priority_type_id` INTEGER unsigned  NOT NULL,
`issue_status_type_id` INTEGER unsigned  NOT NULL,
`issue_resolution_type_id` INTEGER unsigned,
`title` VARCHAR(255),
`example_code` TEXT,
`example_template` TEXT,
`example_data` TEXT,
`expected_output` TEXT,
`actual_output` TEXT,
`posted_by_person_id` INTEGER unsigned  NOT NULL,
`assigned_to_person_id` INTEGER unsigned,
`post_date` DATETIME NOT NULL,
`assigned_date` DATETIME,
`due_date` DATETIME,
`vote_count` INTEGER unsigned,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue_vote`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`issue_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
`vote_date` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue_field_value`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`issue_id` INTEGER unsigned  NOT NULL,
`issue_field_id` INTEGER unsigned  NOT NULL,
`issue_field_option_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `package`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`package_category_id` INTEGER unsigned  NOT NULL,
`token` VARCHAR(80) NOT NULL UNIQUE,
`name` VARCHAR(255),
`description` TEXT,
`last_post_date` DATETIME,
`last_posted_by_person_id` INTEGER unsigned,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `package_contribution`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`package_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
`current_package_version_id` INTEGER unsigned,
`current_post_date` DATETIME,
`download_count` INTEGER unsigned,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `package_version`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`package_contribution_id` INTEGER unsigned  NOT NULL,
`version_number` INTEGER unsigned  NOT NULL,
`notes` TEXT,
`qcodo_version` VARCHAR(40),
`new_file_count` INTEGER unsigned,
`changed_file_count` INTEGER unsigned,
`post_date` DATETIME,
`download_count` INTEGER unsigned,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `topic`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`topic_link_id` INTEGER unsigned  NOT NULL,
`name` VARCHAR(200),
`person_id` INTEGER unsigned,
`last_post_date` DATETIME,
`message_count` INTEGER unsigned,
`view_count` INTEGER unsigned,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `email_topic_person_assn`
(
`topic_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`topic_id`,`person_id`)
) ENGINE=InnoDB;



CREATE TABLE `read_topic_person_assn`
(
`topic_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`topic_id`,`person_id`)
) ENGINE=InnoDB;



CREATE TABLE `read_once_topic_person_assn`
(
`topic_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`topic_id`,`person_id`)
) ENGINE=InnoDB;



CREATE TABLE `message`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`topic_id` INTEGER unsigned  NOT NULL,
`topic_link_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned,
`message` TEXT,
`compiled_html` TEXT,
`reply_number` INTEGER unsigned  NOT NULL,
`post_date` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `wiki_page`
(
`wiki_version_id` INTEGER unsigned  NOT NULL,
`content` TEXT,
`compiled_html` TEXT,
`view_count` INTEGER unsigned,
PRIMARY KEY (`wiki_version_id`)
) ENGINE=InnoDB;



CREATE TABLE `wiki_item`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`path` VARCHAR(200) NOT NULL,
`wiki_item_type_id` INTEGER unsigned  NOT NULL,
`editor_minimum_person_type_id` INTEGER unsigned  NOT NULL,
`override_navbar_index` INTEGER unsigned,
`override_subnav_index` INTEGER unsigned,
`current_wiki_version_id` INTEGER unsigned  UNIQUE,
`current_name` VARCHAR(200),
`current_posted_by_person_id` INTEGER unsigned,
`current_post_date` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `topic_link`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`topic_link_type_id` INTEGER unsigned  NOT NULL,
`topic_count` INTEGER unsigned,
`message_count` INTEGER unsigned,
`last_post_date` DATETIME,
`forum_id` INTEGER unsigned  UNIQUE,
`issue_id` INTEGER unsigned  UNIQUE,
`wiki_item_id` INTEGER unsigned  UNIQUE,
`package_id` INTEGER unsigned  UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `wiki_version`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`wiki_item_id` INTEGER unsigned  NOT NULL,
`version_number` INTEGER unsigned  NOT NULL,
`name` VARCHAR(200),
`posted_by_person_id` INTEGER unsigned  NOT NULL,
`post_date` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `wiki_file`
(
`wiki_version_id` INTEGER unsigned  NOT NULL,
`file_name` VARCHAR(255),
`file_size` INTEGER unsigned,
`file_mime` VARCHAR(100),
`description` TEXT,
`download_count` INTEGER unsigned,
PRIMARY KEY (`wiki_version_id`)
) ENGINE=InnoDB;



CREATE TABLE `wiki_image`
(
`wiki_version_id` INTEGER unsigned  NOT NULL,
`image_file_type_id` INTEGER unsigned  NOT NULL,
`width` INTEGER,
`height` INTEGER,
`description` TEXT,
PRIMARY KEY (`wiki_version_id`)
) ENGINE=InnoDB;


CREATE INDEX `email_queue_high_priority_flag_idx`  ON `email_queue`(`high_priority_flag`);
CREATE INDEX `email_queue_error_flag_idx`  ON `email_queue`(`error_flag`);
CREATE INDEX `package_category_parent_package_category_id_idx`  ON `package_category`(`parent_package_category_id`);
ALTER TABLE `package_category` ADD FOREIGN KEY parent_package_category_id_idxfk(`parent_package_category_id`) REFERENCES `package_category`(`id`);
CREATE INDEX `person_type_id_idx`  ON `person`(`person_type_id`);
ALTER TABLE `person` ADD FOREIGN KEY person_type_id_idxfk(`person_type_id`) REFERENCES `person_type`(`id`);
ALTER TABLE `person` ADD FOREIGN KEY country_id_idxfk(`country_id`) REFERENCES `country`(`id`);
ALTER TABLE `person` ADD FOREIGN KEY timezone_id_idxfk(`timezone_id`) REFERENCES `timezone`(`id`);
CREATE INDEX `showcase_item_image_file_type_id_idx`  ON `showcase_item`(`image_file_type_id`);
ALTER TABLE `showcase_item` ADD FOREIGN KEY image_file_type_id_idxfk(`image_file_type_id`) REFERENCES `image_file_type`(`id`);
CREATE INDEX `showcase_item_person_id_idx`  ON `showcase_item`(`person_id`);
ALTER TABLE `showcase_item` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `showcase_item_live_flag_idx`  ON `showcase_item`(`live_flag`);
CREATE INDEX `login_ticket_person_id_idx`  ON `login_ticket`(`person_id`);
ALTER TABLE `login_ticket` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `issue_field_active_flag_idx`  ON `issue_field`(`active_flag`);
CREATE INDEX `issue_field_option_issue_field_id_idx`  ON `issue_field_option`(`issue_field_id`);
ALTER TABLE `issue_field_option` ADD FOREIGN KEY issue_field_id_idxfk(`issue_field_id`) REFERENCES `issue_field`(`id`);
CREATE UNIQUE INDEX `issue_field_option_idx` ON `issue_field_option` (`issue_field_id`,`token`);
CREATE INDEX `issue_field_option_idx_1` ON `issue_field_option` (`issue_field_id`,`active_flag`);
CREATE INDEX `issue_priority_type_id_idx`  ON `issue`(`issue_priority_type_id`);
ALTER TABLE `issue` ADD FOREIGN KEY issue_priority_type_id_idxfk(`issue_priority_type_id`) REFERENCES `issue_priority_type`(`id`);
CREATE INDEX `issue_status_type_id_idx`  ON `issue`(`issue_status_type_id`);
ALTER TABLE `issue` ADD FOREIGN KEY issue_status_type_id_idxfk(`issue_status_type_id`) REFERENCES `issue_status_type`(`id`);
CREATE INDEX `issue_resolution_type_id_idx`  ON `issue`(`issue_resolution_type_id`);
ALTER TABLE `issue` ADD FOREIGN KEY issue_resolution_type_id_idxfk(`issue_resolution_type_id`) REFERENCES `issue_resolution_type`(`id`);
CREATE INDEX `issue_posted_by_person_id_idx`  ON `issue`(`posted_by_person_id`);
ALTER TABLE `issue` ADD FOREIGN KEY posted_by_person_id_idxfk(`posted_by_person_id`) REFERENCES `person`(`id`);
CREATE INDEX `issue_assigned_to_person_id_idx`  ON `issue`(`assigned_to_person_id`);
ALTER TABLE `issue` ADD FOREIGN KEY assigned_to_person_id_idxfk(`assigned_to_person_id`) REFERENCES `person`(`id`);
CREATE INDEX `issue_due_date_idx`  ON `issue`(`due_date`);
CREATE INDEX `issue_vote_issue_id_idx`  ON `issue_vote`(`issue_id`);
ALTER TABLE `issue_vote` ADD FOREIGN KEY issue_id_idxfk(`issue_id`) REFERENCES `issue`(`id`);
CREATE INDEX `issue_vote_person_id_idx`  ON `issue_vote`(`person_id`);
ALTER TABLE `issue_vote` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE UNIQUE INDEX `issue_vote_idx` ON `issue_vote` (`issue_id`,`person_id`);
CREATE INDEX `issue_field_value_issue_id_idx`  ON `issue_field_value`(`issue_id`);
ALTER TABLE `issue_field_value` ADD FOREIGN KEY issue_id_idxfk(`issue_id`) REFERENCES `issue`(`id`);
CREATE INDEX `issue_field_value_issue_field_id_idx`  ON `issue_field_value`(`issue_field_id`);
ALTER TABLE `issue_field_value` ADD FOREIGN KEY issue_field_id_idxfk(`issue_field_id`) REFERENCES `issue_field`(`id`);
CREATE INDEX `issue_field_value_issue_field_option_id_idx`  ON `issue_field_value`(`issue_field_option_id`);
ALTER TABLE `issue_field_value` ADD FOREIGN KEY issue_field_option_id_idxfk(`issue_field_option_id`) REFERENCES `issue_field_option`(`id`);
CREATE UNIQUE INDEX `issue_field_value_idx` ON `issue_field_value` (`issue_id`,`issue_field_id`);
CREATE INDEX `package_category_id_idx`  ON `package`(`package_category_id`);
ALTER TABLE `package` ADD FOREIGN KEY package_category_id_idxfk(`package_category_id`) REFERENCES `package_category`(`id`);
CREATE INDEX `package_last_posted_by_person_id_idx`  ON `package`(`last_posted_by_person_id`);
ALTER TABLE `package` ADD FOREIGN KEY last_posted_by_person_id_idxfk(`last_posted_by_person_id`) REFERENCES `person`(`id`);
CREATE INDEX `package_contribution_package_id_idx`  ON `package_contribution`(`package_id`);
ALTER TABLE `package_contribution` ADD FOREIGN KEY package_id_idxfk(`package_id`) REFERENCES `package`(`id`);
CREATE INDEX `package_contribution_person_id_idx`  ON `package_contribution`(`person_id`);
ALTER TABLE `package_contribution` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
ALTER TABLE `package_contribution` ADD FOREIGN KEY current_package_version_id_idxfk(`current_package_version_id`) REFERENCES `package_version`(`id`);
CREATE UNIQUE INDEX `package_contribution_idx` ON `package_contribution` (`package_id`,`person_id`);
CREATE INDEX `package_version_package_contribution_id_idx`  ON `package_version`(`package_contribution_id`);
ALTER TABLE `package_version` ADD FOREIGN KEY package_contribution_id_idxfk(`package_contribution_id`) REFERENCES `package_contribution`(`id`);
CREATE UNIQUE INDEX `package_version_idx` ON `package_version` (`package_contribution_id`,`version_number`);
CREATE INDEX `topic_link_id_idx`  ON `topic`(`topic_link_id`);
ALTER TABLE `topic` ADD FOREIGN KEY topic_link_id_idxfk(`topic_link_id`) REFERENCES `topic_link`(`id`);
CREATE INDEX `topic_person_id_idx`  ON `topic`(`person_id`);
ALTER TABLE `topic` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `email_topic_person_assn_topic_id_idxfk`  ON `email_topic_person_assn`(`topic_id`);
ALTER TABLE `email_topic_person_assn` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `email_topic_person_assn_person_id_idxfk`  ON `email_topic_person_assn`(`person_id`);
ALTER TABLE `email_topic_person_assn` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `read_topic_person_assn_topic_id_idxfk`  ON `read_topic_person_assn`(`topic_id`);
ALTER TABLE `read_topic_person_assn` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `read_topic_person_assn_person_id_idxfk`  ON `read_topic_person_assn`(`person_id`);
ALTER TABLE `read_topic_person_assn` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `read_once_topic_person_assn_topic_id_idxfk`  ON `read_once_topic_person_assn`(`topic_id`);
ALTER TABLE `read_once_topic_person_assn` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `read_once_topic_person_assn_person_id_idxfk`  ON `read_once_topic_person_assn`(`person_id`);
ALTER TABLE `read_once_topic_person_assn` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `message_topic_id_idx`  ON `message`(`topic_id`);
ALTER TABLE `message` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `message_topic_link_id_idx`  ON `message`(`topic_link_id`);
ALTER TABLE `message` ADD FOREIGN KEY topic_link_id_idxfk(`topic_link_id`) REFERENCES `topic_link`(`id`);
CREATE INDEX `message_person_id_idx`  ON `message`(`person_id`);
ALTER TABLE `message` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `wiki_page_wiki_version_id_idxfk`  ON `wiki_page`(`wiki_version_id`);
ALTER TABLE `wiki_page` ADD FOREIGN KEY wiki_version_id_idxfk(`wiki_version_id`) REFERENCES `wiki_version`(`id`);
CREATE INDEX `wiki_item_type_id_idx`  ON `wiki_item`(`wiki_item_type_id`);
ALTER TABLE `wiki_item` ADD FOREIGN KEY wiki_item_type_id_idxfk(`wiki_item_type_id`) REFERENCES `wiki_item_type`(`id`);
CREATE INDEX `wiki_item_editor_minimum_person_type_id_idx`  ON `wiki_item`(`editor_minimum_person_type_id`);
ALTER TABLE `wiki_item` ADD FOREIGN KEY editor_minimum_person_type_id_idxfk(`editor_minimum_person_type_id`) REFERENCES `person_type`(`id`);
CREATE INDEX `wiki_item_current_wiki_version_id_idxfk`  ON `wiki_item`(`current_wiki_version_id`);
ALTER TABLE `wiki_item` ADD FOREIGN KEY current_wiki_version_id_idxfk(`current_wiki_version_id`) REFERENCES `wiki_version`(`id`);
CREATE INDEX `wiki_item_current_posted_by_person_id_idx`  ON `wiki_item`(`current_posted_by_person_id`);
ALTER TABLE `wiki_item` ADD FOREIGN KEY current_posted_by_person_id_idxfk(`current_posted_by_person_id`) REFERENCES `person`(`id`);
CREATE UNIQUE INDEX `wiki_item_idx` ON `wiki_item` (`path`,`wiki_item_type_id`);
CREATE INDEX `topic_link_type_id_idx`  ON `topic_link`(`topic_link_type_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY topic_link_type_id_idxfk(`topic_link_type_id`) REFERENCES `topic_link_type`(`id`);
CREATE INDEX `topic_link_forum_id_idxfk`  ON `topic_link`(`forum_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY forum_id_idxfk(`forum_id`) REFERENCES `forum`(`id`);
CREATE INDEX `topic_link_issue_id_idxfk`  ON `topic_link`(`issue_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY issue_id_idxfk(`issue_id`) REFERENCES `issue`(`id`);
CREATE INDEX `topic_link_wiki_item_id_idxfk`  ON `topic_link`(`wiki_item_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY wiki_item_id_idxfk(`wiki_item_id`) REFERENCES `wiki_item`(`id`);
CREATE INDEX `topic_link_package_id_idxfk`  ON `topic_link`(`package_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY package_id_idxfk(`package_id`) REFERENCES `package`(`id`);
CREATE INDEX `wiki_version_wiki_item_id_idx`  ON `wiki_version`(`wiki_item_id`);
ALTER TABLE `wiki_version` ADD FOREIGN KEY wiki_item_id_idxfk(`wiki_item_id`) REFERENCES `wiki_item`(`id`);
CREATE INDEX `wiki_version_posted_by_person_id_idx`  ON `wiki_version`(`posted_by_person_id`);
ALTER TABLE `wiki_version` ADD FOREIGN KEY posted_by_person_id_idxfk(`posted_by_person_id`) REFERENCES `person`(`id`);
CREATE UNIQUE INDEX `wiki_version_idx` ON `wiki_version` (`wiki_item_id`,`version_number`);
CREATE INDEX `wiki_file_wiki_version_id_idxfk`  ON `wiki_file`(`wiki_version_id`);
ALTER TABLE `wiki_file` ADD FOREIGN KEY wiki_version_id_idxfk(`wiki_version_id`) REFERENCES `wiki_version`(`id`);
CREATE INDEX `wiki_image_wiki_version_id_idxfk`  ON `wiki_image`(`wiki_version_id`);
ALTER TABLE `wiki_image` ADD FOREIGN KEY wiki_version_id_idxfk(`wiki_version_id`) REFERENCES `wiki_version`(`id`);
CREATE INDEX `wiki_image_image_file_type_id_idx`  ON `wiki_image`(`image_file_type_id`);
ALTER TABLE `wiki_image` ADD FOREIGN KEY image_file_type_id_idxfk(`image_file_type_id`) REFERENCES `image_file_type`(`id`);
