<?php
	class QQN {
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
		 * @return QQNodePackage
		 */
		static public function Package() {
			return new QQNodePackage('package', null, null);
		}
		/**
		 * @return QQNodePackageCategory
		 */
		static public function PackageCategory() {
			return new QQNodePackageCategory('package_category', null, null);
		}
		/**
		 * @return QQNodePackageContribution
		 */
		static public function PackageContribution() {
			return new QQNodePackageContribution('package_contribution', null, null);
		}
		/**
		 * @return QQNodePackageVersion
		 */
		static public function PackageVersion() {
			return new QQNodePackageVersion('package_version', null, null);
		}
		/**
		 * @return QQNodePerson
		 */
		static public function Person() {
			return new QQNodePerson('person', null, null);
		}
		/**
		 * @return QQNodeRegistry
		 */
		static public function Registry() {
			return new QQNodeRegistry('registry', null, null);
		}
		/**
		 * @return QQNodeShowcaseItem
		 */
		static public function ShowcaseItem() {
			return new QQNodeShowcaseItem('showcase_item', null, null);
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
		 * @return QQNodeWikiFile
		 */
		static public function WikiFile() {
			return new QQNodeWikiFile('wiki_file', null, null);
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