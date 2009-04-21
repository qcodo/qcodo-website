INSERT INTO forum VALUES (1,1,'Official Announcements',1,'This is an announcement-only forum for official Qcodo announcements, releases, etc.',NULL);
INSERT INTO forum VALUES (2,2,'General Discussion',0,'Forum for any topic of interest to the Qcodo community, including questions about the framework itself.',NULL);
INSERT INTO forum VALUES (3,3,'Bugs and Issues',0,'This forum is specific to reporting bugs and issues with the framework.',NULL);
INSERT INTO forum VALUES (4,4,'Feature Requests',0,'Forum discussing feature requests for the framework.',NULL);

INSERT INTO person_type VALUES (1,'Administrator');
INSERT INTO person_type VALUES (2,'Moderator');
INSERT INTO person_type VALUES (3,'Contributor');
INSERT INTO person_type VALUES (4,'Forums User');

INSERT INTO `download_category` VALUES
	(1,1,'Official Releases',1,'For Official Qcodo Releases','For the latest DEVELOPMENT snapshot, please go to the <a href=\"/support/\" class=\"link_body\">Support</a> page.',null),
	(2,2,'Qform Controls',0,'For Community-Contributed Qform Classes','Custom Qform class files are typically installed in wwwroot/includes/qform, inside qform_objects',null),
	(3,4,'Other',0,'For other Community-Contributed classes, utilities, and code-snippets','',null),
	(4,3,'Language Files',0,'A place to share language files and language file updates for Internationalized Qcodo.','These are files that should be placed within the core at /includes/qcodo/i18n.  As files are uploaded and perfected, and as authors grant permission, we will put them into the core in future releases.',null);

INSERT INTO article_section VALUES(1,'Getting Started');
INSERT INTO article_section VALUES(2,'Harnessing the Power of Qcodo');
INSERT INTO article_section VALUES(3,'Advanced Topics');
