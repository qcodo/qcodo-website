function SetIssuePanelMaximumHeight(strControlId, intMaxHeight) {
	var objPanel = qc.getC(strControlId);
	
	if (objPanel) {
		for (var intIndex = 0; intIndex < objPanel.childNodes.length; intIndex++) {
			var objControl = objPanel.childNodes[intIndex];
			if (objControl.className == "issuePanelBody") {
				if (objControl.offsetHeight > intMaxHeight) {
					objControl.style.height = intMaxHeight + "px";
				}
			}
		}
	}
}