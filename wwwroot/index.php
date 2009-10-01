<?php
	require('includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Home';
		protected $intNavBarIndex = QApplication::NavAbout;
		protected $intSubNavIndex = QApplication::NavAboutHome;
		
		protected $objBlogTopicArray;

		protected function Form_Create() {
			parent::Form_Create();
			$this->objBlogTopicArray = Topic::QueryArray(
				QQ::Equal(QQN::Topic()->TopicLink->ForumId, 5),
				QQ::Clause(
					QQ::OrderBy(QQN::Topic()->Id, false),
					QQ::LimitInfo(4)
				)
			);
		}
	}

	QcodoForm::Run('QcodoForm');
?>