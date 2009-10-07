INSERT INTO _version VALUES('3.0');

INSERT INTO package_category VALUES(null, null, 'qcontrols', 1, 'Custom QForm and QControls', 'Custom QControls, QForm modifications and other plug-ins', null, null);
INSERT INTO package_category VALUES(null, null, 'codegen', 2, 'Code Generator', 'Modifications to the Qcodo Code Generator', null, null);
INSERT INTO package_category VALUES(null, null, 'ajax', 3, 'AJAX and JavaScript', 'Modifications to the Qcodo AJAX or JavaScript classes', null, null);
INSERT INTO package_category VALUES(null, null, 'external', 4, 'External Frameworks and Third Party Libraries', 'Integration with external frameworks and/or other third-party libraries', null, null);
INSERT INTO package_category VALUES(null, null, 'webservices', 5, 'Web Services', 'Modifications or integration with web service protocols and other services', null, null);
INSERT INTO package_category VALUES(null, null, 'i18n', 6, 'Internationalization', 'Language files, classes for internationalization, etc.', null, null);
INSERT INTO package_category VALUES(null, null, 'issues', 7, 'Fixes for Issues', 'User-submitted fixes for reported bugs and issues in the Qcodo Bug Tracker', null, null);

INSERT INTO topic_link_type VALUES (1, 'Forum');
INSERT INTO topic_link_type VALUES (2, 'Issue');
INSERT INTO topic_link_type VALUES (3, 'Wiki Item');
INSERT INTO topic_link_type VALUES (4, 'Package');

INSERT INTO person_type VALUES (1, 'Administrator');
INSERT INTO person_type VALUES (2, 'Moderator');
INSERT INTO person_type VALUES (3, 'Contributor');
INSERT INTO person_type VALUES (4, 'Registered User');

INSERT INTO wiki_item_type VALUES(1, 'Page');
INSERT INTO wiki_item_type VALUES(2, 'Image');
INSERT INTO wiki_item_type VALUES(3, 'File');

INSERT INTO image_file_type VALUES(1, 'Jpeg');
INSERT INTO image_file_type VALUES(2, 'Png');
INSERT INTO image_file_type VALUES(3, 'Gif');


#INSERT INTO person(person_type_id, username, first_name, last_name, email, password, display_real_name_flag, display_email_flag, opt_in_flag, donated_flag, location, country_id, url, registration_date, display_name) VALUES
#(1, 'mikeho', 'Mike', 'Ho', 'mike@quasidea.com', '67a1e09bb1f83f5007dc119c14d663aa', 1, 1, 1, 0, 'Sunnyvale, CA', 230, 'http://www.quasidea.com/', '2000-01-01 00:00:00', 'Mike Ho');

INSERT INTO `forum` VALUES 
	(2,2,'General Discussion',0,'Forum for any topic of interest to the Qcodo community, including questions about the framework itself.'),
	(3,3,'Bugs and Issues',0,'This forum is specific to reporting bugs and issues with the framework.'),
	(4,7,'Feature Requests',0,'Forum discussing feature requests for the framework.'),
	(5,1,'Official Blog',1,'This is a blog of current Qcodo and Qcodo website development activities.  Official Qcodo announcements will also be posted here.'),
	(6,6,'Getting Started, Installation and Setup',0,'For questions, issues and topics that specifically deal with getting started with Qcodo (e.g. installation, configuration, subfoldering, etc.)'),
	(7,5,'Qcodo.com, Examples Site and API Documentation',0,'For anything regarding Qcodo.com, itself, including the examples site, Forums and Wiki, API Documentation, etc.'),
	(8,5,'Other Community Projects',0,'For anything regarding other Qcodo community projects, including QForge, the Qcodo Manual Project, Zcodo/Qcubed, etc.'),
	(9,4,'Qcodo Jobs Board',0,'For Qcodo-related job openings, contracting opportunities and developers for hire.');

INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 2);
INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 3);
INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 4);
INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 5);
INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 6);
INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 7);
INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 8);
INSERT INTO topic_link(topic_link_type_id, topic_count, message_count, forum_id) VALUES (1, 0, 0, 9);

INSERT INTO issue_priority_type(id, name) VALUES (1, 'Critical');
INSERT INTO issue_priority_type(id, name) VALUES (10, 'High');
INSERT INTO issue_priority_type(id, name) VALUES (50, 'Standard');
INSERT INTO issue_priority_type(id, name) VALUES (100, 'Low');

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
