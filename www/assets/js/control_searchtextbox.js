/////////////////////////////////////////////
// Control: Dialog Box functionality
/////////////////////////////////////////////

	qcodo.registerSearchTextBox = function(mixControl) {
		// Initialize the Event Handler
		qcodo.handleEvent();

		// Get Control/Wrapper
		var objControl; if (!(objControl = qcodo.getControl(mixControl))) return;
		var objWrapper = objControl.wrapper;

		// Set Image LinkButtons
		objWrapper.lnkSearch = document.getElementById(objControl.id + "_searchlink");
		objWrapper.lnkCancel = document.getElementById(objControl.id + "_cancellink");
		objWrapper.lnkSearch.wrapper = objWrapper;
		objWrapper.lnkCancel.wrapper = objWrapper;

		// Setup Click Handlers
		objWrapper.lnkSearch.onclick = function() {
			this.wrapper.control.focus();
			this.wrapper.control.select();
			this.wrapper.control.onclick();
			return false;
		}

		objWrapper.lnkCancel.onclick = function() {
			location.href = location.href.substring(0, location.href.search("\\?"));
			return false;
		}

		objWrapper.setDisplayStyle = function() {
			var objControl;
			var objWrapper;
			var objCaller = qcodo.getControl(this);			
			if (objCaller.id.search('_ctl') != -1) {
				objWrapper = objCaller;
				objControl = objWrapper.control;
			} else {
				objControl = objCaller;
				objWrapper = objControl.wrapper;
			}

			if (!objControl.value) {
				// Set Style/Content for No Search String
				objWrapper.lnkCancel.style.display = "none";
				objControl.className = "none";
			} else {
				objWrapper.lnkCancel.style.display = "inline";
				objControl.className = "";
			};
		};

		objControl.onclick = function() {
			this.className = "";
			this.wrapper.lnkCancel.style.display = "inline";
		};

		objControl.onblur = objWrapper.setDisplayStyle;

		objWrapper.setDisplayStyle();
	};


//////////////////
// Qcodo Shortcuts
//////////////////

	qc.regSTB = qcodo.registerSearchTextBox;