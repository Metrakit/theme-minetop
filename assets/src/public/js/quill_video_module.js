var Counter = function(quill, options) {
  this.quill = quill;
  this.options = options;
  var container = document.querySelector(options.container);
  console.log(container);
  var _this = this;
  quill.on('text-change', function() {
    var length = _this.calculate();
    container.innerHTML = length + ' ' + options.unit + 's';
  });
};

Counter.prototype.calculate = function() {
  var text = this.quill.getText();
  if (this.options.unit === 'word') {
    return text.split(/\s+/).length;
  } else {
    return text.length;
  }
};

Quill.registerModule('counter', Counter);

  /*VideoTooltip.DEFAULTS = {
    template: '<input class="input" type="textbox"> <div class="preview"> <span>Preview</span> </div> <a href="javascript:;" class="cancel">Cancel</a> <a href="javascript:;" class="insert">Insert</a>'
  };*/

//Quill.registerModule('video-tooltip', VideoTooltip);