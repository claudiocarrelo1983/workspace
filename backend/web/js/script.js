//initialize Form Builder
$(function(){
	  $('.build-wrap').formBuilder();
});


var options = {
	actionButtons: [{
	  id: 'smile',
	  className: 'btn btn-success',
	  label: '😁',
	  type: 'button',
	  events: {
	  click: function() {
		alert('😁😁😁 !SMILE! 😁😁😁');
	  }
	}
	}]
  };
  $(container).formBuilder(options);