			</div>
		</div>
		<div id="bottom">
			<div class="right" onmouseover="this.className='right hover';" onmouseout="this.className='right';">
				<div>
					<a href="http://www.biblegateway.com/passage/?search=John%203:16&version=31">John 3:16</a> &nbsp;&bull;&nbsp; <a href="http://www.biblegateway.com/passage/?search=Romans%2012:1-8&version=31">Romans 12:1-8</a>
				</div>
			</div>
			<div class="left" onmouseover="this.className='left hover';" onmouseout="this.className='left';">
				<div>
					Copyright &copy; 2005 - <?php _p(date('Y')); ?>, <a href="http://www.quasidea.com/">Quasidea Development, LLC</a><br/>
					This open-source framework for <a href="http://www.php.net/">PHP 5</a> is released under the terms of <a href="http://www.opensource.org/licenses/mit-license.php">The MIT License</a>.
				</div>
			</div>
		</div>
	<?php $this->RenderEnd(); ?>
<?php if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) { ?>
	<script type="text/javascript">
		window.onresize = function(event) {
			qc.handleEvent(event);
			document.getElementById("middle").style.height = qcodo.client.height - 109;
		}

		qc.handleEvent(event);
		document.getElementById("middle").style.height = qcodo.client.height - 109;
	</script>
<?php } ?>
</body></html>