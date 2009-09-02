/* SQLEditor (MySQL)*/


CREATE TABLE `article_section`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `topic_link_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(40) NOT NULL UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `issue_status_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(60) NOT NULL UNIQUE,
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



CREATE TABLE `country`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255),
`code` VARCHAR(2) UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `announcement`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`announcement` TEXT,
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



CREATE TABLE `timezone`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50) UNIQUE,
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



CREATE TABLE `download_category`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`order_number` INTEGER,
`name` VARCHAR(100) NOT NULL,
`announce_only_flag` BOOLEAN,
`description` VARCHAR(200),
`note` VARCHAR(200),
`last_post_date` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `person_type`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL UNIQUE,
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



CREATE TABLE `login_ticket`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`person_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `download`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`parent_download_id` INTEGER unsigned,
`download_category_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
`name` VARCHAR(200) NOT NULL,
`version` VARCHAR(40),
`description` TEXT,
`filename` VARCHAR(100),
`download_count` INTEGER,
`post_date` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `article`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`article_section_id` INTEGER unsigned  NOT NULL,
`title` VARCHAR(200) NOT NULL,
`description` TEXT,
`byline` VARCHAR(200),
`article` TEXT,
`post_date` DATETIME,
`last_updated_date` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



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



CREATE TABLE `issue`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`issue_status_type_id` INTEGER unsigned  NOT NULL,
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



CREATE TABLE `issue_field_value`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`issue_id` INTEGER unsigned  NOT NULL,
`issue_field_id` INTEGER unsigned  NOT NULL,
`issue_field_option_id` INTEGER unsigned  NOT NULL,
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



CREATE TABLE `topic_link`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`topic_link_type_id` INTEGER unsigned  NOT NULL,
`topic_count` INTEGER unsigned,
`message_count` INTEGER unsigned,
`last_post_date` DATETIME,
`forum_id` INTEGER unsigned  UNIQUE,
`issue_id` INTEGER unsigned  UNIQUE,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `topic`
(
`id` INTEGER unsigned  NOT NULL AUTO_INCREMENT,
`topic_link_id` INTEGER unsigned  NOT NULL,
`name` VARCHAR(200),
`person_id` INTEGER unsigned,
`last_post_date` DATETIME NOT NULL,
`message_count` INTEGER unsigned,
`view_count` INTEGER unsigned,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `read_once_topic_person_assn`
(
`topic_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`topic_id`,`person_id`)
) ENGINE=InnoDB;



CREATE TABLE `email_topic_person_assn`
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
`reply_number` INTEGER unsigned,
`post_date` DATETIME NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `read_topic_person_assn`
(
`topic_id` INTEGER unsigned  NOT NULL,
`person_id` INTEGER unsigned  NOT NULL,
PRIMARY KEY (`topic_id`,`person_id`)
) ENGINE=InnoDB;


CREATE INDEX `issue_field_option_issue_field_id_idx`  ON `issue_field_option`(`issue_field_id`);
ALTER TABLE `issue_field_option` ADD FOREIGN KEY issue_field_id_idxfk(`issue_field_id`) REFERENCES `issue_field`(`id`);
CREATE UNIQUE INDEX `issue_field_option_idx` ON `issue_field_option` (`issue_field_id`,`token`);
CREATE INDEX `person_type_id_idx`  ON `person`(`person_type_id`);
ALTER TABLE `person` ADD FOREIGN KEY person_type_id_idxfk(`person_type_id`) REFERENCES `person_type`(`id`);
ALTER TABLE `person` ADD FOREIGN KEY country_id_idxfk(`country_id`) REFERENCES `country`(`id`);
ALTER TABLE `person` ADD FOREIGN KEY timezone_id_idxfk(`timezone_id`) REFERENCES `timezone`(`id`);
CREATE INDEX `login_ticket_person_id_idx`  ON `login_ticket`(`person_id`);
ALTER TABLE `login_ticket` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `download_parent_download_id_idx`  ON `download`(`parent_download_id`);
ALTER TABLE `download` ADD FOREIGN KEY parent_download_id_idxfk(`parent_download_id`) REFERENCES `download`(`id`);
CREATE INDEX `download_category_id_idx`  ON `download`(`download_category_id`);
ALTER TABLE `download` ADD FOREIGN KEY download_category_id_idxfk(`download_category_id`) REFERENCES `download_category`(`id`);
CREATE INDEX `download_person_id_idx`  ON `download`(`person_id`);
ALTER TABLE `download` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `article_section_id_idx`  ON `article`(`article_section_id`);
ALTER TABLE `article` ADD FOREIGN KEY article_section_id_idxfk(`article_section_id`) REFERENCES `article_section`(`id`);
CREATE INDEX `email_queue_high_priority_flag_idx`  ON `email_queue`(`high_priority_flag`);
CREATE INDEX `email_queue_error_flag_idx`  ON `email_queue`(`error_flag`);
CREATE INDEX `issue_status_type_id_idx`  ON `issue`(`issue_status_type_id`);
ALTER TABLE `issue` ADD FOREIGN KEY issue_status_type_id_idxfk(`issue_status_type_id`) REFERENCES `issue_status_type`(`id`);
CREATE INDEX `issue_posted_by_person_id_idx`  ON `issue`(`posted_by_person_id`);
ALTER TABLE `issue` ADD FOREIGN KEY posted_by_person_id_idxfk(`posted_by_person_id`) REFERENCES `person`(`id`);
CREATE INDEX `issue_assigned_to_person_id_idx`  ON `issue`(`assigned_to_person_id`);
ALTER TABLE `issue` ADD FOREIGN KEY assigned_to_person_id_idxfk(`assigned_to_person_id`) REFERENCES `person`(`id`);
CREATE INDEX `issue_due_date_idx`  ON `issue`(`due_date`);
CREATE INDEX `issue_field_value_issue_id_idx`  ON `issue_field_value`(`issue_id`);
ALTER TABLE `issue_field_value` ADD FOREIGN KEY issue_id_idxfk(`issue_id`) REFERENCES `issue`(`id`);
CREATE INDEX `issue_field_value_issue_field_id_idx`  ON `issue_field_value`(`issue_field_id`);
ALTER TABLE `issue_field_value` ADD FOREIGN KEY issue_field_id_idxfk(`issue_field_id`) REFERENCES `issue_field`(`id`);
CREATE INDEX `issue_field_value_issue_field_option_id_idx`  ON `issue_field_value`(`issue_field_option_id`);
ALTER TABLE `issue_field_value` ADD FOREIGN KEY issue_field_option_id_idxfk(`issue_field_option_id`) REFERENCES `issue_field_option`(`id`);
CREATE UNIQUE INDEX `issue_field_value_idx` ON `issue_field_value` (`issue_id`,`issue_field_id`);
CREATE INDEX `issue_vote_issue_id_idx`  ON `issue_vote`(`issue_id`);
ALTER TABLE `issue_vote` ADD FOREIGN KEY issue_id_idxfk(`issue_id`) REFERENCES `issue`(`id`);
CREATE INDEX `issue_vote_person_id_idx`  ON `issue_vote`(`person_id`);
ALTER TABLE `issue_vote` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE UNIQUE INDEX `issue_vote_idx` ON `issue_vote` (`issue_id`,`person_id`);
CREATE INDEX `topic_link_type_id_idx`  ON `topic_link`(`topic_link_type_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY topic_link_type_id_idxfk(`topic_link_type_id`) REFERENCES `topic_link_type`(`id`);
CREATE INDEX `topic_link_forum_id_idxfk`  ON `topic_link`(`forum_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY forum_id_idxfk(`forum_id`) REFERENCES `forum`(`id`);
CREATE INDEX `topic_link_issue_id_idxfk`  ON `topic_link`(`issue_id`);
ALTER TABLE `topic_link` ADD FOREIGN KEY issue_id_idxfk(`issue_id`) REFERENCES `issue`(`id`);
CREATE INDEX `topic_link_id_idx`  ON `topic`(`topic_link_id`);
ALTER TABLE `topic` ADD FOREIGN KEY topic_link_id_idxfk(`topic_link_id`) REFERENCES `topic_link`(`id`);
CREATE INDEX `topic_person_id_idx`  ON `topic`(`person_id`);
ALTER TABLE `topic` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `read_once_topic_person_assn_topic_id_idxfk`  ON `read_once_topic_person_assn`(`topic_id`);
ALTER TABLE `read_once_topic_person_assn` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `read_once_topic_person_assn_person_id_idxfk`  ON `read_once_topic_person_assn`(`person_id`);
ALTER TABLE `read_once_topic_person_assn` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `email_topic_person_assn_topic_id_idxfk`  ON `email_topic_person_assn`(`topic_id`);
ALTER TABLE `email_topic_person_assn` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `email_topic_person_assn_person_id_idxfk`  ON `email_topic_person_assn`(`person_id`);
ALTER TABLE `email_topic_person_assn` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `message_topic_id_idx`  ON `message`(`topic_id`);
ALTER TABLE `message` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `message_topic_link_id_idx`  ON `message`(`topic_link_id`);
ALTER TABLE `message` ADD FOREIGN KEY topic_link_id_idxfk(`topic_link_id`) REFERENCES `topic_link`(`id`);
CREATE INDEX `message_person_id_idx`  ON `message`(`person_id`);
ALTER TABLE `message` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
CREATE INDEX `read_topic_person_assn_topic_id_idxfk`  ON `read_topic_person_assn`(`topic_id`);
ALTER TABLE `read_topic_person_assn` ADD FOREIGN KEY topic_id_idxfk(`topic_id`) REFERENCES `topic`(`id`);
CREATE INDEX `read_topic_person_assn_person_id_idxfk`  ON `read_topic_person_assn`(`person_id`);
ALTER TABLE `read_topic_person_assn` ADD FOREIGN KEY person_id_idxfk(`person_id`) REFERENCES `person`(`id`);
