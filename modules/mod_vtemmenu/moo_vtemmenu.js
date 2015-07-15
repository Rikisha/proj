if (typeof(MooTools) != 'undefined'){

    var DropdownVtemmenu = new Class({
        Implements: Options,
        options: {
			
            mooTransition : 'Bounce',
            mooEase : 'easeOut',
            mooDuree : 500
        },
			
        initialize: function(element,options) {
			
            this.setOptions(options);

            var maduree = this.options.mooDuree;
            var matransition = this.options.mooTransition;
            var monease = this.options.mooEase;

            var els = element.getElements('li');

            els.each(function(el) {
										
                if (el.getElement('div.vt_nav') != null) {
                    el.container = el.getElement('div.vt_nav');
						
                    el.containerul = el.getElements('div.vt_nav ul');
                    el.containerul.setStyle('position','static');
						
                    el.container.mh = el.container.clientHeight;
                    el.container.mw = el.container.clientWidth;
                    el.duree = maduree;
                    el.transition = matransition;
                    el.ease = monease;
                    el.createFxVtem();
                    el.parent = el.getParent().getParent().getParent().getParent();
                    if (el.container.getElement('div.vt_nav') != null) this.enfant = el.container.getElement('div.vt_nav');
						
                    el.addEvent('mouseover',function() {
						this.addClass('vtem_menu_hover');
                        this.showVtem();

                    });
                    el.addEvent('mouseleave',function() {
						this.removeClass('vtem_menu_hover');
                        this.hideVtem();
							
                    });
                }
            });
        }
			
    });
		
    Element.extend({
			
        createFxVtem: function() {
			
            var myTransition = new Fx.Transition(Fx.Transitions[this.transition][this.ease]);
            if (this.hasClass('level0'))
            {
                this.vtemFxNT = new Fx.Style(this.container, 'height', {
                    duration:this.duree,
                    transition: myTransition
                });
            } else {
                this.vtemFxNT = new Fx.Style(this.container, 'width', {
                    duration:this.duree,
                    transition: myTransition
                });
            }

            this.vtemFxNT.set(0);
            this.container.setStyle('left', '-999em');
				
            animComp = function(){
                if (this.status == 'hide')
                {
                    this.container.setStyle('left', '-999em');
                    this.hidding = 0;
                }
                this.showing = 0;
                this.container.setStyle('overflow', '');
					
            }
            this.vtemFxNT.addEvent ('onComplete', animComp.bind(this));

        },
			
        showVtem: function() {
            clearTimeout (this.timeout);
            this.status = 'show';
            this.animVtem();
        },
			
        hideVtem: function(timeout) {
            this.status = 'hide';
				
            clearTimeout (this.timeout);
            if (timeout)
            {
                this.timeout = setTimeout (this.anim.bind(this), timeout);
            }else{
                this.animVtem();
            }
        },

        animVtem: function() {

            if ((this.status == 'hide' && this.container.style.left != 'auto') || (this.status == 'show' && this.container.style.left == 'auto' && !this.hidding) ) return;
					
            this.container.setStyle('overflow', 'hidden');
            if (this.status == 'show') {
                this.hidding = 0;
            }
            if (this.status == 'hide')
            {
                this.hidding = 1;
                this.showing = 0;
                this.vtemFxNT.stop();
					
                if (this.hasClass('level0')) {
                    this.vtemFxNT.start(this.container.offsetHeight,0);
                } else {
                    this.vtemFxNT.start(this.container.offsetWidth,0);
                }

            } else {
                this.showing = 1;	
                this.container.setStyle('left', 'auto');
                this.vtemFxNT.stop();
                if (this.hasClass('level0')) {
                    this.vtemFxNT.start(this.container.offsetHeight,this.container.mh);
                } else {
                    this.vtemFxNT.start(this.container.offsetWidth,this.container.mw);
                }
            }
				

        }
    });

    DropdownVtemmenu.implement(new Options);
}