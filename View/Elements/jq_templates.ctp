<!-- Template: listado de comandas con sus productos-->
<script id="listaComandas" type="text/x-jquery-tmpl">
   <div data-role="collapsible">
       <h3>
          <span data-bind="visible: !id()">
            <span style="font-size: 8pt; color: #80D8F6">Guardando</span>
            <?php echo $this->Html->image('/aditions/css/img/loading.gif'); ?>
         </span>
           <span class="id-comanda">#<span data-bind="text: id"></span></span>  <span class="hora-comanda"  data-bind="text: timeCreated()"></span>&nbsp;&nbsp;&nbsp;
           <span class="comanda-listado-productos-string" data-bind="text: productsStringListing()"></span>
           
           <a style="float: right;" href="#" data-bind="click: imprimirComanda" class="btn-comanda-icon">
               imprimir
           </a>
       </h3>

        <ul class="comanda-items" data-role="listview"
           data-bind="template: {name: 'li-productos-detallecomanda', foreach: DetalleComanda}">

        </ul>                                                                           
   </div>
</script>




<script id="listaClientes" type="text/x-jquery-tmpl">
  <li data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-c">
    <div class="ui-btn-inner ui-li">
      <div class="ui-btn-text">&nbsp;
        <a href="#mesa-view" data-direction="reverse" class="ui-link-inherit"  data-bind="click: Risto.Adition.adicionar.setClienteACurrentMesa">
          <span class="cliente-nrodoc" data-bind="text: nombre"></span>
          <span class="cliente-nombre" data-bind="text: nrodocumento"></span>                                    
        </a>                   
      </div>
      <span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
    </div>
  </li>
</script>




<!--  TEmplate: Productos seleccionados en el menu. comandas add -->
<script id="categorias-productos-seleccionados" type="text/x-jquery-tmpl">
    <li data-bind="visible: cant(), css:{'es-entrada': esEntrada(), 'tiene-observacion': observacion()}"  class="ui-li ui-li-static ui-body-c listado-productos-seleccionados" >
        
        <div style="display: none" data-type="horizontal" data-role="controlgroup" class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal ui-options">
            <a data-bind="click: seleccionar" data-role="button" data-icon="plus" data-iconpos="notext" href="#" title="+" data-theme="c" class="ui-btn ui-btn-icon-notext ui-corner-left ui-btn-up-c"><span class="ui-btn-inner ui-corner-left"><span class="ui-btn-text" >+</span><span class="ui-icon ui-icon-plus ui-icon-shadow"></span></span></a>
            <a data-bind="click: deseleccionar" data-role="button" data-icon="minus" data-iconpos="notext" href="#" title="-" data-theme="c" class="ui-btn ui-btn-icon-notext ui-btn-up-c"><span class="ui-btn-inner"><span class="ui-btn-text">-</span><span class="ui-icon ui-icon-minus ui-icon-shadow"></span></span></a>
            <a data-bind="click: addObservacion, style: { background: observacion() ? '#437FBE' : ''}" 
               data-rel="dialog"  
               data-role="button"
               data-iconpos="notext" 
               data-icon="grid" 
               href="#comanda-add-product-obss" 
               title="Observación" 
               data-theme="c" class="ui-btn ui-btn-icon-notext ui-btn-up-c">
                <span class="ui-btn-inner">
                    <span class="ui-btn-text">Observación
                    </span>
                    <span class="ui-icon ui-icon-grid ui-icon-shadow"></span>
                </span>
            </a>
            <a data-role="button" data-iconpos="notext" data-icon="entrada" 
               href="#" title="Entrada" data-theme="c" 
               class="ui-btn ui-btn-icon-notext ui-corner-right ui-controlgroup-last ui-btn-up-c"
               data-bind="click: toggleEsEntrada, css: { es_entrada: esEntrada()}"
               >
                <span class="ui-btn-inner ui-corner-right ui-controlgroup-last">
                    <span class="ui-btn-text">Entrada</span>
                    <span class="ui-icon ui-icon-entrada ui-icon-shadow"></span>
                </span>
            </a>

             <a data-role="button" data-iconpos="notext" data-icon="fraccionar" 
               href="#" title="Fraccionar" data-theme="c" 
               class="ui-btn ui-btn-icon-notext ui-corner-right ui-controlgroup-last ui-btn-up-c"
               data-bind="click: fraccionar"
               >
                <span class="ui-btn-inner ui-corner-right ui-controlgroup-last">
                    <span class="ui-btn-text">Fraccionar</span>
                    <span class="ui-icon ui-icon-fraccionar ui-icon-shadow"></span>
                </span>
            </a>


         </div>
        

        <span data-bind="text: realCant()" class="ui-li-count ui-btn-up-c ui-btn-corner-all"></span>
         
        <span data-bind="text: nameConSabores() + ' ' +observacion()"></span>
        
        
     </li>
 </script>
 
 
 
 <!-- Template: Comanda Add menu path-->
 <script id="boton" type="text/x-jquery-tmpl">
        <a data-bind="attr: {
                         'data-icon': esUltimoDelPath()?'':'back', 
                         'css': {'ui-btn-active': esUltimoDelPath()}
                         }, 
                      click: seleccionar" 
            class="ui-btn ui-btn-inline ui-btn-icon-left ui-btn-corner-all ui-shadow ui-btn-up-c">
             <span class="ui-btn-inner ui-btn-corner-all">
                 <span class="ui-btn-text" data-bind="text: name" ></span>
                 <span class="ui-icon ui-icon-right ui-icon-shadow"></span>
             </span>
         </a>
</script>


 


<!-- Template: Caomanda add: listado de categorias                                  -->
<script id="listaCategoriasTree" type="text/x-jquery-tmpl">
   <a  href="#" data-theme="b" data-inline="true" 
       data-bind="css: {'sin-imagen': !media_id, 'con-imagen': media_id}"
       class="">
           <?php $urlForCategory = $this->Html->url(array('plugin'=>'risto', 'controller'=>'medias', 'action'=>'view')); ?>
           <span data-bind="visible: tieneMedia">
              <image class="menu-img" data-bind="attr: {src: '<?php echo $urlForCategory ?>/'+media_id}"/>
           </span>  
           <span data-bind="text: name"></span>
   </a>
</script>


<!-- Template: Caomanda add: listado de productos -->
<script id="categorias-productos" type="text/x-jquery-tmpl">
     <a data-bind="attr: { href: tieneSabores() ? '#page-sabores' : '#'}, css: {'producto-con-sabor': tieneSabores(), 'sin-stock': sin_stock}" 
        data-rel="dialog"
        data-icon="none"
        class="">
             <span class="ui-btn-text" data-bind="text: name" ></span>
     </a>
 </script>
 
 
 
 <!-- Template: Comanda Add, Listado de sabores de categorias       -->
<script id="listaSabores" type="text/x-jquery-tmpl">
   <a href="#" data-theme="c" data-inline="true" data-role="button" class="ui-btn ui-btn-inline ui-btn-corner-all ui-shadow ui-btn-up-c">
       <span class="ui-btn-inner ui-btn-corner-all">
           <span class="ui-btn-text">
               <span data-bind="text: name"></span>                         
           </span>
       </span>
   </a>
</script>


<!-- listado de pagos seleccionados -->
<script id="li-pagos-creados" type="text/x-jquery-tmpl">
     <li style="text-align: center;">

        <img src="" data-bind="attr: {src: image(), alt: TipoDePago().name, title: TipoDePago().name}"/>
        <input name="valor" data-bind="value: valor, valueUpdate: 'keyup'" placeholder="Ej: 100.4" class="ui-input-text ui-body-e ui-corner-all ui-shadow-inset"/>
        <br>
        <button  class="mesa-cobro-eliminar" style="font-size: 13pt; font-weight: bolder; color: red; text-align: center;" value="X" data-enhance="false" data-role="none">X</button>
     </li>
</script>





<!-- Template: Listado de productos del detalle Comanda -->
<script id="li-productos-detallecomanda" type="text/x-jquery-tmpl">
 <li class="ui-li ui-li-static ui-body-c">
     

    <span>
       <span class="producto-precio">p/u: {{= '$'}}<span data-bind="text: precio()"></span></span>
       
       <span data-bind="visible: esEntrada(), css: { es_entrada: esEntrada()}" href="#" title="Entrada" data-theme="c">E</span>

       <span data-bind="text: realCant()" class="adn-mesa-comanda-cantidad"></span>
       <span data-bind="text: nameConSaboresyObservacion(), css: {tachada: realCant()==0}" class="adn-mesa-comanda-nombre-producto"></span>
       <a data-bind="click: deseleccionarYEnviar" data-role="button" href="#" title="restar cantidad" data-theme="c" class="adn-btn-restar-cantidad">⇩</a>
    </span>
 </li>
</script>




<!-- Template: 
listado de mesas que será refrescado continuamente mediante 
el ajax que verifica el estado de las mesas (si fue abierta o cerrada alguna. -->
<script id="listaMesas" type="text/x-jquery-tmpl">
    <li data-bind="attr: {mozo: mozo().id(), 'id': 'mesa-li-id-'+id(), 'class': estado().icon}">

     <a  data-bind="click: seleccionar, attr: {accesskey: numero, id: 'mesa-id-'+id()}, 'css': {'mesa-blink-error':sync()<1}" 
            data-theme="c"
            data-role="button" 
            href="#mesa-view" 
            class="ui-btn ui-btn-up-c"
            >
              
              <span  class="mesa-sync-status mesa-sync-status-syncing" data-bind="visible: sync() == 0 ">
                  ⇅
              </span>

              <span  class="mesa-sync-status mesa-sync-status-error" data-bind="visible: sync() < 0">
                    &#9888;
              </span>


                <span  class="mesa-tipofactura" data-bind="visible: clienteNameData()">
                    <span data-bind="text: clienteTipoFacturaText()"></span>
                    <span data-bind="text: clienteNameData()"></span>
                </span>

                <span class="mesa-span ui-btn-inner">

                      <span class="ui-btn-text">
                          <span class="mesa-numero" data-bind="text: numero"></span>
                          <hr />                         
                          <span class="mesa-time" data-bind="text: textoHora()"></span>
                </span>
            </span>
        </a>
    </li>
</script>


<!-- Template: 
listado de mesas que será refrescado continuamente mediante 
es igual al de las mesas de la adicion salvo que al hacer click tienen otro comportamiento
-->
<script id="listaMesasCajero" type="text/x-jquery-tmpl">
    <li data-bind="attr: {mozo: mozo().id(), 'id': 'mesa-li-id-'+id(), 'class': estado().icon}">
        <a  data-bind="click: seleccionar, attr: {accesskey: numero, id: 'mesa-id-'+id()}" 
            data-rel="dialog"
            data-role="button" 
            data-transition="none"
            data-icon="none"
            href="#mesa-cobrar" 
            class="ui-btn ui-btn-up-c">
                <span  class="mesa-tipofactura" data-bind="visible: clienteTipoFacturaText()">                    
                    <span data-bind="text: clienteTipoFacturaText()"></span>
                    <span data-bind="text: clienteNameData()"></span>
                </span>

                <span class="mesa-span ui-btn-inner">
                      <span class="ui-btn-text">
                          <span class="mozo-numero" data-bind="text: mozo().numero" style="color: grey; font-size: 8pt"></span><br>
                          <span class="mesa-numero" data-bind="text: numero"></span>
                          <hr />
                          
                          <span class="mesa-descuento" data-bind="visible: clienteDescuentoText(),text: clienteDescuentoText()"></span>
                          
                          <span class="mesa-total-sin-dto precio-sign" data-bind="visible: clienteDescuentoText(),text: totalCalculadoNeto()"></span>

                          <span class="mesa-total precio-sign"  data-bind="text: totalCalculado()"></span>
                          <br>

                          <span class="mesa-time" data-bind="text: textoHora()"></span>
                </span>
            </span>
        </a>
    </li>

    
</script>


<script id="listaMozos" type="text/x-jquery-tmpl">
    <li  style="width: <?php echo floor( 100/ count($mozos) ); ?>%" class="<?php echo ( count($mozos) > 8 )?'adicion-listado-mozos-mesa-small':'adicion-listado-mozos-mesa-big'; ?>">
        <div class="mozo-numero-txt" data-bind="text: numero"></div>
        <button type="button" data-bind="click: seleccionar, attr: {value: id}"  class="adicion-mozo-title">
            <span data-bind="visible: tieneMediaId()">
                <img data-bind="attr:{src: full_image_url()}" />
            </span>
            <span data-bind="visible: !tieneMediaId(), text: numero"></span>
        </button>
               
        <ul class="listado-adicion" data-role="listview"
               data-bind="template: {name: 'listaMesas', foreach: mesasOrdenadas}"
               style="margin: 0px;">

        </ul>
    </li>
</script>

