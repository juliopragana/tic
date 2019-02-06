<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-black">
    <!-- Content Header (Page header) -->
    
    <!-- Content Header (Page header) -->
   <section class="content">

        <!-- $$$$$$$$$$$$$$$$ CHAMADO PRO BUTÕES $$$$$$$$$$$$ -->
        <div class="row">
            <div class="box-body pad table-responsive">
                <div class="col-md-12 col-sm-12 col-xs-12 bg-navy p-5">
                    <h1>Novo Chamado</h1>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 bg-primary p-5">
                        <h4>Selecione a área que deseja abrir o chamado</h4>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 bg-gray">
                    <br>                           
                    <div class="box-header with-border">
                    
                        
                            <?php $counter1=-1;  if( isset($areas) && ( is_array($areas) || $areas instanceof Traversable ) && sizeof($areas) ) foreach( $areas as $key1 => $value1 ){ $counter1++; ?> 
                            
                                <div class="col-lg-4 col-sm-8 col-xs-12">
                                <!-- small box -->
                                
                                <div class="small-box">
                                    <a href="/<?php echo htmlspecialchars( $value1["id_area"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        <button type="button" class="btn btn-block btn-flat bg-navy btn-lg" style="border-radius:10px;" link="#"><?php echo htmlspecialchars( $value1["nome_area"], ENT_COMPAT, 'UTF-8', FALSE ); ?></button>
                                    </a>                                
                                </div>
                                </div>
                            <?php } ?>
                        
                    </div>
                    
                
                
                </div>

            </div>

        </div>

    </section>


</div>