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
		 * @return QQNodeIssue
		 */
		static public function Issue() {
			return new QQNodeIssue('issue', null, null);
		}
		/**
		 * @return QQNodeIssueField
		 */
		static public function IssueField() {
			return new QQNodeIssueField('issue_field', null, null);
		}
		/**
		 * @return QQNodeIssueFieldOption
		 */
		static public function IssueFieldOption() {
			return new QQNodeIssueFieldOption('issue_field_option', null, null);
		}
		/**
		 * @return QQNodeIssueFieldValue
		 */
		static public function IssueFieldValue() {
			return new QQNodeIssueFieldValue('issue_field_value', null, null);
		}
		/**
		 * @return QQNodeIssueVote
		 */
		static public function IssueVote() {
			return new QQNodeIssueVote('issue_vote', null, null);
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
		/**
		 * @return QQNodeTopicLink
		 */
		static public function TopicLink() {
			return new QQNodeTopicLink('topic_link', null, null);
		}
		/**
		 * @return QQNodeWikiImage
		 */
		static public function WikiImage() {
			return new QQNodeWikiImage('wiki_image', null, null);
		}
		/**
		 * @return QQNodeWikiItem
		 */
		static public function WikiItem() {
			return new QQNodeWikiItem('wiki_item', null, null);
		}
		/**
		 * @return QQNodeWikiPage
		 */
		static public function WikiPage() {
			return new QQNodeWikiPage('wiki_page', null, null);
		}
		/**
		 * @return QQNodeWikiVersion
		 */
		static public function WikiVersion() {
			return new QQNodeWikiVersion('wiki_version', null, null);
		}
	}
?>