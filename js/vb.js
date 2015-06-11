window.addEvent('domready', function(){
	    var data = {
	      '001.jpg': { caption: '' }, 
	      '002.jpg': { caption: '' }, 
	      '003.jpg': { caption: '' }, 
	      '004.jpg': { caption: '' },
		  '005.jpg': { caption: '' },
		  '006.jpg': { caption: '' },
		  '007.jpg': { caption: '' },
		  '008.jpg': { caption: '' },
		  '009.jpg': { caption: '' }
	    };
	    var myShow = new Slideshow('show', data, {controller: false, height: 280, hu: 'fotos/', thumbnails: false, width: 960});
	  });