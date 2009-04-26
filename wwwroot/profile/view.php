<?php
	require('../includes/prepend.inc.php');

	class QcodoForm extends QcodoWebsiteForm {
		protected $strPageTitle = 'Profile - ';
		protected $mctPerson;

		protected $lblRole;
		protected $lblName;
		protected $lblUsername;
		protected $lblEmail;
		protected $lblLocation;
		protected $lblUrl;
		protected $lblRegistrationDate;
		
		protected $lblTimezone;
		protected $lblOptInFlag;
		
		protected $btnEditAccount;
		protected $btnEdit;
		protected $btnPassword;

		protected function Form_Create() {
			parent::Form_Create();
			
			$objPerson = Person::LoadByUsername(QApplication::PathInfo(0));
			if (!$objPerson)
				QApplication::Redirect('/');
			$this->mctPerson = new PersonMetaControl($this, $objPerson);
			$this->strPageTitle .= $objPerson->DisplayName;

			$this->lblRole = $this->mctPerson->lblPersonTypeId_Create();
			$this->lblRole->Name = 'Qcodo Role';

			if ($this->mctPerson->Person->DonatedFlag)
				$this->lblRole->Text .= ' and Financial Contributor';

			$this->lblName = $this->mctPerson->lblFirstName_Create();
			$this->lblName->Name = 'Name';
			$this->lblName->Text .= ' ' . $this->mctPerson->Person->LastName; 
			
			$this->lblUsername = $this->mctPerson->lblUsername_Create();

			$this->lblEmail = $this->mctPerson->lblEmail_Create();
			$this->lblEmail->Text = QString::ObfuscateEmail($this->mctPerson->Person->Email);
			$this->lblEmail->HtmlEntities = false;

			$this->lblLocation = $this->mctPerson->lblLocation_Create();
			
			$this->lblUrl = $this->mctPerson->lblUrl_Create();
			$this->lblUrl->HtmlEntities = false;

			$this->lblRegistrationDate = $this->mctPerson->lblRegistrationDate_Create(null, 'MMMM D, YYYY');
			$this->lblRegistrationDate->Name = 'Member Since';

			// Add Visibility Logic
			$this->lblName->Visible = ($this->mctPerson->Person->DisplayRealNameFlag);
			$this->lblEmail->Visible = ($this->mctPerson->Person->DisplayEmailFlag);
			$this->lblLocation->Visible = ($this->mctPerson->Person->Location);
			
			if (!$this->mctPerson->Person->Url)
				$this->lblUrl->Visible = false;
			else
				$this->lblUrl->Text = sprintf('<a href="%s">%s</a>', $this->mctPerson->Person->Url, QApplication::HtmlEntities($this->mctPerson->Person->Url));

			// If Is Owner of the Profile
			if ($this->IsOwner()) {
				$this->btnEdit = new RoundedLinkButton($this);
				$this->btnEdit->Text = 'Edit My Profile';
				$this->btnEdit->LinkUrl = '/profile/edit.php';
				$this->btnEdit->AddCssClass('roundedLinkGray');
				
				$this->btnEditAccount = new RoundedLinkButton($this);
				$this->btnEditAccount->Text = 'Edit My Account';
				$this->btnEditAccount->LinkUrl = '/profile/account.php';
				$this->btnEditAccount->AddCssClass('roundedLinkGray');
				
				$this->btnPassword = new RoundedLinkButton($this);
				$this->btnPassword->Text = 'Change My Password';
				$this->btnPassword->LinkUrl = '/profile/password.php';
				$this->btnPassword->AddCssClass('roundedLinkGray');

				$this->lblTimezone = $this->mctPerson->lblTimezoneId_Create();
				$this->lblTimezone->HtmlEntities = false;
				if (!$this->lblTimezone->Text) $this->lblTimezone->Text = '<span class="meta">none selected</span>';

				$this->lblOptInFlag = $this->mctPerson->lblOptInFlag_Create();
				
			// Otherwise, if is administrator
			} else if (QApplication::$Person && (QApplication::$Person->PersonTypeId == PersonType::Administrator)) {
				$this->btnEdit = new RoundedLinkButton($this);
				$this->btnEdit->Text = 'Edit User\'s Profile';
				$this->btnEdit->LinkUrl = '/profile/edit.php/' . $this->mctPerson->Person->Username;
				$this->btnEdit->AddCssClass('roundedLinkGray');

				$this->btnEditAccount = new RoundedLinkButton($this);
				$this->btnEditAccount->Text = 'Edit User\'s Account';
				$this->btnEditAccount->LinkUrl = '/profile/account.php/' . $this->mctPerson->Person->Username;
				$this->btnEditAccount->AddCssClass('roundedLinkGray');
			}
		}

		public function IsOwner() {
			return (QApplication::$Person && (QApplication::$Person->Id == $this->mctPerson->Person->Id));
		}
	}

	QcodoForm::Run('QcodoForm');
?>