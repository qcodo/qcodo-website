<?php
	QEmailServer::$SmtpServer = SMTP_SERVER;
	QEmailServer::$OriginatingServerIp = SMTP_EHLO;
	QEmailServer::$TestMode = SMTP_TEST_MODE;

	$objEmailQueue = EmailQueue::QueryArray(
		QQ::IsNull(QQN::EmailQueue()->ErrorFlag),
		QQ::Clause(
			QQ::OrderBy(QQN::EmailQueue()->HighPriorityFlag, false),
			QQ::LimitInfo(50)
		)
	);

	foreach ($objEmailQueue as $objEmail) {
		$objEmail->Send();
	}
?>