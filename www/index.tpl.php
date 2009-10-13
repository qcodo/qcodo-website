<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<div class="mainSidebar">
	<h1>News &amp; Announcements</h1>
	<div class="sbContent">
<?php
		foreach ($this->objBlogTopicArray as $objTopic) {
			$objMessage = $objTopic->GetFirstMessage();
			$strDate = $objMessage->PostDate->__toString('DDDD, MMMM D');
			$strTitle = $objTopic->Name;
			if ($intPosition = strpos($strTitle, ' - ')) $strTitle = substr($strTitle, $intPosition + 3);
?>
			<p><strong><?php _p($strDate); ?></strong><br/><a href="/forums/forum.php/5/<?php _p($objTopic->Id); ?>/"><?php _p($strTitle); ?></a></p>
<?php
		}
?>
	</div>
	<br/>
	<h1>Qcodo Release Information</h1>
	<div class="sbContent">
		<p><strong>Current Dev Release</strong><br/><a href="/downloads/">Qcodo v<?php _p(QApplication::GetQcodoVersion(false)); ?></a><br/><?php _p(QApplication::GetQcodoVersionDate(false)->__toString('DDDD, MMMM D, YYYY')); ?></p>
		<p><strong>Current Stable Release</strong><br/><a href="/downloads/">Qcodo v<?php _p(QApplication::GetQcodoVersion(true)); ?></a><br/><?php _p(QApplication::GetQcodoVersionDate(true)->__toString('DDDD, MMMM D, YYYY')); ?></p>
	</div>
	<br/>
	<h1>Qcodo Development Information</h1>
	<div class="sbContent">
		<p>The most updated development and check-in information at <a href="http://www.github.com/qcodo">GitHub.com</a>:
		<p>
			<strong>Qcodo Framework</strong><br/>
			<a href="<?php _p(Registry::GetValue('gitinfo_qcodo_url')); ?>" style="font-style: italic;"><?php _p(Registry::GetValue('gitinfo_qcodo_message')); ?></a><br/>
			<?php _p(Registry::GetValue('gitinfo_qcodo_date')); ?>
		</p>
		<p>
			<strong>Qcodo.com Website</strong><br/>
			<a href="<?php _p(Registry::GetValue('gitinfo_qcodo-website_url')); ?>" style="font-style: italic;"><?php _p(Registry::GetValue('gitinfo_qcodo-website_message')); ?></a><br/>
			<?php _p(Registry::GetValue('gitinfo_qcodo-website_date')); ?>
		</p>
	</div>
</div>

<h1>Code Less. Do More.</h1>

<div class="mainContent">

<p>The <strong>Qcodo Development Framework</strong> is an open-source <a href="http://www.php.net/">PHP</a> framework
that focuses on freeing developers from unnecessary tedious, mundane coding. The result is that developers can do what they do best:
<ul>
<li>Focus on implementing <b>functionality</b> and <b>usability</b></li>
<li>Improving <b>performance</b></li>
<li>Ensuring <b>security</b></li>
</ul></p>

<p>It is a <strong><em>completely</em> object-oriented framework</strong> that takes the best of PHP and provides a truly rapid application development
platform. Initial prototypes roll out in <strong>minutes instead of hours</strong>. Iterations come around in <strong>hours instead of days</strong> (or even
weeks). As projects iterate into more cohesive solutions, the framework allows developers to take prototypes to the next
level by providing the <strong>capability of bringing the application to maturity</strong>.</p>

<br/>

<p>The following is just a sample of the <strong>many features</strong> of Qcodo that make it a <strong>robust, scalable PHP development
framework</strong> that is already being used for everything from
<a href="/showcase/"><strong>large scale enterprise applications</strong></a> to <a href="/showcase/"><strong>agile Web 2.0 startups</strong></a>:
<ul>

<li>Code generation-based object relational model</li>
<li>Component-based event-driven view / controller library</li>
<li>Fully-integrated PHP-based AJAX support (no JavaScripting required)</li>
<li>Object oriented database querying library (no SQL required)</li>
<li>Built-in database profiling tools</li>
<li>Internationalization support</li>
<li><a href="/wiki/qcodo/overview">And much more...</a></li>
</ul>
</p>

</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>