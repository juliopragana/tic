<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Content Header (Page header) -->
   <section class="content">

    <!-- Info boxes -->
        <div class="row">
            <div class="col-md-9 col-sm-6 col-xs-12">
                
                    <div class="box">
                            <div class="box-header">
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-plus"> Adicionar Área</i></a>   
                              <h3 class="box-title">  Lista de Áreas</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                              <table class="table table-striped">
                                    <tr>
                                        <th>Nome da Área</th>
                                        <th>Ação</th>
                                    </tr>
                                    <?php $counter1=-1;  if( isset($areas) && ( is_array($areas) || $areas instanceof Traversable ) && sizeof($areas) ) foreach( $areas as $key1 => $value1 ){ $counter1++; ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars( $value1["nome_area"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td>
                                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                                <a href="#" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                              </table>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                
            
            </div>
        </div>


    </section>


</div>