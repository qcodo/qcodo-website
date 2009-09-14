INSERT INTO topic_link_type VALUES (1, 'Forum');
INSERT INTO topic_link_type VALUES (2, 'Issue');

INSERT INTO person_type VALUES (1,'Administrator');
INSERT INTO person_type VALUES (2,'Moderator');
INSERT INTO person_type VALUES (3,'Contributor');
INSERT INTO person_type VALUES (4,'Registered User');

INSERT INTO person(person_type_id, username, first_name, last_name, email, password, display_real_name_flag, display_email_flag, opt_in_flag, donated_flag, location, country_id, url, registration_date, display_name) VALUES
(1, 'mikeho', 'Mike', 'Ho', 'mike@quasidea.com', '67a1e09bb1f83f5007dc119c14d663aa', 1, 1, 1, 0, 'Sunnyvale, CA', 230, 'http://www.quasidea.com/', '2000-01-01 00:00:00', 'Mike Ho');

INSERT INTO `forum` VALUES 
	(2,2,'General Discussion',0,'Forum for any topic of interest to the Qcodo community, including questions about the framework itself.'),
	(3,3,'Bugs and Issues',0,'This forum is specific to reporting bugs and issues with the framework.'),
	(4,7,'Feature Requests',0,'Forum discussing feature requests for the framework.'),
	(5,1,'Official Blog',1,'This is a blog of current Qcodo and Qcodo website development activities.  Official Qcodo announcements will also be posted here.'),
	(6,6,'Getting Started, Installation and Setup',0,'For questions, issues and topics that specifically deal with getting started with Qcodo (e.g. installation, configuration, subfoldering, etc.)'),
	(7,5,'Examples Site and \"Qcodo Manual\" Project',0,'For anything regarding the <a href=\"http://examples.qcodo.com/\" class=\"link_body\">Examples Site</a> or the <a href=\"http://qcodo.kri-soft.be/\" class=\"link_body\">\"Qcodo Manual\" Project</a>.'),
	(8,5,'QForge and Qcodo Hosting',0,'For anything regarding <a class=\"link_body\" href=\"http://qforge.qcodo.com/\">QForge</a> or <a class=\"link_body\" href=\"http://www.qcodohosting.org/\">Qcodo Hosting</a>'),
	(9,4,'Qcodo Jobs Board',0,'For Qcodo-related job openings, contracting opportunities and developers for hire.');

INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 2, null);
INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 3, null);
INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 4, null);
INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 5, null);
INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 6, null);
INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 7, null);
INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 8, null);
INSERT INTO topic_link VALUES (null, 1, 0, 0, null, 9, null);

INSERT INTO `download_category` VALUES
	(1,1,'Official Releases',1,'For Official Qcodo Releases','For the latest DEVELOPMENT snapshot, please go to the <a href=\"/support/\" class=\"link_body\">Support</a> page.', NULL),
	(2,2,'Qform Controls',0,'For Community-Contributed Qform Classes','Custom Qform class files are typically installed in wwwroot/includes/qform, inside qform_objects', NULL),
	(3,4,'Other',0,'For other Community-Contributed classes, utilities, and code-snippets','', NULL),
	(4,3,'Language Files',0,'A place to share language files and language file updates for Internationalized Qcodo.','These are files that should be placed within the core at /includes/qcodo/i18n.  As files are uploaded and perfected, and as authors grant permission, we will put them into the core in future releases.', NULL);

INSERT INTO article_section VALUES(1, 'Getting Started');
INSERT INTO article_section VALUES(2, 'Harnessing the Power of Qcodo');
INSERT INTO article_section VALUES(3, 'Advanced Topics');

INSERT INTO issue_status_type(id, name) VALUES (1, 'Critical');
INSERT INTO issue_status_type(id, name) VALUES (10, 'High');
INSERT INTO issue_status_type(id, name) VALUES (50, 'Standard');
INSERT INTO issue_status_type(id, name) VALUES (100, 'Low');

INSERT INTO issue_status_type(id, name) VALUES (NULL, 'New Issue');
INSERT INTO issue_status_type(id, name) VALUES (NULL, 'Open');
INSERT INTO issue_status_type(id, name) VALUES (NULL, 'Assigned');
INSERT INTO issue_status_type(id, name) VALUES (NULL, 'Fixed');
INSERT INTO issue_status_type(id, name) VALUES (NULL, 'Closed');

INSERT INTO issue_resolution_type(id, name) VALUES (NULL, 'Fixed');
INSERT INTO issue_resolution_type(id, name) VALUES (NULL, 'Won\'t Fix');
INSERT INTO issue_resolution_type(id, name) VALUES (NULL, 'Duplicate');
INSERT INTO issue_resolution_type(id, name) VALUES (NULL, 'Cannot Replicate');

INSERT INTO issue_field(id, name, order_number, required_flag, mutable_flag, active_flag, token) VALUES (1, 'Qcodo Version', 1, true, false, true, 'qcodo_version');
INSERT INTO issue_field(id, name, order_number, required_flag, mutable_flag, active_flag, token) VALUES (2, 'PHP Version', 2, true, true, true, 'php_version');
INSERT INTO issue_field(id, name, order_number, required_flag, mutable_flag, active_flag, token) VALUES (3, 'Category', 3, true, false, true, 'category');

INSERT INTO issue_field(id, name, order_number, required_flag, mutable_flag, active_flag, token) VALUES (4, 'Browser', 101, false, true, true, 'browser');
INSERT INTO issue_field(id, name, order_number, required_flag, mutable_flag, active_flag, token) VALUES (5, 'Web Server', 102, false, true, true, 'web_server');
INSERT INTO issue_field(id, name, order_number, required_flag, mutable_flag, active_flag, token) VALUES (6, 'Database', 103, false, true, true, 'database');
INSERT INTO issue_field(id, name, order_number, required_flag, mutable_flag, active_flag, token) VALUES (7, 'Operating System', 104, false, true, true, 'os');

INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (1, '0.3.43 (Development)', '0343development', 1, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (1, '0.3.42 (Development)', '0342development', 2, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (1, '0.3.41 (Development)', '0341development', 3, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (1, '0.3.40 (Development)', '0340development', 4, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (1, '0.3.39 (Stable)', '0339stable', 5, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (1, '0.3.38 (Development)', '0339development', 6, true);

INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (2, '5.3.0', '530', 1, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (2, '5.3 (RC2)', '53rc2', 2, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (2, '5.3 (RC1)', '53rc1', 3, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (2, '5.2.10', '5210', 4, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (2, '5.2.9', '529', 5, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (2, '5.2.8', '528', 6, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (2, '5.2.7', '527', 7, true);

INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'General Framework', 'generalframework', 1, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'Code Generator', 'codegenerator', 2, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'QForm / QControls (PHP)', 'qformqcontrolsphp', 3, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'QForm / QControls (JavaScript)', 'qformqcontrolsjavascript', 4, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'Command Line Tools (CLI)', 'commandlinetoolscli', 5, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'Configuration / Installation', 'configurationinstallation', 6, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'Web Services', 'webservices', 7, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'Internationalization', 'internationalization', 8, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'Email Services', 'emailservices', 9, true);
INSERT INTO issue_field_option(issue_field_id, name, token, order_number, active_flag) VALUES (3, 'Qcodo.com Website / Documentation / Examples', 'qcodocomwebsitedocumentationexamples', 10, true);
