<?php echo $this->element('jq_templates'); ?>
<?php echo $this->element('jq_calendar'); ?>

<?php echo $this->Html->css('Risto.layout_header_late'); ?>


<?php if (Configure::read('Site.type') != SITE_TYPE_HOTEL ) {  ?>





<!--
                        LISTADO MESAS

-->
<!-- Pagina 1, Home Page por default segun JQM: Listado de Mesas -->
<div data-role="page" id="listado-mesas">
    <div class="brand-logo">
            <?php
                $imgLogo = $this->Html->image('/paxapos/img/isologo_rojo.png', array('class'=>'brand-logo-isologo'));

                $imgpaxapos = $this->Html->image('/paxapos/img/logotypo_azul.png', array('class'=>'brand-logo-logotipo'));

                $link = $this->Html->link($imgLogo, '#adicion-opciones' , array(
                       // 'data-ajax' => 'false',
                        'data-rel'  => 'dialog',
                        'class'     => 'navbar-brand ui-btn-left late', 
                        'escape'    => false,
                        'id' => 'isologo',
                        'class' => 'late',
                      // 'data-icon' => "gear",
                        'data-rel'  => "dialog",
                        'data-enhance' => false,
                        )); 
            
            echo $link.$imgpaxapos;
            ?>
    </div>



    <div  data-role="header" data-theme="c">
            <h1 class="pull-right"><span style="color: #9a820b" data-bind="text: adn().mesas().length">0</span> <?php echo Inflector::pluralize( Configure::read('Mesa.tituloMesa') )?></h1>
    </div>
                    
    <div  data-role="content" class="content_mesas">       

<!--
    MODAL PARA ABRIR NUEVAS MESAS

-->
<div id="abrir-mesa-nueva" class="overlay">
    
  <div class="overlay-content">
        <div class="mesa-abierta ui-btn-up-c">
            <h1>
                <?php echo __("Abriendo Nueva %s", Configure::read("Mesa.tituloMesa") );?>
                <br/>de<br/>
                <span class="mesa-abierta-mozo-alias"></span>

                <input type="hidden" class="input-create-mozo-id" />
            </h1>
            <div class="mesa-numero-input" >
                <input type="text" class="input-create-mesa-numero" placeholder="Descripción de <?php echo Configure::read("Mesa.tituloMesa")?>" />
                <div class="numero-mensaje-error-vacio"><br>Debe ingresar un valor aquí</div>
            </div>

            <div class="mesa-cubiertos-input" >
            <br>
                <input type="number" class="input-create-mesa-cubiertos" placeholder="Cant. <?php echo Inflector::pluralize( Configure::read("Mesa.tituloCubierto") )?>" />
                <div class="cubiertos-mensaje-error-vacio"><br>Debe ingresar un valor aquí</div>
            </div>
        <br>
      </div>


      <div>
            <button  data-role="button"  data-theme="d"   class="btn-create-mesa-ok">Guardar</button>
      </div>
  </div>
</div>
            <ul id="mozos22_container" class="adicion-lista-mozo" data-bind='template: { name: "listaMozos", foreach: adn().mozos }'>
            </ul>
        
    </div><!-- /navbar -->

</div>
<!-- Fin Pagina 1 -->

<?php } else { ?>


<!--
                        LISTADO MESAS GRILLA CALENDAR

-->
<div data-role="page" id="listado-mesas" class="calendar">

    <div class="calendar-container calendar-header">
        <div class="calendar-grid">
            <div class="controll control-header">
                <div class="col-header btn-controls">
                    <div>
                            <?php
                                $imgLogo = $this->Html->image('/paxapos/img/isologo_rojo.png', array('height'=>'50px'));

                                $imgpaxapos = $this->Html->image('/paxapos/img/logotypo_azul.png', array('style'=>'height: 15px; position:relative; top: -15px; left: 20px; opacity: 0.8'));

                                $link = $this->Html->link($imgLogo, '#adicion-opciones' , array(
                                       // 'data-ajax' => 'false',
                                        'data-rel'  => 'dialog',
                                        'class'     => 'navbar-brand ui-btn-left late', 
                                        'escape'    => false,
                                        'id' => 'isologo',
                                        'class' => 'late',
                                      // 'data-icon' => "gear",
                                        'data-rel'  => "dialog",
                                        'data-enhance' => false,
                                        )); 
                            
                            echo $link.$imgpaxapos;
                            ?>
                    </div>


                    <div class="control-actions">                            
                        <a href="#" class="ui-btn-active controll back" onclick='Risto.Adition.adicionar.calendarGrid.prevWeek()'>&lt;&lt;</a>
                        <a href="#" class="ui-btn-active controll back" onclick='Risto.Adition.adicionar.calendarGrid.prevDay()'>&lt;</a>
                        <a href="#" class="ui-btn-active controll prev" onclick='Risto.Adition.adicionar.calendarGrid.backDay()'>&gt;</a>
                        <a href="#" class="ui-btn-active controll prev" onclick='Risto.Adition.adicionar.calendarGrid.backWeek()'>&gt;&gt;</a>
                    </div>
                </div>

                <div class="content day-list">
                    <table class="calendar-header">
                       <thead>
                            <tr data-bind='template: { name: "calendar-header-month", foreach: Risto.Adition.adicionar.calendarGrid.months }'></tr>
                            <tr data-bind='template: { name: "calendar-header-day", foreach: Risto.Adition.adicionar.calendarGrid.days }'></tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
                    
    <div  data-role="content" class="content_mesas">           

        <div class="calendar-container calendar-data">    
            <div class="calendar-grid">
                <div class="mozos-grid" data-bind='template: { name: "calendar-mozo-row", foreach: Risto.Adition.adicionar.mozos }'></div>
            </div>                      
        </div>
    </div><!-- /navbar -->

</div>
<!-- Fin Pagina 1 -->
<?php } ?>


<!-- Opciones del cajero-->
<div data-role="page" id="cajero-opciones" class="dialog-arriba">
    <div data-role="header">
        <h1>Opciones de Cajero</h1>
    </div>
    <div data-role="content"">
        
            <a href="#listado-mesas" data-role="button">Modo Adicionista</a>

            <a href="#" onclick='window.location.reload(true);' data-ajax="false" data-role="button" data-icon="refresh">
                Refrescar Cajero</a>

           
            <?php 
            $cajeroElOps = 'Aditions.printers_types_cajero_ops_'. strtolower( $printer['Printer']['driver'] );
            if ( $this->elementExists( $cajeroElOps ) ) {
                echo $this->element( $cajeroElOps ); 
            }
            ?>
            
            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-rel="back" data-role="button">Cancelar</a></div>
                <div class="ui-block-b"><a data-icon="home" data-role="button" href="<?php echo $this->Html->url(array('plugin'=>'risto', 'controller'=>'pages', 'action'=>'display', 'dashboard'));?>" rel="external" data-theme="b">Ir a Página Principal</a></div>
            </div>
    </div>
</div>


<!-- 
            Opciones ADICIONISTA
-->
<div data-role="page" id="adicion-opciones">
    <div data-role="header">
        <h1>Opciones</h1>
    </div>
    <div data-role="content">
        
            <a href="#listado-mesas-cerradas" data-role="button">Modo Cajero</a>
            
            <a href="#" onclick='window.location.reload(true);' data-ajax="false" data-role="button" data-icon="refresh">
                Refrescar Adición</a>


            <a href="#" onclick='PrinterDriver.fbrry.send(JSON.stringify({"restart": 1})); jQuery(".icon", "#printer-driver-container").css({"background": "red"})' data-ajax="false" data-role="button" data-icon="print" data-rel="back">
                Reiniciar PaxaPrinter</a>
            

            <div class="div-input-fiscalberry-ip">
                <label for="input-fiscalberry-ip">PaxaPrinter Modo-Offline</label>
                <input name="fiscalberry-ip" id="input-fiscalberry-ip" placeholder="Ingresar IP aquí" />
            </div>


            
             <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-rel="back" data-role="button">Volver</a></div>
                <div class="ui-block-b">

                    <a
                     href="<?php echo $this->Html->url(array('plugin'=>'risto', 'controller'=>'pages', 'action'=>'display', 'dashboard'));?>" 
                     data-ajax="false"
                    data-theme="b" class="ui-btn ui-btn-corner-all ui-shadow ui-btn-up-b">
                    <span class="ui-btn-inner ui-btn-corner-all">
                    <span class="ui-btn-text">Ir a Página Principal</span></span>
                    </a>

                    </div>
            </div>
            
    </div>
</div>



<!-- 
            Opciones ADICIONISTA
-->
<div data-role="page" id="adicion-login">
    <div data-role="header">
        <h1>LOGIN</h1>
    </div>
    <div data-role="content">
        <iframe src="<?php echo $this->Html->url(array('plugin'=>'users', 'controller'=>'users', 'action'=>'tenant_login'));?>" style="width: 100%; height: 670px"></iframe>
    </div>
</div>



<!--
                        LISTADO MESAS CERRADAS:::: MODO CAJERO

-->
<!-- Pagina 1, Home Page por default segun JQM: Listado de Mesas -->
<div data-role="page" id="listado-mesas-cerradas">


    <div style="padding: 0px; position: absolute; z-index:99999; margin: 3px;">
            <?php
                $imgLogo = $this->Html->image('/paxapos/img/isologo_rojo.png', array('height'=>'50px'));

                $imgpaxapos = $this->Html->image('/paxapos/img/logotypo_blanco.png', array('style'=>'height: 30px; position:relative; top: -10px; left: 20px; opacity: 0.8'));

                $link = $this->Html->link($imgLogo, '#cajero-opciones' , array(
                       // 'data-ajax' => 'false',
                        'data-rel'  => 'dialog',
                        'class'     => 'navbar-brand ui-btn-left late', 
                        'escape'    => false,
                        'id' => 'isologo',
                        'class' => 'late',
                      // 'data-icon' => "gear",
                        'data-rel'  => "dialog",
                        'data-enhance' => false,
                        )); 
            
            echo $link.$imgpaxapos;
            ?>
    </div>


	<div  data-role="header" data-theme="a">
        <h1><span style="color: #9a820b" data-bind="text: adn().mesasCerradas().length">0</span> <?php echo Inflector::pluralize( Configure::read('Mesa.tituloMesa') )?> Cerradas
            y <span data-bind="text: Math.abs(adn().mesasCerradas().length - adn().mesas().length)"></span> abiertas
        </h1>

    </div>

                    
    <div  data-role="content" class="content_mesas">
            <!-- aca va el listado de mesas que se carga dinamicamente en un script de abajo -->
            <ul id="ul-mesas-cajero" class="listado-adicion" data-bind='template: { name: "listaMesasCajero", foreach: adn().mesasCerradas }'>
                   
            </ul>
    </div><!-- /navbar -->
            
</div>
<!-- Fin Pagina Cajero -->






<!--
                        OBSERVACIONES DE CADA PRODUCTO

-->
<div  data-role="page"  id="comanda-add-product-obss">
    <div  data-role="header"  data-position="inline">
        <h1>Observacion</h1>
        <a href="#"  data-rel="back"  onclick="$('#form-comanda-producto-observacion').submit();" data-theme="b">Guardar Observación</a>
    </div>
    <div data-role="content">
        <form name="comanda" id="form-comanda-producto-observacion">
            <textarea name="obs" id="obstext" autofocus="autofocus"></textarea>
        </form>
        
        <div class="observaciones-list">
                <?php foreach($observaciones as $o) { ?>
                <a data-role="button" data-inline="true" href="#" onclick="$('#obstext').val( $('#obstext').val()+', <?php echo $o?>' )"><?php echo $o?></a>
                <?php } ?>
        </div>
    </div>
    
</div> 




<!--
                        MESA_VIEW

-->
<div data-role="page" id="mesa-view">
	<div  data-role="header" data-bind="css: {'ui-bar-f': adn().currentMesa().estaCerrada()}">
            <a href="#listado-mesas" data-direction="reverse">Volver</a>
            <h1>
                <span class="mesa-id" style="float: left;">
                    #<span data-bind="text: adn().currentMesa().id()"></span>
                    <span data-bind="visible: !adn().currentMesa().id()">
                        <?php echo $this->Html->image('loader.gif'); ?>
                    </span>
                </span>
                
                <span data-bind="text: adn().currentMesa().numero()"></span>
                <?php 
                echo $this->Html->image('mesa-abrio.png') . " " . Configure::read('Mesa.tituloMesa') ." - " .
                Configure::read('Mesa.tituloMozo') . " " . $this->Html->image('mozomoniob.png') 
                ?>
                <span data-bind="text: adn().currentMesa().mozo().numero()"></span>
                 
                <span class="hora-abrio">Estado: <span data-bind="text: adn().currentMesa().getEstadoName()"></span></span>
            </h1>
        </div>

        <div  data-role="content" class="" data-scroll="true">
            <div class="mesa-actions">
                <ul data-role="listview"  data-bind="attr: {'estado': adn().currentMesa().estado().icon}">
                    
                    <li id="mesa-action-comanda" data-bind="attr: {'estado': 'comanda-add-menu_'+adn().currentMesa().estado().icon}">
                        <a href="#comanda-add-menu" data-rel="dialog"><?php echo $this->Html->image('/aditions/css/img/products_64.png')?>Agregar Producto</a>
                    </li>
                    
                    <li id="mesa-action-cliente" data-bind="attr: {'estado': 'mesa-cliente_'+adn().currentMesa().estado().icon}">
                        <a  href="#listado_de_clientes" data-rel="dialog">
                                <?php echo $this->Html->image('/aditions/css/img/customers.png')?>
                            <span data-bind="visible: !adn().currentMesa().Cliente()"><?php echo __('Agregar %s', Configure::read('Mesa.tituloCliente')) ?></span>
                            <span data-bind="visible: adn().currentMesa().Cliente()" style="white-space: normal">
                                <span data-bind="text: adn().currentMesa().clienteTipoFacturaText()"></span> 
                                <span data-bind="text: adn().currentMesa().clienteNameData()"></span>
                            </span>
                        </a>
                    </li>
                    
                    <li id="mesa-action-cerrar" data-bind="attr: {'estado': 'mesa-cerrar_'+adn().currentMesa().estado().icon}, visible: adn().currentMesa().sync() > 0">
                        <a href="#listado-mesas" id="mesa-cerrar" data-direction="reverse">
                            <?php echo $this->Html->image('/aditions/css/img/cerrarmesa.png')?>
                            <?php
                            if ( Configure::read('Site.type') == SITE_TYPE_RESTAURANTE ) {
                                echo "Cerrar";
                            } else {
                                echo "Facturar";
                            }
                            ?>
                            </a>
                    </li>
                    
                    
                    <li id="mesa-action-cobrar" data-bind="attr: {'estado': 'mesa-cobrar_'+adn().currentMesa().estado().icon}, visible: adn().currentMesa().sync() > 0">
                        <a href="#mesa-cobrar" data-rel="dialog"><?php echo $this->Html->image('/aditions/css/img/cobrar.png')?>Cobrar</a>
                    </li>
                    
                    <li id="mesa-action-reimprimir" data-bind="attr: {'estado': 'mesa-re-print_'+adn().currentMesa().estado().icon}, visible: adn().currentMesa().sync() > 0">
                        <a href="#listado-mesas" class="mesa-reimprimir"  data-rel="back"><?php echo $this->Html->image('/aditions/css/img/printer.png')?>Imprimir Ticket</a>
                    </li>
                    
                    <!--
                    <li id="mesa-action-imprimir-nc" data-bind="attr: {'estado': 'mesa-re-print_'+adn().currentMesa().estado().icon}">
                        <a href="#listado-mesas" class="mesa-imprimir-nc"  data-rel="back"><?php echo $this->Html->image('/aditions/css/img/printernc.png')?>Imprimir NC</a>
                    </li>
                    -->

                    <?php if (Configure::read('Site.type') != SITE_TYPE_HOTEL) { ?>
                    <li id="mesa-action-checkout" data-bind="attr: {'estado': 'mesa-checkout_'+adn().currentMesa().estado().icon}, visible: adn().currentMesa().sync() > 0">
                        <a href="#listado-mesas" id="mesa-checkout" data-direction="reverse"><?php echo $this->Html->image('/aditions/css/img/checkout.png')?>Checkout</a>
                    </li>
                    <?php } ?>
                    
                    <li id="mesa-action-cambiar-mozo">
                        <a href="#mesa-cambiar-mozo" data-rel="dialog"><?php echo $this->Html->image('/aditions/css/img/cambiarmozo.png')?>Cambiar <?php echo Configure::read('Mesa.tituloMozo')?></a>
                    </li>
                    
                    <?php if (Configure::read('Site.type') == SITE_TYPE_RESTAURANTE) { ?>
                    <li id="mesa-action-cambiar-numero">
                        <a href="#mesa-cambiar-numero" data-rel="dialog"><?php echo $this->Html->image('/aditions/css/img/cambiarmesa.png')?>Cambiar N°</a>
                    </li>
                    <?php } ?>
                    
                    <li id="mesa-action-reabrir" data-bind="attr: {'estado': 'mesa-reabrir_'+adn().currentMesa().estado().icon}">
                        <a href="#listado-mesas" id="mesa-reabrir"><?php echo $this->Html->image('/aditions/css/img/reabrir.png')?>Re Abrir</a>
                    </li>
                    
                    <?php if (Configure::read('Site.type') == SITE_TYPE_RESTAURANTE) { ?>
                    <li style="" id="mesa-action-menu" data-bind="attr: {'estado': 'mesa-borrar_'+adn().currentMesa().estado().icon}">
                        <a href="#" id="mesa-menu"><?php echo $this->Html->image('/aditions/css/img/write.png')?>Menú <span style="color: red" data-bind="visible: adn().currentMesa().menu() != 0,text: adn().currentMesa().menu"></span></a>
                    </li>
                    <?php } ?>
                    
                    <li>
                        &nbsp;
                    </li>
                    
                    <li style="width: 49%; float: left;" id="mesa-action-borrar" data-bind="attr: {'estado': 'mesa-borrar_'+adn().currentMesa().estado().icon}">
                        <a href="#listado-mesas" id="mesa-borrar" data-rel="back"><?php echo $this->Html->image('/aditions/css/img/borrarmesa.png')?>Borrar</a>
                    </li>
                    
                    <li style="width: 49%; float: right;" id="mesa-action-edit" data-bind="attr: {'estado': 'mesa-borrar_'+adn().currentMesa().estado().icon}">
                        <a href="#" data-external="true" target="_blank"
                            data-bind="attr:{href: adn().currentMesa().urlFullEdit()}">
                         <?php echo $this->Html->image('/aditions/css/img/editarmesa.png')?>Editar</a>
                    </li>
                    
                    
                    
                    
                    
                   
                    
                </ul>
            </div>

            <div class="mesa-view">
                    <div data-bind="{visible: adn().currentMesa().sync() == 0}" class="mesa-sync-status-syncing" style="font-size: 18pt; margin: 10px 10px; text-align: center;">
                           ⇅ SINCRONIZANDO
                    </div>


                    <div class="mesa-sync-status-error" data-bind="{visible: adn().currentMesa().sync() < 0}" style="text-align: center; margin: 10px 10px">
                        <div style="font-size: 18pt;">
                            &#9888; ALERTA: <?php echo strtoupper( Configure::read("Mesa.tituloMesa") ); ?> NO SINCRONIZADA
                        </div>
                        <div style="font-size: 12pt;">
                            Por un error en la conexión con el servidor, hay datos sin guardar.<br>
                            Se reintentará guardar en <span id="mesas-time-reload"></span> segundos...
                        </div>                       

                    </div>

                    <div class="observaciones">
                        <textarea id="mesa-textarea-observation"  data-bind="value: adn().currentMesa().observation" placeholder="Agregar una Observación"></textarea>

                        <button id="mesa-observacion-submit" type="button" value="Guardar" style="display: none" data-enhance="false" data-role="none">Guardar</button>
                        <button id="mesa-observacion-cancel" type="button" value="Guardar" style="display: none" data-enhance="false" data-role="none">Cancelar</button>
                    </div>                            


                    <div data-bind="visible: adn().currentMesa().clienteTelefono() || adn().currentMesa().clienteDomicilio()">
                        <h3 class="titulo-comanda">Detalle del Cliente: "<span data-bind="text: adn().currentMesa().clienteNameData()" style="white-space: normal"></span>"</h3>
                            <div data-bind="visible: adn().currentMesa().clienteDomicilio()"><span style="opacity:0.8">Domicilio:</span> <b data-bind="text: adn().currentMesa().clienteDomicilio()"></b></div>
                            <div data-bind="visible: adn().currentMesa().clienteTelefono()"><span style="opacity:0.8">Teléfono: </span> <b data-bind="text: adn().currentMesa().clienteTelefono()"></b></div>
                            <br><br>
                    </div>


                    <div class="date-checkin-checkout" data-bind="visible: adn().currentMesa().checkin() || adn().currentMesa().checkin() ">
                        <div class="date-checkin" data-bind="visible: adn().currentMesa().checkin()">
                            <span class="title">Checkin:</span> <span class="data" data-bind="text: moment(adn().currentMesa().checkin()).format('dddd, DD/MM/YY HH:mm')"></span>
                        </div>
                        <div class="date-checkout" data-bind="visible: adn().currentMesa().checkout()">
                            <span class="title">Checkout:</span> <span class="data" data-bind="text: moment(adn().currentMesa().checkout()).format('dddd, DD/MM/YY HH:mm')"></span>
                        </div>                    
                    </div>

                    <hr />
                
                <h3 class="titulo-comanda">Productos Comandados</h3>

                <!-- template -->
                <div id="comanda-detalle-collapsible" data-role="collapsible-set" 
                     data-bind="template: {name: 'listaComandas', foreach: adn().currentMesa().Comanda}"></div>
            </div>
            
        </div>
    
    <div data-role="footer">
        <h3>

            <span id="mesa-cant-comensales"  style="float: left">   
                <?php if ( Configure::read('Adicion.cantidadCubiertosObligatorio') ) {?>         
                <a data-role="button" data-bind="visible: !parseInt(adn().currentMesa().cant_comensales())">
                    <?php echo __( 'Ingresar %s', Inflector::pluralize(Configure::read('Mesa.tituloCubierto'))) ?>
                </a>
                <span data-bind="visible: parseInt( adn().currentMesa().cant_comensales()) > 0"><span data-bind="text: adn().currentMesa().cant_comensales()"></span> <?php echo Inflector::pluralize(Configure::read('Mesa.tituloCubierto'))  ?></span>
                <?php } ?>
            </span>

            <span class="mesa-total"><span data-bind="text: adn().currentMesa().textoTotalCalculado()"></span></span>
            <?php if (Configure::read('Site.type') != SITE_TYPE_HOTEL) { ?>
            <span class="hora-abrio">Abrió a las <span data-bind="text: adn().currentMesa().timeAbrio()"></span></span>
            <?php } ?>
        </h3>
    </div>
</div>


<!--
                        COMANDA-ADD

-->
<div data-role="page" id="comanda-add-menu" class="comanda dialog-ancho dialog-arriba">
    <div data-role="header">                   

        <h1 class="comanda-add-menu-mesa-numero">
            <span data-bind="text: adn().currentMesa().numero()"></span>
            <?php 
            echo $this->Html->image('mesa-abrio.png') . " " . Configure::read('Mesa.tituloMesa') ." - " .
            Configure::read('Mesa.tituloMozo') . " " . $this->Html->image('mozomoniob.png') 
            ?>
            <span data-bind="text: adn().currentMesa().mozo().numero()"></span>
        </h1>

        <div data-role="controlgroup" data-type="horizontal" style="float: right;">
            
            <a style="min-width: 160px" href="#" id="comanda-obervacion-a" data-role="button" title="Agregar Observación"><?php echo $this->Html->image('pencil_48.png', array('class'=> 'btn-comanda-icon'))?>Observación</a>
            <a href="#mesa-view" data-role="button" id="comanda-add-guardar"  data-icon="check" data-theme="b">Enviar Comanda</a>

        </div>
    </div>

    <div data-role="content" style="min-height: 300px">
        
        <div style="display: none" id="comanda-add-observacion" class="ui-corner-bottom ui-overlay-shadow ui-content">
            <h4 style="color: #fff">Agregar observación general para la comanda</h4>
            <textarea id="obscomandatext" style="width: 97%" data-bind="value: adn().currentMesa().currentComanda().comanda.observacion, valueUpdate: 'keyup'" autofocus="autofocus" name="obs" class="obstext ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-a"></textarea>
            
            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" onclick="" id="mesa-comanda-add-obs-gen-cancel" data-role="button">Cancelar</a></div>
                <div class="ui-block-b"><a href="#" id="mesa-comanda-add-obs-gen-aceptar" data-role="button" data-theme="b">Aceptar</a></div>
            </div>
            
            <div class="observaciones-list">
                <?php foreach($observacionesComanda as $o) { ?>
                <button data-inline="true" value="<?php echo $o?>"><?php echo $o?></>
                <?php } ?>
            </div>
        </div>
        <!--        PRODUCTOS SELECCIONADOS    -->
        <div  style="width: 28%; margin-right: 2%; display: inline; float: left;">
            
           <ul id="ul-productos-seleccionados" class="ui-listview" data-role="listview"
               data-bind="template: {name: 'categorias-productos-seleccionados', foreach: adn().productosSeleccionados()}"
               style="margin-top: 8px;" ></ul>
        </div>    
           
        <div style="width: 70%; display: inline; float: right;">
            <div id="path" data-bind="template: {name: 'boton', foreach: menu().path()}"></div> 
            
            <!--           SELECCION DE CATEGORIAS                           -->
           <div id="ul-categorias" 
                data-bind="template: {name: 'listaCategoriasTree', foreach: menu().currentSubCategorias()} ">
           </div>
           
            <!--           SELECCION DE PRODUCTOS                            -->
           <div id="ul-productos" style="clear: both" 
                data-bind="template: {name: 'categorias-productos', foreach: menu().currentProductos()} ">
           </div>
        </div>
    </div>
        
</div>  





<!--
                        SABORES-ADD

-->
<div data-role="page" id="page-sabores" data-theme="b" class="dialog-ancho dialog-arriba">
    <div data-role="header">
        <h1>Adicional</h1>
               
	<a href="#" data-icon="check" data-theme="b" data-rel="back" data-bind="click: function(){adn().currentMesa().currentComanda().saveSabores()}">Guardar</a>        
    </div>

    <div data-role="content">                  
           <div id="ul-sabores" 
                data-bind="template: {name: 'listaSabores', foreach: adn().currentSabores()} ">
           </div>
    </div>
            
</div>  






<!--
                    MESA CAMBIAR MOZO

-->
<div data-role="page" id="mesa-cambiar-mozo" data-theme="e" class="dialog-ancho">
    <div data-role="header">
        <h1>Seleccionar nuevo <?php echo Configure::read('Mesa.tituloMozo')?> para la <?php echo Configure::read('Mesa.tituloMesa')?> <span data-bind="text: adn().currentMesa().numero()"></span></h1>
    </div>

    <div data-role="content">           
        
        <div>
            El <?php echo Configure::read('Mesa.tituloMozo')?> actual es el <span data-bind="text: adn().currentMesa().mozo().numero"></span>
        </div>
        
        
        <form name="cambiar-mozo" id="form-cambiar-mozo" action="#" data-ajax="false"  data-direction="reverse">
            <input type="hidden" name="mesa_id" data-bind="value: adn().currentMesa().id"/>
            
            <fieldset data-role="controlgroup" data-type="horizontal">
                        <legend>Seleccionar <?php echo Configure::read('Mesa.tituloMozo')?></legend>
                        <?php
                            foreach ($mozos as $m) {
                                $k = $m['Mozo']['id'];
                                $n = $m['Mozo']['numero'];
                                echo "<input type='radio' name='mozo_id' id='radio-mozo-cambiar-id-$k' value='$k'/>";
                                echo "<label for='radio-mozo-cambiar-id-$k'>$n</label>";
                            }
                        ?>
                    </fieldset>
            
            
            <fieldset class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-role="button" data-rel="back" data-theme="e">Cancelar</a></div>
                <div class="ui-block-b"><button type="submit" data-theme="b">Cambiar de <?php echo Configure::read('Mesa.tituloMozo') ?></button></div>
	    </fieldset>
        </form>
    </div>
            
</div>  





<!--
                    MESA CAMBIAR NUMERO

-->
<div data-role="page" id="mesa-cambiar-numero" data-theme="e">
    <div data-role="header">
        <h1>Cambiar número de la <?php echo Configure::read('Mesa.tituloMesa') ?> <span data-bind="text: adn().currentMesa().numero"></span></h1>
    </div>

    <div data-role="content">    
        <p>
        El número actual es <span data-bind="text: adn().currentMesa().numero"></span>
        </p>
        <form name="cambiar-mozo" id="form-cambiar-numero" action="#mesa-view" data-ajax="false"  data-transition="reverse">
            <fieldset data-role="controlgroup" data-type="horizontal">
                <label for="numeroacambiar">Ingresar nuevo número</label>
                <input type="text" name="numero" id="numeroacambiar" />
            </fieldset>
            
            <fieldset class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-role="button" data-rel="back" data-theme="e">Cancelar</a></div>
                <div class="ui-block-b"><button type="submit" data-theme="b">Modificar</button></div>
	    </fieldset>
            
        </form>
    </div>
            
</div>  




<!--
                    MESA COBRAR

-->
<div data-role="page" id="mesa-cobrar" data-theme="e" class="dialog-reancho dialog-arriba">

    <div data-role="header">
        <h1><?php echo Configure::read('Mesa.tituloMesa')?> <span data-bind="text: adn().currentMesa().numero()"></span> | <span data-bind="text: adn().currentMesa().vueltoText()"></span></h1>
        <a href="#mesa-view" data-direction="reverse">Ver Mesa</a>        

        <div style="text-align: center">
            <a href="#" data-role="button" id="mesa-cajero-reabrir" class="mesa-cajero-clickeable">Re Abrir</a>
            <a href="#" data-role="button" class="mesa-reimprimir mesa-cajero-clickeable">Imprimir Ticket</a>
            <?php if (Configure::read('Site.type') != SITE_TYPE_HOTEL ) {  ?>
                <a href="#" data-role="button" id="mesa-cajero-checkout" class="mesa-cajero-clickeable" >Hacer Checkout</a>
            <?php } ?>
        </div>
        <br/>
    </div>

    <div data-role="content">   
        <h3>Tipos de Pago Disponibles</h3><h2 class="mesa-total" style="float: right; color: red;">Total $<span data-bind="text: adn().currentMesa().totalCalculado()"></span></span></h2>
        
        <ul class="tipo_de_pagos tipo-de-pagos-disponibles">
        <?php 
        foreach ( $tipo_de_pagos as $tp ){
            $pago = $tp['TipoDePago'];
            // para que el json no tenga proglemas con el DOM "
            $pagoJson =  str_replace('"',"'", json_encode( $pago , JSON_NUMERIC_CHECK) );
            ?>
            <li>
                <a href="#" data-pago-json="<?php echo $pagoJson; ?>">
                    <?php
                    echo $this->Html->imageMedia($tp['TipoDePago']['media_id']);
                    echo '<br />';
                    echo $pago['name'];
                    ?>
                </a>
            </li>
            <?php
        }
        ?>
        </ul>
        
        <div class="pagos-seleccionados">
            <div class="vuelto">
                <span class="vuelto-title text-success" data-bind="visible: adn().currentMesa().vuelto() >= 0"
                >Vuelto: $</span>
                <span class="vuelto-title text-danger" data-bind="visible: adn().currentMesa().vuelto() < 0"
                >Falta Pagar: $</span>
                <span class="vuelto-value"  data-bind="text: Math.abs(adn().currentMesa().vuelto())"></span>
            </div>

            <h4>Cobros Seleccionados</h4>

            <ul class="pagos_creados"
                data-bind='template: { name: "li-pagos-creados", foreach: adn().currentMesa().Pago }'>
            </ul>
            
            <div class="ui-grid-d">
                    <div class="ui-block-a">
                        <a href="#" data-role="button" data-rel="back" data-theme="c">Volver Atrás</a>
                        
                    </div>
                    <div class="ui-block-b">
                       
                    </div>
                    <div class="ui-block-c">
                       
                    </div>
                    <div class="ui-block-d">
                       
                    </div>
                    <div class="ui-block-e">
                        <a href="#" data-role="button" id="mesa-pagos-procesar" data-theme="b" data-rel="back">Guardar Cobro</a>
                    </div>
    	    </div>
        </div>
    </div>
    
            
</div>  



<!--
                    MESA CAMBIAR NUMERO

-->
<div data-role="page" id="notificaciones" data-theme="f" data-role="dialog">
    <div data-role="header">
        <h1 class="titulo"></h1>
    </div>
    <div data-role="content" class="contenido">            
        <div></div>
    </div>
</div>  




<!--

            LISTADO DE CLIENTES

-->

<div data-role="page" id="listado_de_clientes" data-role="dialog">   
    <div data-role="header">
        <h1 class="titulo">Seleccionar</h1>
    </div> 
       <div data-role="content" >
            <div class="header-cliente">

                <a href="#mesa-view" data-direction="reverse" data-role="button" data-inline="true">Volver</a>
                
                <?php echo $this->Html->link(__('Crear %s', Configure::read('Mesa.tituloCliente')), array('plugin'=>'fidelization', 'controller'=>'clientes', 'action'=>'simple_add'), array(
                    'data-role' => 'button',
                    'data-inline' => 'true',
                    'data-theme' => 'b',
                    'data-rel' => 'dialog',
                )) ?>

                <a href="#mesa-view" data-role="button" id="mesa-eliminar-cliente" data-inline="true" data-theme="" 
                    data-direction="reverse" data-bind="visible: adn().currentMesa().Cliente()">
                        Borrar</span>
                </a>

            </div>

            <div id="contenedor-listado-clientes">
                <input type="text" class="clientes-search" placeholder="Ingresar criterio de búsqueda"/>
                <div style="display: none" class="btn-action-cliente-add" data-theme="b">
                    <br>
                    <a href="<?php echo $this->Html->url(array('plugin'=>'fidelization', 'controller'=>'clientes', 'action'=>'simple_add')) ?>"><?php echo __( 'Agregar Nuevo %s',Configure::read('Mesa.tituloCliente')) ?></a>
                </div>

                <ul id="listado-clientes" class="listado-clientes" data-bind='template: { name: "listaClientes", foreach: adn().clientes }'>
                </ul>


            </div>
            
        </div>
</div>