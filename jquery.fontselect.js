(function($){

  $.fn.fontselect = function(options) {  

    var __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

    var settings = {
      style: 'font-select',
      placeholder: 'Изабери фонт',
      lookahead: 2,
      api: 'https://fonts.googleapis.com/css2?family=',
      fonts: []      
    };
    
    var Fontselect = (function(){
    
      function Fontselect(original, o) {
        this.$original = $(original);
        this.options = o;
        this.active = false;
        this.fetchCyrillicFonts().then(() => {
          this.setupHtml();
          this.getVisibleFonts();
          this.bindEvents();
        });

        var font = this.$original.val();
        if (font) {
          this.updateSelected();
          this.addFontLink(font);
        }
      }

      Fontselect.prototype.fetchCyrillicFonts = async function() {
        try {
          const response = await fetch('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyBinU4iG2kq02MjO1RZKYyfQNnmrhhPdX8&subset=cyrillic');
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          const data = await response.json();
          this.options.fonts = data.items.map(font => font.family);
        } catch (error) {
          console.error('Failed to fetch Cyrillic fonts:', error);
        }
      };
      
      Fontselect.prototype.bindEvents = function(){
        var self = this;
        $(document).click(function(event){
          if(self.active && !$(event.target).parents('#fontSelect-'+ self.$original.id).length){
            self.toggleDrop();
          }
        });
        
        $('li', this.$results)
        .click(__bind(this.selectFont, this))
        .mouseenter(__bind(this.activateFont, this))
        .mouseleave(__bind(this.deactivateFont, this));
        
        $('span', this.$select).click(__bind(this.toggleDrop, this));
        this.$arrow.click(__bind(this.toggleDrop, this));
      };
      
      Fontselect.prototype.toggleDrop = function(ev){
        
        if(this.active){
          this.$element.removeClass('font-select-active');
          this.$drop.hide();
          clearInterval(this.visibleInterval);
        } else {
          this.$element.addClass('font-select-active');
          this.$drop.show();
          this.moveToSelected();
          this.visibleInterval = setInterval(__bind(this.getVisibleFonts, this), 500);
        }
        
        this.active = !this.active;
      };
      
      Fontselect.prototype.selectFont = function(){
        
        var font = $('li.active', this.$results).data('value');
        this.$original.val(font).change();
        this.updateSelected();
        this.toggleDrop();
      };
      
      Fontselect.prototype.moveToSelected = function(){
        
        var $li, font = this.$original.val();
        
        if (font){
          $li = $("li[data-value='"+ font +"']", this.$results);
        } else {
          $li = $("li", this.$results).first();
        }
        
        this.$results.scrollTop($li.addClass('active')[0].offsetTop);
      };
      
      Fontselect.prototype.activateFont = function(ev){
        $('li.active', this.$results).removeClass('active');
        $(ev.currentTarget).addClass('active');
      };
      
      Fontselect.prototype.deactivateFont = function(ev){
        
        $(ev.currentTarget).removeClass('active');
      };
      
      Fontselect.prototype.updateSelected = function(){
        
        var font = this.$original.val();
        $('span', this.$element).text(this.toReadable(font)).css(this.toStyle(font));
      };
      
      Fontselect.prototype.setupHtml = function(){
      
        this.$original.empty().hide();
        this.$element = $('<div>', {'id': 'fontSelect-'+this.$original.id, 'class': this.options.style});
        this.$arrow = $('<div><b></b></div>');
        this.$select = $('<a><span>'+ this.options.placeholder +'</span></a>');
        this.$drop = $('<div>', {'class': 'fs-drop'});
        this.$results = $('<ul>', {'class': 'fs-results'});
        this.$original.after(this.$element.append(this.$select.append(this.$arrow)).append(this.$drop));
        this.$drop.append(this.$results.append(this.fontsAsHtml())).hide();
      };
      
      Fontselect.prototype.fontsAsHtml = function() {
        var l = this.options.fonts.length;
        var r, s, h = '';

        for (var i = 0; i < l; i++) {
          r = this.toReadable(this.options.fonts[i]);
          s = this.toStyle(this.options.fonts[i]);
          h += '<li data-value="' + this.options.fonts[i] + '" style="font-family: ' + s['font-family'] + '; font-weight: ' + s['font-weight'] + '">' + r + '</li>';
        }

        return h;
      };
      
      Fontselect.prototype.toReadable = function(font){
        return font.replace(/[\+|:]/g, ' ');
      };
      
      Fontselect.prototype.toStyle = function(font){
        var t = font.split(':');
        return {'font-family': this.toReadable(t[0]), 'font-weight': (t[1] || 400)};
      };
      
      Fontselect.prototype.getVisibleFonts = function(){
      
        if(this.$results.is(':hidden')) return;
        
        var fs = this;
        var top = this.$results.scrollTop();
        var bottom = top + this.$results.height();
        
        if(this.options.lookahead){
          var li = $('li', this.$results).first().height();
          bottom += li*this.options.lookahead;
        }
       
        $('li', this.$results).each(function(){

          var ft = $(this).position().top+top;
          var fb = ft + $(this).height();

          if ((fb >= top) && (ft <= bottom)){
            var font = $(this).data('value');
            fs.addFontLink(font);
          }
          
        });
      };
      
      Fontselect.prototype.addFontLink = function(font){
      
        var link = this.options.api + font;
      
        if ($("link[href*='" + font + "']").length === 0){
			$('link:last').after('<link href="' + link + '" rel="stylesheet" type="text/css">');
		}
      };
    
      return Fontselect;
    })();

    return this.each(function() {       
      if (options) $.extend( settings, options );
      
      return new Fontselect(this, settings);
    });

  };
})(jQuery);
