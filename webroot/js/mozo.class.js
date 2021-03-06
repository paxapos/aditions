/*--------------------------------------------------------------------------------------------------- Risto.Adicion.mozo
 *
 *
 * Clase Mozo, depende de Productos
 */


/**
 *  Trigger de los siguientes eventos:
 *      - mozoAgregaMesa
 *      - mozoSacaMesa
 *      - mozoSeleccionado
 * @var Static MOZOS_POSIBLES_ESTADOS
 *
 *  esta variable es simplemenete un catalogo de estados posibles que
 *  la mesa pude adoptar en su variable privada this.__estado
 *
 **/
var MOZOS_POSIBLES_ESTADOS =  {
    agragaMesa : {
        msg: 'El mozo tiene una nueva mesa',
        event: 'mozoAgregaMesa'
    },
    sacaMesa: {
        msg: 'El mozo tiene una mesa menos',
        event: 'mozoSacaMesa'
    },
    seleccionado: {
        msg: 'El mozo fue seleccionado',
        event: 'mozoSeleccionado'
    }
};



var Mozo = function(jsonData){
    var este = this;
    this.mesasOrdenadas = ko.dependentObservable( function(){
        return este.ordenarMesasPorNumero();
    });
    

    return this.initialize(jsonData);
}


Mozo.prototype = {
    id      : function( ) {return 0},
    numero  : function( ) {return 0},
    mesas   : function( ) {return []},

    _initFn: [], // array de functions to apply on initialization

    initialize: function( jsonData ) {
        var mozoNuevo = this,
            jsonData = jsonData || {},
            mapOps  = {};

        if ( jsonData == {} ) return this;
        
        this.id     = ko.observable( 0 );
        this.numero = ko.observable( 0 );
        this.mesas  = ko.observableArray( [] );

        
        if (jsonData) {
            // si aun no fue mappeado
            mapOps = {
                'mesas': {
                    create: function(ops) {
                        return new Mesa(mozoNuevo, ops.data);
                    }
                }
            }
        
        } 
        
        ko.mapping.fromJS(jsonData, mapOps, this);

        var i = 0;
        while ( i < this._initFn.length) {
            this._initFn[i].apply(this, arguments);
            i++;
        }


        return this;
    },

    /**
     * devuelve un Button con el elemento mozo
     * @return jQuery Element button
     */
    getButton: function(){
        var btn = document.createElement('button');
        btn.mozo_id = this.id;
        btn.innerHTML = this.numero;
        btn.mozo = this;
        return btn;
    },


    cloneFromJson: function(json){
        //copio solo lo decclarado en el prototype del objecto Mozo
        for (var i in this){
            if ((typeof this[i] != 'function') && (typeof this[i] != 'object')){
                this[i] = json[i];
            }
        }
        return this;
    },


    agregarMesa: function(nuevaMesa){
        this.mesas.push(nuevaMesa);
        var evento = $.Event(MOZOS_POSIBLES_ESTADOS.agragaMesa.event);
        evento.mozo = this;
        evento.mesa = nuevaMesa;
        $(document).trigger(evento);        
    },


    sacarMesa: function ( mesa ) {
        var sacar = false;
        if ( this.mesas.remove(mesa) ) {
            delete mesa;
            sacar = true;
        }
        return sacar;
    },


    ordenarMesasPorNumero: function(){
        return this.mesas().sort(function(left, right) {
            return left.numero() == right.numero() ? 0 : (parseInt(left.numero()) < parseInt(right.numero()) ? -1 : 1) 
        })
    },


    /**
     * Cuando un mozo es clickeado o elegido, es seleccionado.
     * Se dispara un evento mozoSeleccionado cuando esto ocurre
     */
    seleccionar: function(){
        this.seleccionado = true;
        var eventoMozoSeleccionado = $.Event(MOZOS_POSIBLES_ESTADOS.seleccionado.event);
        eventoMozoSeleccionado.mozo = this;
        $(document).trigger(eventoMozoSeleccionado);
    },

    
    /**
     * Busca una mesa por su id en el listado de mesas que tiene le mozo
     * @param integer idToSearch 
     * @return Mesa si encontro, null en caso de no encontrar nada
     */
    findMesaById: function( idToSearch ){
        for( var m in this.mesas() ) {
            if ( this.mesas()[m].id() === idToSearch ) {
                return this.mesas()[m];
            }
        }
        return null;
    },


    full_image_url: function () {
        var mediaId;
        if (typeof this.media_id == 'function' ) {
            mediaId = this.media_id();
        } else {
            mediaId = this.media_id;
        }
        return Risto.URL_DOMAIN + Risto.TENANT + "/risto/medias/thumb/" + mediaId + "/88/88";
    },


    tieneMediaId: function () {
        var mediaId;
        if (typeof this.media_id == 'function' ) {
            mediaId = this.media_id();
        } else {
            mediaId = this.media_id;
        }

        if ( parseInt( mediaId ) && mediaId != null ) {
            return true;
        } else {
            return false;
        }
    }
   
};

