<?php
	class QQN {
		/**
		 * @return QQNodeAnnouncement
		 */
		static public function Announcement() {
			return new QQNodeAnnouncement('announcement', null, null);
		}
		/**
		 * @return QQNodeArticle
		 */
		static public function Article() {
			return new QQNodeArticle('article', null, null);
		}
		/**
		 * @return QQNodeArticleSection
		 */
		static public function ArticleSection() {
			return new QQNodeArticleSection('article_section', null, null);
		}
		/**
		 * @return QQNodeCounter
		 */
		static public function Counter() {
			return new QQNodeCounter('counter', null, null);
		}
		/**
		 * @return QQNodeCountry
		 */
		static public function Country() {
			return new QQNodeCountry('country', null, null);
		}
		/**
		 * @return QQNodeDownload
		 */
		static public function Download() {
			return new QQNodeDownload('download', null, null);
		}
		/**
		 * @return QQNodeDownloadCategory
		 */
		static public function DownloadCategory() {
			return new QQNodeDownloadCategory('download_category', null, null);
		}
		/**
		 * @return QQNodeEmailQueue
		 */
		static public function EmailQueue() {
			return new QQNodeEmailQueue('email_queue', null, null);
		}
		/**
		 * @return QQNodeForum
		 */
		static public function Forum() {
			return new QQNodeForum('forum', null, null);
		}
		/**
		 * @return QQNodeLoginTicket
		 */
		static public function LoginTicket() {
			return new QQNodeLoginTicket('login_ticket', null, null);
		}
		/**
		 * @return QQNodeMessage
		 */
		static public function Message() {
			return new QQNodeMessage('message', null, null);
		}
		/**
		 * @return QQNodePerson
		 */
		static public function Person() {
			return new QQNodePerson('person', null, null);
		}
		/**
		 * @return QQNodeTimezone
		 */
		static public function Timezone() {
			return new QQNodeTimezone('timezone', null, null);
		}
		/**
		 * @return QQNodeTopic
		 */
		static public function Topic() {
			return new QQNodeTopic('topic', null, null);
		}
	}
?>