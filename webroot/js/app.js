
'use strict';

class App {

    defaults() {
        return {
            apiUrl:     'http://localhost/DH-API/',
            filter:     { recent: true },
            breakPoint: '750px'
        };
    }

    constructor() {
        this.apiUrl = 'http://localhost/DH-API/';
        this.filter = {
            recent: true
        };
        this.breakPoint = 750;

        // apply layout first, then populate blocks
        this.slider = new Slider(document.getElementById('container'));
        this.scrollable = new Scrollable(document.getElementById('table'));
        this.resizeListener();
        this.map = new Map('map');
        this.table = new Table(this.scrollable.getContentContainer());

        // load data
        this.getCourses()

        window.addEventListener('resize', function () {
            this.resizeListener();
        }.bind(this));
    }

    resizeListener() {
        // we should test for #container innerWidth
        if(document.getElementById('container').clientWidth > this.breakPoint) {
            this.applyScreenLayout();
            this.slider.reset();
        }else{
            this.applyMobileLayout();
            this.slider.updateSize();
        }
        this.scrollable.updateSize();
    }

    applyMobileLayout() {
        $('#container').addClass('mobile');
        $('#container').removeClass('screens');
        $('#container').css('min-width', 'initial');
    }

    applyScreenLayout() {
        $('#container').addClass('screens');
        $('#container').removeClass('mobile');
        $('#container').css('min-width', this.breakPoint);
    }

    getCourses() {
        this.table.setLoader();
        $.ajax({
            url: this.apiUrl + 'courses/index' + this.filterToQuery(),
            cache: true,
            context: this,
        }).done(function( data ) {
            this.data = data;
            this.setCourses();
        }).fail(function() {
            this.table.setError('Failure while loading data.');
        });
    }

    filterToQuery() {
        let retval = '';
        $.each(this.filter, function(key, value) {
            if(retval == '') retval = '?';
            else retval += '&';
            retval += key + '=' + value;
        });
        return retval;
    }

    setCourses() {
        this.map.setMarkers(this.data);
        this.table.setData(this.data);
        this.scrollable.updateSize();
    }
}